<?php



/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

require_once "services/TiposOutdoorService.php";
/**
 * Description of TipoOutdoor
 *
 * @author ndonge
 */
class TiposOutdoorController {
    //put your code here
    private $tiposOutdoorService = NULL;

    public function __construct() {
        $this->tiposOutdoorService = new TiposOutdoorService();
    }

    public function redirect($location) {
        header('Location: ' . $location);
    }

    public function requestsHandler() {

        $filterOp = filter_input(INPUT_GET, 'op');
        $op = isset($filterOp) ? $filterOp : NULL;

        try {
            if (!$op || $op == 'list') {
                $this->listTiposOutdoor();
            } else if ($op == 'new') {
                $this->saveTipoOutdoor();
            }else if ($op == 'edit') {
                $this->updateTipoOutdoor();
            } else if ($op == 'delete') {
                $this->deleteTipoOutdoor();
            } else if ($op == 'details') {
                $this->showTipoOutdoor();
            } else {
                $this->showError("Page not found", "Page for operation " . $op . " was not found!");
            }
        } catch (Exception $e) {
            // some unknown Exception got through here, use application error page to display it
            $this->showError("Application error", $e->getMessage());
        }
    }

    public function listTiposOutdoor() {
        $tipos = $this->tiposOutdoorService->getAllTiposOutdoor();
        var_dump($tipos);
        include 'view/tipos.php';
    }

    public function saveTipoOutdoor() {

        $titulo = 'Cadastro';

        $errors = array();
        $filterOp = filter_input(INPUT_POST, 'form-submitted');

        if (isset($filterOp)) {

            $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
            
            try {
                $this->tiposOutdoorService->createNewTipoOutdoor($nome);
                $this->redirect('index.php');
                return;
            } catch (ValidationException $e) {
                $errors = $e->getErrors();
            }
        }

        include 'view/novo-tipo.php';
    }
    
    public function updateTipoOutdoor() {

        $titulo = 'Editar';

        $errors = array();
        $filterOp = filter_input(INPUT_POST, 'form-submitted');

        if (isset($filterOp)) {

            $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
            $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
            
            try {
                $this->tiposOutdoorService->editTipoOutdoor($id, $nome);
                $this->redirect('index.php');
                return;
            } catch (ValidationException $e) {
                $errors = $e->getErrors();
            }
        }

        include 'view/tipo-form.php';
    }

    public function deleteTipoOutdoor() {

        $filterId = filter_input(INPUT_GET, 'id');
        $id = isset($filterId) ? $filterId : NULL;

        if (!$id) {
            throw new Exception('Ocorreu um erro.');
        }

        $this->tiposOutdoorService->deleteTipoOutdoor($id);
        $this->redirect('index.php');
    }

    public function showTipoOutdoor() {

        $filterId = filter_input(INPUT_GET, 'id');
        $id = isset($filterId) ? $filterId : NULL;

        if (!$id) {
            throw new Exception('Ocorreu um erro.');
        }

        $tipo = $this->tiposOutdoorService->getTipoOutdoor($id);

        include 'view/tipo.php';
    }

    public function showError($title, $message) {
        include 'view/erro.php';
    }

}
