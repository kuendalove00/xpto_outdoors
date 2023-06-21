<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

require_once 'model/TipoOutdoor.php';
require_once 'interfaces/ITiposOutdoorRepository.php';
require_once 'dbconfig/DbConnection.php';

/**
 * Description of TipoOutdoor
 *
 * @author ndonge
 */
class TiposOutdoorRepository implements ITiposOutdoorRepository {
    //put your code here
    private $db;

    function __construct() {
        $this->db = DbConnection::getInstance();
    }

    public function selectAll() {
        $tipos = Array();
        $stmt = $this->db->prepare("SELECT * FROM tipo_outdoor");
        $stmt->execute();
        $result = $stmt->fetchAll();

        foreach ($result as $tipo) {
            $tipos[] = new TipoOutdoor($tipo['id_tipo_odr'], $tipo['nome'], $tipo['criacao']);
        }
        return $tipos;
    }

    public function selectById($id) {

        $stmt = $this->db->prepare("SELECT * FROM tipo_outdoor WHERE id_tipo_odr = :id");
        $stmt->execute(['id' => $id]);
        $tipo = $stmt->fetch();

        return new TipoOutdoor($tipo['id_tipo_odr'], $tipo['nome'], $tipo['criacao']);
    }

    public function insert($nome) {

        try {
            $stmt = $this->db->prepare("INSERT INTO tipo_outdoor(`nome`) VALUES(:nome)");
            $stmt->bindparam(":nome", $nome);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
    
     public function update($id, $nome) {

        try {
            $stmt = $this->db->prepare("UPDATE tipo_outdoor SET nome=:nome WHERE id_tipo_odr=:id");
            $stmt->bindparam(":nome", $nome);
            $stmt->bindparam(":id", $id);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function delete($id) {

        try {

            $stmt = $this->db->prepare("DELETE FROM tipo_outdoor WHERE id_tipo_odr=:id");
            $stmt->bindparam(":id", $id);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

}
