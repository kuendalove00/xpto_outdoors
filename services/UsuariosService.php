<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */
require_once 'repositories/UsuariosRepository.php';

/**
 * Description of Usuario
 *
 * @author ndonge
 */
class UsuariosService {
    //put your code here
    private $repositorioUsuarios = NULL;

    public function __construct() {
        $this->repositorioUsuarios = new UsuariosRepository();
    }

    public function getAllUsuarios() {
        try {

            $res = $this->repositorioUsuarios->selectAll();
            return $res;
        } catch (Exception $e) {
        }
    }

    public function getUsuario($id) {
        try {
            $res = $this->repositorioUsuarios->selectById($id);
            return $res;
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function getUsuarioByCredentials($user, $email, $senha) {
        try {
            $res = $this->repositorioUsuarios->selectByCredentials($user, $email, $senha);
            return $res;
        } catch (Exception $e) {
            throw $e;
        }
    }
    
    public function createNewUsuario($usuario, $senha, $confirmacao, $papel, $email, $foto) {
        try {

            $res = $this->repositorioUsuarios->insert($usuario, $senha, $confirmacao, $papel, $email, $foto);
            return $res;
        } catch (Exception $e) {
            throw $e;
        }
    }
    
    public function editUsuario($id, $usuario, $senha, $confirmacao, $papel, $email, $foto, $estado) {
        try {

            $res = $this->repositorioUsuarios->update($id, $usuario, $senha, $confirmacao, $papel, $email, $foto, $estado);
            return $res;
        } catch (Exception $e) {
            throw $e;
        }
    }
    
    public function changeState($id, $estado) {
        try {

            $res = $this->repositorioUsuarios->updateState($id, $estado);
            return $res;
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function deleteUsuario($id) {
        try {
            $res = $this->repositorioUsuarios->delete($id);
            return $res;
        } catch (Exception $e) {
            throw $e;
        }
    }

}
