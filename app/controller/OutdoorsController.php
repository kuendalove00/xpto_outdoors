<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

require_once "services/OutdoorsService.php";
require_once "services/TiposOutdoorService.php";
require_once "services/ProvinciasService.php";



/**
 * Description of Outdoor
 *
 * @author ndonge
 */
class OutdoorsController {
    //put your code here
    private $outdoorsService = NULL;
    private $tiposOutdoorsService = NULL;
    private $provinciasService = NULL;


    public function __construct() {
        $this->outdoorsService = new OutdoorsService();
        $this->tiposOutdoorsService = new TiposOutdoorService();
        $this->provinciasService = new ProvinciasService();
    }

    public function redirect($location) {
        header('Location: ' . $location);
    }

    public function requestsHandler() {

        $filterOp = filter_input(INPUT_GET, 'op');
        $op = isset($filterOp) ? $filterOp : NULL;

        try {
            if (!$op || $op == 'list') {
                $this->listOutdoors();
            }else if ($op == 'new') {
                $this->saveOutdoor();
            }
            else if ($op == 'edit') {
                $this->updateOutdoor();
            } else if ($op == 'delete') {
                $this->deleteOutdoor();
            } else if ($op == 'details') {
                $this->showOutdoor();
            } else {
                $this->showError("Page not found", "Page for operation " . $op . " was not found!");
            }
        } catch (Exception $e) {
            // some unknown Exception got through here, use application error page to display it
            $this->showError("Application error", $e->getMessage());
        }
    }

    public function listOutdoors() {
        //$outdoors = $this->outdoorsService->getAllOutdoors();
        $provincias = $this->provinciasService->getAllProvincias();
        $tipos = $this->tiposOutdoorsService->getAllTiposOutdoor();
        
        include 'index.php';
    }
    
    public function listOutdoorsProps() {
        $outdoors = $this->outdoorsService->getAllOutdoors();
        
                
        include 'view/outdoors.php';
    }

    public function saveOutdoor() {

        $titulo = 'Cadastro';

        $errors = array();
        $filterOp = filter_input(INPUT_POST, 'form-submitted');

        if (isset($filterOp)) {

            // File name
        $ficheiro = $_FILES['foto']['name'];
      
        // Location
        $destino = 'content/images/uploads/outdoors/'.$ficheiro;
      
        // file extension
        $extensao = pathinfo(
            $destino, PATHINFO_EXTENSION);
             
        $extensao = strtolower($extensao);
      
        // Valid image extension
        $validos = array("png","jpeg","jpg");
      
        if(in_array($extensao, $validos)) {
  
            // Upload file
            if(move_uploaded_file($_FILES['foto']['tmp_name'],$destino) ) {
 
                // Execute query
                $foto = $destino;
            }
        }
            
            $tipo = filter_input(INPUT_POST, 'tipo', FILTER_VALIDATE_INT);
            $comuna = filter_input(INPUT_POST, 'comuna', FILTER_VALIDATE_INT);
            $estado = 1;
            $preco = filter_input(INPUT_POST, 'preco', FILTER_VALIDATE_FLOAT);
            $comuna = null;
            
            
            try {
                var_dump($tipo, $comuna, $estado, $preco, $foto);
                $this->outdoorsService->createNewOutdoor($tipo, $comuna, $estado, $preco, $foto);
                
                //$this->redirect('index.php');
                return;
            } catch (ValidationException $e) {
                $errors = $e->getErrors();
            }
        }

        $tipos = $this->tiposOutdoorsService->getAllTiposOutdoor();
        include 'view/novo-outdoor.php';
    }
    
    public function updateOutdoor() {

        $titulo = 'Editar';

        $errors = array();
        $filterOp = filter_input(INPUT_POST, 'form-submitted');

        if (isset($filterOp)) {

            $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
            $tipo = filter_input(INPUT_POST, 'tipo', FILTER_SANITIZE_SPECIAL_CHARS);
            $comuna = filter_input(INPUT_POST, 'comuna', FILTER_SANITIZE_SPECIAL_CHARS);
            $estado = filter_input(INPUT_POST, 'estado', FILTER_SANITIZE_SPECIAL_CHARS);
            $preco = filter_input(INPUT_POST, 'preco', FILTER_SANITIZE_SPECIAL_CHARS);
            $foto = filter_input(INPUT_POST, 'foto', FILTER_VALIDATE_INT);
            
            try {
                $this->outdoorsService->editOutdoor($id, $tipo, $comuna, $estado, $preco, $foto);
                $this->redirect('index.php');
                return;
            } catch (ValidationException $e) {
                $errors = $e->getErrors();
            }
        }

        include 'view/novo-outdoor.php';
    }

    public function deleteOutdoor() {

        $filterId = filter_input(INPUT_GET, 'id');
        $id = isset($filterId) ? $filterId : NULL;

        if (!$id) {
            throw new Exception('Ocorreu um erro.');
        }

        $this->outdoorsService->deleteOutdoor($id);
        $this->redirect('index.php');
    }

    public function showOutdoor() {

        $filterId = filter_input(INPUT_GET, 'id');
        $id = isset($filterId) ? $filterId : NULL;

        if (!$id) {
            throw new Exception('Ocorreu um erro.');
        }

        $outdoor = $this->outdoorsService->getOutdoor($id);

        include 'view/outdoor.php';
    }

    public function showError($title, $message) {
        include 'view/erro.php';
    }

}
