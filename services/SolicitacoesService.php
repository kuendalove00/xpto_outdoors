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
class SolicitacoesService {
    //put your code here
   private $repositorioSolicitacoes = NULL;

    public function __construct() {
        $this->repositorioSolicitacoes = new SolicitadoRepository();
    }

    public function getAllSolicitacoes() {
        try {

            $res = $this->repositorioSolicitacoes->selectAll();
            return $res;
        } catch (Exception $e) {
        }
    }

    public function getSolicitacao($id) {
        try {
            $res = $this->repositorioSolicitacoes->selectById($id);
            return $res;
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function createNewSolicitacao($cliente, $outdoor, $data_inicial, $data_final, $comprovativo) {
        try {

            $res = $this->repositorioSolicitacoes->insert($cliente, $outdoor, $data_inicial, $data_final, $comprovativo);
            return $res;
        } catch (Exception $e) {
            throw $e;
        }
    }
    
    public function editSolicitacao($id,$cliente, $outdoor, $data_inicial, $data_final, $comprovativo) {
        try {

            $res = $this->repositorioSolicitacoes->update($id, $cliente, $outdoor, $data_inicial, $data_final, $comprovativo);
            return $res;
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function deleteSolicitacao($id) {
        try {
            $res = $this->repositorioSolicitacoes->delete($id);
            return $res;
        } catch (Exception $e) {
            throw $e;
        }
    }
}
