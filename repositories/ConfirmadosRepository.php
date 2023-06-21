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
class ConfirmadoRepository implements IConfirmadoRepository{
    //put your code here
    private $db;

    function __construct() {
        $this->db = DbConnection::getInstance();
    }

    public function selectAll() {
        $confirmados = Array();
        $stmt = $this->db->prepare("SELECT * FROM confirmado");
        $stmt->execute();
        $result = $stmt->fetchAll();

        foreach ($result as $confirmado) {
            $confirmados[] = new Confirmado($confirmado['id_confirm'], $confirmado['id_solicitado'], $confirmado['uid'], $confirmado['criacao']);
        }
        return $confirmados;
    }

    public function selectById($id) {

        $stmt = $this->db->prepare("SELECT * FROM confirmado WHERE id_confirm = :id");
        $stmt->execute(['id' => $id]);
        $confirmado = $stmt->fetch();

        return new Confirmado($confirmado['id_confirm'], $confirmado['id_solicitado'], $confirmado['uid'], $confirmado['criacao']);
    }

    public function insert($solicitacao, $gestor) {

        try {
            $stmt = $this->db->prepare("INSERT INTO confirmado VALUES(:solicitacao, :gestor)");
            $stmt->bindparam(":solicitacao", $solicitacao);
            $stmt->bindparam(":gestor", $gestor);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
    
     public function update($solicitacao, $gestor) {

        try {
            $stmt = $this->db->prepare("UPDATE confirmado SET id_solicitado=:solicitacao, uid=:gestor)");
            $stmt->bindparam(":solicitacao", $solicitacao);
            $stmt->bindparam(":gestor", $gestor);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function delete($id) {

        try {

            $stmt = $this->db->prepare("DELETE FROM confirmado WHERE id_confirm=:id");
            $stmt->bindparam(":id", $id);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

}
