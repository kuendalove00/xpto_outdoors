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
class SolicitadoRepository implements ISolicitadoRepository{
    //put your code here
    private $db;

    function __construct() {
        $this->db = DbConnection::getInstance();
    }

    public function selectAll() {
        $solicitacoes = Array();
        $stmt = $this->db->prepare("SELECT * FROM solicitado");
        $stmt->execute();
        $result = $stmt->fetchAll();

        foreach ($result as $solicitacao) {
            $solicitacoes[] = new Solicitado($solicitacao['id'], $solicitacao['uid'], $solicitacao['id_odr'], $solicitacao['data_inicial'], $solicitacao['data_final'], $solicitacao['comprovativo'], $solicitacao['criacao']);
        }
        return $solicitacao;
    }

    public function selectById($id) {

        $stmt = $this->db->prepare("SELECT * FROM solicitado WHERE id_solicitado = :id");
        $stmt->execute(['id' => $id]);
        $solicitacao = $stmt->fetch();

        return new Solicitado($solicitacao['id'], $solicitacao['uid'], $solicitacao['id_odr'], $solicitacao['data_inicial'], $solicitacao['data_final'], $solicitacao['comprovativo'], $solicitacao['criacao']);
    }

    public function insert($cliente, $outdoor, $data_inicial, $data_final, $comprovativo) {

        try {
            $stmt = $this->db->prepare("INSERT INTO solicitado VALUES(:cliente, :outdoor, :data_inicial, :data_final, :comprovativo)");
            $stmt->bindparam(":cliente", $cliente);
            $stmt->bindparam(":outdoor", $outdoor);
            $stmt->bindparam(":data_inicial", $data_inicial);
            $stmt->bindparam(":data_final", $data_final);
            $stmt->bindparam(":comprovativo", $comprovativo);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
    
     public function update($cliente, $outdoor, $data_inicial, $data_final, $comprovativo) {

        try {
            $stmt = $this->db->prepare("UPDATE solicitado SET uid=:cliente, id_odr=:outdoor, data_inicial=:data_inicial, data_final=:data_final, comprovativo=:comprovativo)");
            $stmt->bindparam(":cliente", $cliente);
            $stmt->bindparam(":outdoor", $outdoor);
            $stmt->bindparam(":data_inicial", $data_inicial);
            $stmt->bindparam(":data_final", $data_final);
            $stmt->bindparam(":comprovativo", $comprovativo);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function delete($id) {

        try {

            $stmt = $this->db->prepare("DELETE FROM solicitacao WHERE id_solicitado=:id");
            $stmt->bindparam(":id", $id);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
}
