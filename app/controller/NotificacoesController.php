<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of Notificacao
 *
 * @author ndonge
 */
class NotificacoesController {
    //put your code here
    private $clientesService = NULL;

    public function __construct() {
        $this->clientesService = new ClientesService();
    }

    public function redirect($location) {
        header('Location: ' . $location);
    }

    public function requestsHandler() {

        $filterOp = filter_input(INPUT_GET, 'op');
        $op = isset($filterOp) ? $filterOp : NULL;

        try {
            if (!$op || $op == 'list') {
                $this->listClientes();
            } else if ($op == 'new') {
                $this->saveCliente();
            }else if ($op == 'edit') {
                $this->updateCliente();
            } else if ($op == 'delete') {
                $this->deleteCliente();
            } else if ($op == 'details') {
                $this->showCliente();
            } else {
                $this->showError("Page not found", "Page for operation " . $op . " was not found!");
            }
        } catch (Exception $e) {
            // some unknown Exception got through here, use application error page to display it
            $this->showError("Application error", $e->getMessage());
        }
    }

    public function listClientes() {
        $clientes = $this->clientesService->getAllclientes();
        include 'view/clientes.php';
    }

    public function saveCliente() {

        $titulo = 'Cadastro';

        $errors = array();
        $filterOp = filter_input(INPUT_POST, 'form-submitted');

        if (isset($filterOp)) {

            $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
            $tipo = filter_input(INPUT_POST, 'tipo', FILTER_SANITIZE_SPECIAL_CHARS);
            $actividade = filter_input(INPUT_POST, 'actividade', FILTER_SANITIZE_SPECIAL_CHARS);
            $comuna = filter_input(INPUT_POST, 'comuna', FILTER_SANITIZE_SPECIAL_CHARS);
            $nacionalidade = filter_input(INPUT_POST, 'nacionalidade', FILTER_SANITIZE_SPECIAL_CHARS);
            $morada = filter_input(INPUT_POST, 'morada', FILTER_SANITIZE_SPECIAL_CHARS);
            $uid = filter_input(INPUT_POST, 'uid', FILTER_VALIDATE_INT);
            
            try {
                $this->clientesService->createNewCliente($nome, $tipo, $actividade, $comuna, $nacionalidade, $morada, $uid);
                $this->redirect('index.php');
                return;
            } catch (ValidationException $e) {
                $errors = $e->getErrors();
            }
        }

        include 'view/cliente-form.php';
    }
    
    public function updateCliente() {

        $titulo = 'Editar';

        $errors = array();
        $filterOp = filter_input(INPUT_POST, 'form-submitted');

        if (isset($filterOp)) {

            $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
            $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
            $tipo = filter_input(INPUT_POST, 'tipo', FILTER_SANITIZE_SPECIAL_CHARS);
            $actividade = filter_input(INPUT_POST, 'actividade', FILTER_SANITIZE_SPECIAL_CHARS);
            $comuna = filter_input(INPUT_POST, 'comuna', FILTER_SANITIZE_SPECIAL_CHARS);
            $nacionalidade = filter_input(INPUT_POST, 'nacionalidade', FILTER_SANITIZE_SPECIAL_CHARS);
            $morada = filter_input(INPUT_POST, 'morada', FILTER_SANITIZE_SPECIAL_CHARS);
            $uid = filter_input(INPUT_POST, 'uid', FILTER_VALIDATE_INT);
            
            try {
                $this->clientesService->editCliente($id, $nome, $tipo, $actividade, $comuna, $nacionalidade, $morada, $uid);
                $this->redirect('index.php');
                return;
            } catch (ValidationException $e) {
                $errors = $e->getErrors();
            }
        }

        include 'view/cliente-form.php';
    }

    public function deleteCliente() {

        $filterId = filter_input(INPUT_GET, 'id');
        $id = isset($filterId) ? $filterId : NULL;

        if (!$id) {
            throw new Exception('Ocorreu um erro.');
        }

        $this->clientesService->deleteCliente($id);
        $this->redirect('index.php');
    }

    public function showCliente() {

        $filterId = filter_input(INPUT_GET, 'id');
        $id = isset($filterId) ? $filterId : NULL;

        if (!$id) {
            throw new Exception('Ocorreu um erro.');
        }

        $cliente = $this->clientesService->getCliente($id);

        include 'view/cliente.php';
    }

    public function showError($title, $message) {
        include 'view/erro.php';
    }
}
