<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of Alugado
 *
 * @author ndonge
 */
class SolicitacoesController {
    //put your code here
    private $solicitacoesService = NULL;

    public function __construct() {
        $this->solicitacoesService = new SolicitacoesService();
    }

    public function redirect($location) {
        header('Location: ' . $location);
    }

    public function requestsHandler() {

        $filterOp = filter_input(INPUT_GET, 'op');
        $op = isset($filterOp) ? $filterOp : NULL;

        try {
            if (!$op || $op == 'list') {
                $this->listSolicitacoes();
            } else if ($op == 'new') {
                $this->saveSolicitacao();
            }else if ($op == 'edit') {
                $this->updateSolicitacao();
            } else if ($op == 'delete') {
                $this->deleteSolicitacao();
            } else if ($op == 'details') {
                $this->showSolicitacao();
            } else {
                $this->showError("Page not found", "Page for operation " . $op . " was not found!");
            }
        } catch (Exception $e) {
            // some unknown Exception got through here, use application error page to display it
            $this->showError("Application error", $e->getMessage());
        }
    }

    public function listSolicitacoes() {
        $solicitacoes = $this->solicitacoesService->getAllSolicitacoes();
        include 'view/solicitacoes.php';
    }

    public function saveSolicitacao() {

        $titulo = 'Cadastro';

        $errors = array();
        $filterOp = filter_input(INPUT_POST, 'form-submitted');

        if (isset($filterOp)) {

            $cliente = filter_input(INPUT_POST, 'cliente', FILTER_SANITIZE_SPECIAL_CHARS);
            $outdoor = filter_input(INPUT_POST, 'outdoor', FILTER_SANITIZE_SPECIAL_CHARS);
            $data_inicial = filter_input(INPUT_POST, 'data_inicial', FILTER_SANITIZE_SPECIAL_CHARS);
            $data_final = filter_input(INPUT_POST, 'data_final', FILTER_SANITIZE_SPECIAL_CHARS);
            $comprovativo = filter_input(INPUT_POST, 'comprovativo', FILTER_SANITIZE_SPECIAL_CHARS);
            
            
            try {
                $this->solicitacoesService->createNewSolicitacao($cliente, $outdoor, $data_inicial, $data_final, $comprovativo);
                $this->redirect('index.php');
                return;
            } catch (ValidationException $e) {
                $errors = $e->getErrors();
            }
        }

        include 'view/solicitacao-form.php';
    }
    
    public function updateSolicitacao() {

        $titulo = 'Editar';

        $errors = array();
        $filterOp = filter_input(INPUT_POST, 'form-submitted');

        if (isset($filterOp)) {

            $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
            $cliente = filter_input(INPUT_POST, 'cliente', FILTER_SANITIZE_SPECIAL_CHARS);
            $outdoor = filter_input(INPUT_POST, 'outdoor', FILTER_SANITIZE_SPECIAL_CHARS);
            $data_inicial = filter_input(INPUT_POST, 'data_inicial', FILTER_SANITIZE_SPECIAL_CHARS);
            $data_final = filter_input(INPUT_POST, 'data_final', FILTER_SANITIZE_SPECIAL_CHARS);
            $comprovativo = filter_input(INPUT_POST, 'comprovativo', FILTER_SANITIZE_SPECIAL_CHARS);

            
            try {
                $this->solicitacoesService->editSolicitacao($id, $cliente, $outdoor, $data_inicial, $data_final, $comprovativo);
                $this->redirect('index.php');
                return;
            } catch (ValidationException $e) {
                $errors = $e->getErrors();
            }
        }

        include 'view/solicitacao-form.php';
    }

    public function deleteSolicitacao() {

        $filterId = filter_input(INPUT_GET, 'id');
        $id = isset($filterId) ? $filterId : NULL;

        if (!$id) {
            throw new Exception('Ocorreu um erro.');
        }

        $this->solicitacoesService->deleteSolicitacao($id);
        $this->redirect('index.php');
    }

    public function showSolicitacao() {

        $filterId = filter_input(INPUT_GET, 'id');
        $id = isset($filterId) ? $filterId : NULL;

        if (!$id) {
            throw new Exception('Ocorreu um erro.');
        }

        $solicitacao = $this->solicitacoesService->getSolicitacao($id);

        include 'view/solicitacao.php';
    }

    public function showError($title, $message) {
        include 'view/erro.php';
    }

}
