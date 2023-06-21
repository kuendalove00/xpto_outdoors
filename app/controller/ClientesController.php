<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

require_once "services/ClientesService.php";
require_once "services/ComunasService.php";
require_once "services/NacionalidadesService.php";
require_once "services/UsuariosService.php";
require_once "services/ContactosService.php";
require_once "services/EmailService.php";

/**
 * Description of Cliente
 *
 * @author ndonge
 */
class ClientesController {
    //put your code here
    private $clientesService = NULL;
    private $comunasService = NULL;
    private $nacionalidadesService = NULL;
    private $usuariosService = NULL;
    private $contactosService = NULL;
    private $mail;

    public function __construct() {
        $this->clientesService = new ClientesService();
        $this->comunasService = new ComunasService();
        $this->nacionalidadesService = new NacionalidadesService();
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
        $clientes = $this->clientesService->getAllClientes();
        $comunas = $this->comunasService;
        $contactos = $this->contactosService;
        $nacionalidades = $this->nacionalidadesService;
        
        
        include 'view/clientes.php';
    }

    public function saveCliente() {

        $titulo = 'Cadastro';

        $errors = array();
        $filterOp = filter_input(INPUT_POST, 'form-submitted');

        if (isset($filterOp)) {

        $temp = explode(".", $_FILES["foto"]["name"]);
        $ficheiro = round(microtime(true)) . '.' . end($temp);
      
        // Location
        $destino = 'content/images/uploads/usuarios/clientes/'.$ficheiro;
      
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
            $papel = 3;
            
             //var_dump($usuario.' '.$email.' '.$senha.' '.$confirmacao.' '.$papel.' '.$foto);
            
            $uid = $this->usuariosService->createNewUsuario($usuario, $senha, $confirmacao, $papel, $email, $foto);

            $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
            $tipo = filter_input(INPUT_POST, 'tipo', FILTER_VALIDATE_INT);
            $actividade = filter_input(INPUT_POST, 'atividade', FILTER_SANITIZE_SPECIAL_CHARS);
            $comuna = filter_input(INPUT_POST, 'comuna', FILTER_VALIDATE_INT);
            $nacionalidade = filter_input(INPUT_POST, 'nacionalidade', FILTER_VALIDATE_INT);
            $morada = filter_input(INPUT_POST, 'morada', FILTER_SANITIZE_SPECIAL_CHARS);
            $terminal = filter_input(INPUT_POST, 'tel', FILTER_SANITIZE_SPECIAL_CHARS);
            $uid = filter_var($uid, FILTER_VALIDATE_INT);
            
            try {
                $this->clientesService->createNewCliente($nome, $tipo, $actividade, $comuna, $nacionalidade, $morada, $uid);
                $this->contactosService->createNewContacto($terminal, $uid);
                $this->mail = EmailService::emailInstance($email);
                //$this->redirect('index.php');
                return;
            } catch (ValidationException $e) {
                $errors = $e->getErrors();
            }
        }

        $comunas = $this->comunasService->getAllComunas();
        $nacionalidades = $this->nacionalidadesService->getAllNacionalidades();
        
        
        include 'view/registo.php';
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
