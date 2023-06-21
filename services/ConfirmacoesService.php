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
class ConfirmacoesService {
    //put your code here
    private $repositorioConfirmacoes = NULL;

    public function __construct() {
        $this->repositorioConfirmacoes = new ConfirmacoesRepository();
    }

    public function getAllConfirmacoes() {
        try {

            $res = $this->repositorioConfirmacoes->selectAll();
            return $res;
        } catch (Exception $e) {
        }
    }

    public function getConfirmacao($id) {
        try {
            $res = $this->repositorioConfirmacoes->selectById($id);
            return $res;
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function createNewConfirmacao($solicitacao, $gestor) {
        try {

            $res = $this->repositorioConfirmacoes->insert($solicitacao, $gestor);
            return $res;
        } catch (Exception $e) {
            throw $e;
        }
    }
    
    public function editConfirmacao($id, $solicitacao, $gestor) {
        try {

            $res = $this->repositorioConfirmacoes->update($id, $solicitacao, $gestor);
            return $res;
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function deleteConfirmacao($id) {
        try {
            $res = $this->repositorioConfirmacoes->delete($id);
            return $res;
        } catch (Exception $e) {
            throw $e;
        }
    }

}
