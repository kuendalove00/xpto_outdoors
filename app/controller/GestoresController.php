<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

require_once "services/GestoresService.php";
require_once "services/ComunasService.php";
require_once "services/UsuariosService.php";
require_once "services/ContactosService.php";

/**
 * Description of Gestor
 *
 * @author ndonge
 */
class GestoresController {
    //put your code here
    private $gestoresService = NULL;
    private $comunasService = NULL;
    private $usuariosService = NULL;
    private $contactosService = NULL;

    public function __construct() {
        $this->gestoresService = new GestoresService();
        $this->comunasService = new ComunasService();
        $this->usuariosService = new UsuariosService();
        $this->contactosService = new ContactosService();
    }

    public function redirect($location) {
        header('Location: ' . $location);
    }

    public function requestsHandler() {

        $filterOp = filter_input(INPUT_GET, 'op');
        $op = isset($filterOp) ? $filterOp : NULL;

        try {
            if (!$op || $op == 'list') {
                $this->listGestores();
            } else if ($op == 'new') {
                $this->saveGestor();
            }else if ($op == 'edit') {
                $this->updateGestor();
            } else if ($op == 'delete') {
                $this->deleteGestor();
            } else if ($op == 'details') {
                $this->showGestor();
            } else {
                $this->showError("Page not found", "Page for operation " . $op . " was not found!");
            }
        } catch (Exception $e) {
            // some unknown Exception got through here, use application error page to display it
            $this->showError("Application error", $e->getMessage());
        }
    }

    public function listGestores() {
        $gestores = $this->gestoresService->getAllGestores();
        include 'view/gestores.php';
    }

    public function saveGestor() {

        $titulo = 'Cadastro';

        $errors = array();
        $filterOp = filter_input(INPUT_POST, 'form-submitted');

         if (isset($filterOp)) {
            
        $ficheiro = $_FILES['foto']['name'];
      
        // Location
        $destino = 'content/images/uploads/usuarios/gestores/'.$ficheiro;
      
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
        
            $usuario = filter_input(INPUT_POST, 'usuario', FILTER_SANITIZE_SPECIAL_CHARS);
            $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
            $senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_SPECIAL_CHARS);
            $confirmacao = filter_input(INPUT_POST, 'confirmar', FILTER_SANITIZE_SPECIAL_CHARS);
            $papel = 2;
            
             //var_dump($usuario.' '.$email.' '.$senha.' '.$confirmacao.' '.$papel.' '.$foto);
            
            $uid = $this->usuariosService->createNewUsuario($usuario, $senha, $confirmacao, $papel, $email, $foto);

            $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
            $comuna = filter_input(INPUT_POST, 'comuna', FILTER_VALIDATE_INT);
            $morada = filter_input(INPUT_POST, 'morada', FILTER_SANITIZE_SPECIAL_CHARS);
            $terminal = filter_input(INPUT_POST, 'tel', FILTER_SANITIZE_SPECIAL_CHARS);
            $uid = filter_var($uid, FILTER_VALIDATE_INT);
            
            try {
                $this->gestoresService->createNewGestor($nome, $comuna, $morada, $uid);
                $this->contactosService->createNewContacto($terminal, $uid);
                //$this->redirect('index.php');
                return;
            } catch (ValidationException $e) {
                $errors = $e->getErrors();
            }
        }

        $comunas = $this->comunasService->getAllComunas();

        include 'view/registo-gestor.php';
    }
    
    public function updateGestor() {

        $titulo = 'Editar';

        $errors = array();
        $filterOp = filter_input(INPUT_POST, 'form-submitted');

        if (isset($filterOp)) {

            $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
            $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
            $comuna = filter_input(INPUT_POST, 'comuna', FILTER_SANITIZE_SPECIAL_CHARS);
            $morada = filter_input(INPUT_POST, 'morada', FILTER_SANITIZE_SPECIAL_CHARS);
            $uid = filter_input(INPUT_POST, 'uid', FILTER_VALIDATE_INT);
            
            try {
                $this->gestoresService->editGestor($id, $nome, $comuna, $morada, $uid);
                $this->redirect('index.php');
                return;
            } catch (ValidationException $e) {
                $errors = $e->getErrors();
            }
        }

        include 'view/gestor-form.php';
    }

    public function deleteGestor() {

        $filterId = filter_input(INPUT_GET, 'id');
        $id = isset($filterId) ? $filterId : NULL;

        if (!$id) {
            throw new Exception('Ocorreu um erro.');
        }

        $this->gestoresService->deleteGestor($id);
        $this->redirect('index.php');
    }

    public function showGestor() {

        $filterId = filter_input(INPUT_GET, 'id');
        $id = isset($filterId) ? $filterId : NULL;

        if (!$id) {
            throw new Exception('Ocorreu um erro.');
        }

        $gestor = $this->gestoresService->getGestor($id);

        include 'view/gestor.php';
    }

    public function showError($title, $message) {
        include 'view/erro.php';
    }
}