<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of Confirmado
 *
 * @author ndonge
 */
class ConfirmacoesController {
    //put your code here
    private $confirmacoesService = NULL;

    public function __construct() {
        $this->confirmacoesService = new ConfirmacoesService();
    }

    public function redirect($location) {
        header('Location: ' . $location);
    }

    public function requestsHandler() {

        $filterOp = filter_input(INPUT_GET, 'op');
        $op = isset($filterOp) ? $filterOp : NULL;

        try {
            if (!$op || $op == 'list') {
                $this->listConfirmacoes();
            } else if ($op == 'new') {
                $this->saveConfirmacao();
            }else if ($op == 'edit') {
                $this->updateConfirmacao();
            } else if ($op == 'delete') {
                $this->deleteConfirmacao();
            } else if ($op == 'details') {
                $this->showConfirmacao();
            } else {
                $this->showError("Page not found", "Page for operation " . $op . " was not found!");
            }
        } catch (Exception $e) {
            // some unknown Exception got through here, use application error page to display it
            $this->showError("Application error", $e->getMessage());
        }
    }

    public function listConfirmacoes() {
        $getAllConfirmacoes = $this->confirmacoesService->getAllConfirmacoes();
        include 'view/confirmacoes.php';
    }

    public function createNewConfirmacao() {

        $titulo = 'Cadastro';

        $errors = array();
        $filterOp = filter_input(INPUT_POST, 'form-submitted');

        if (isset($filterOp)) {

            $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
            $solicitacao = filter_input(INPUT_POST, 'solicitacao', FILTER_SANITIZE_SPECIAL_CHARS);
            $gestor = filter_input(INPUT_POST, 'gestor', FILTER_SANITIZE_SPECIAL_CHARS);
            
            try {
                $this->confirmacoesService->createNewConfirmacao($solicitacao, $gestor);
                $this->redirect('index.php');
                return;
            } catch (ValidationException $e) {
                $errors = $e->getErrors();
            }
        }

        include 'view/confirmacao-form.php';
    }

    public function updateConfirmacao() {

        $titulo = 'Editar';

        $errors = array();
        $filterOp = filter_input(INPUT_POST, 'form-submitted');

        if (isset($filterOp)) {

            $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
            $solicitacao = filter_input(INPUT_POST, 'solicitacao', FILTER_SANITIZE_SPECIAL_CHARS);
            $gestor = filter_input(INPUT_POST, 'gestor', FILTER_SANITIZE_SPECIAL_CHARS);

            
            
            try {
                $this->confirmacoesService->editConfirmacao($id, $solicitacao, $gestor);
                $this->redirect('index.php');
                return;
            } catch (ValidationException $e) {
                $errors = $e->getErrors();
            }
        }

        include 'view/confirmacao-form.php';
    }

    public function deleteConfirmacao() {

        $filterId = filter_input(INPUT_GET, 'id');
        $id = isset($filterId) ? $filterId : NULL;

        if (!$id) {
            throw new Exception('Ocorreu um erro.');
        }

        $this->confirmacoesService->deleteConfirmacao($id);
        $this->redirect('index.php');
    }

    public function showConfirmacao() {

        $filterId = filter_input(INPUT_GET, 'id');
        $id = isset($filterId) ? $filterId : NULL;

        if (!$id) {
            throw new Exception('Ocorreu um erro.');
        }

        $confirmacao = $this->confirmacoesService->getConfirmacao($id);

        include 'view/confirmacao.php';
    }

    public function showError($title, $message) {
        include 'view/erro.php';
    }
}
