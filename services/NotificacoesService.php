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
class NotificacoesService {
    //put your code here
    private $repositorioNotificacoes = NULL;

    public function __construct() {
        $this->repositorioNotificacoes = new repositorioNotificacoes();
    }

    public function getAllNotificacoes() {
        try {

            $res = $this->repositorioNotificacoes->selectAll();
            return $res;
        } catch (Exception $e) {
        }
    }

    public function getNotificacoes($id) {
        try {
            $res = $this->repositorioNotificacoes->selectById($id);
            return $res;
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function createNewNotificacoes($nome, $descricao, $gestor, $cliente) {
        try {

            $res = $this->repositorioNotificacoes->insert($nome, $descricao, $gestor, $cliente);
            return $res;
        } catch (Exception $e) {
            throw $e;
        }
    }
    
    public function editNotificacoes($id, $nome, $descricao, $gestor, $cliente) {
        try {

            $res = $this->repositorioNotificacoes->update($id, $nome, $descricao, $gestor, $cliente);
            return $res;
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function deleteNotificacoes($id) {
        try {
            $res = $this->repositorioNotificacoes->delete($id);
            return $res;
        } catch (Exception $e) {
            throw $e;
        }
    }
}
