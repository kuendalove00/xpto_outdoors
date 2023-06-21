<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */
require_once "services/UsuariosService.php";
/**
 * Description of Usuario
 *
 * @author ndonge
 */
class UsuariosController {
    //put your code here
    private $usuariosService = NULL;
    private $mail;

    public function __construct() {
        $this->usuariosService = new UsuariosService();
    }

    public function redirect($location) {
        header('Location: ' . $location);
    }

    public function requestsHandler() {

        $filterOp = filter_input(INPUT_GET, 'op');
        $op = isset($filterOp) ? $filterOp : NULL;

        try {
            if (!$op || $op == 'list') {
                $this->listUsuarios();
            } else if ($op == 'new') {
                $this->saveUsuario();
            }else if ($op == 'edit') {
                $this->updateUsuario();
            } else if ($op == 'delete') {
                $this->deleteUsuario();
            } else if ($op == 'details') {
                $this->showUsuario();
            }  else if ($op == 'verify') {
                $this->verifyCredentials();
            } else if ($op == 'active') {
                $this->updateEstadoUsuario(1);
            }else {
                $this->showError("Page not found", "Page for operation " . $op . " was not found!");
            }
        } catch (Exception $e) {
            // some unknown Exception got through here, use application error page to display it
            $this->showError("Application error", $e->getMessage());
        }
    }

    public function listUsuarios() {
        $usuarios = $this->usuariosService->getAllUsuarios();
        include 'view/usuarios.php';
    }

    public function saveUsuario() {

        $titulo = 'Cadastro';

        $errors = array();
        $filterOp = filter_input(INPUT_POST, 'form-submitted');

        if (isset($filterOp)) {

            $usuario = filter_input(INPUT_POST, 'usuario', FILTER_SANITIZE_SPECIAL_CHARS);
            $senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_SPECIAL_CHARS);
            $confirmacao = filter_input(INPUT_POST, 'confirmacao', FILTER_SANITIZE_SPECIAL_CHARS);
            $papel = filter_input(INPUT_POST, 'papel', FILTER_SANITIZE_SPECIAL_CHARS);
            $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_SPECIAL_CHARS);
            $foto = filter_input(INPUT_POST, 'foto', FILTER_SANITIZE_SPECIAL_CHARS);
            
            try {
                $id = $this->usuariosService->createNewUsuario($usuario, $senha, $confirmacao, $papel, $email, $foto);
                return $id;
            } catch (ValidationException $e) {
                $errors = $e->getErrors();
            }
        }

        include 'view/usuario-form.php';
    }
    
    public function updateUsuario() {

        $titulo = 'Editar';

        $errors = array();
        $filterOp = filter_input(INPUT_POST, 'form-submitted');

        if (isset($filterOp)) {

            $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
            $usuario = filter_input(INPUT_POST, 'usuario', FILTER_SANITIZE_SPECIAL_CHARS);
            $senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_SPECIAL_CHARS);
            $confirmacao = filter_input(INPUT_POST, 'confirmacao', FILTER_SANITIZE_SPECIAL_CHARS);
            $papel = filter_input(INPUT_POST, 'papel', FILTER_SANITIZE_SPECIAL_CHARS);
            $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_SPECIAL_CHARS);
            $foto = filter_input(INPUT_POST, 'foto', FILTER_SANITIZE_SPECIAL_CHARS);
            
            
            try {
                $this->usuariosService->editUsuario($id, $usuario, $senha, $confirmacao, $papel, $email, $foto);
                $this->redirect('index.php');
                return;
            } catch (ValidationException $e) {
                $errors = $e->getErrors();
            }
        }
    }
        
        public function updateEstadoUsuario($estado) {

        $titulo = 'Editar';

        $errors = array();
         $filterOp = filter_input(INPUT_GET, 'id');
        $op = isset($filterOp) ? $filterOp : NULL;

        if (isset($filterOp)) {

            $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
            
            try {
                $this->usuariosService->changeState($id, $estado);
                $email = $this->usuariosService->getUsuario($id)->getEmail();
                $this->mail = EmailService::emailInstance($email);
                $this->redirect('index.php');
                return;
            } catch (ValidationException $e) {
                $errors = $e->getErrors();
            }
        }

        include 'view/usuario-form.php';
    }

    public function deleteUsuario() {

        $filterId = filter_input(INPUT_GET, 'id');
        $id = isset($filterId) ? $filterId : NULL;

        if (!$id) {
            throw new Exception('Ocorreu um erro.');
        }

        $this->usuariosService->deleteUsuario($id);
        $this->redirect('index.php');
    }

    public function showUsuario() {

        $filterId = filter_input(INPUT_GET, 'id');
        $id = isset($filterId) ? $filterId : NULL;

        if (!$id) {
            throw new Exception('Ocorreu um erro.');
        }

        $usuario = $this->usuariosService->getUsuario($id);

        include 'view/usuario.php';
    }
    
    public function verifyCredentials() {

       $titulo = 'Cadastro';

        $errors = array();
        $filterOp = filter_input(INPUT_POST, 'form-submitted');

        if (isset($filterOp)) {
            
            echo 'Chegou';
            return;

            $usuario = filter_input(INPUT_POST, 'usuario', FILTER_SANITIZE_SPECIAL_CHARS);
            $senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_SPECIAL_CHARS);
            $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_SPECIAL_CHARS);
            
            try {
                $res = $this->usuariosService->getUsuarioByCredentials($usuario, $email, $senha);
                if($res)
                {
                    session_start();
                    $_SESSION['usuario'] = $nome;
                    $_SESSION['email'] = $email;
                    $_SESSION['senha'] = $senha;
                    $_SESSION['foto'] = $res->getFoto();
                    $_SESSION['papel'] = $res->getPapel();
                
                } else {
                    echo 'Dados incorrectos';
                }
            } catch (ValidationException $e) {
                $errors = $e->getErrors();
            }
        }

        include 'view/login.php';
    
    }

    public function showError($title, $message) {
        include 'view/erro.php';
    }
}
