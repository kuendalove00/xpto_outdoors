<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

require_once 'model/Outdoor.php';
require_once 'interfaces/IOutdoorsRepository.php';
require_once 'dbconfig/DbConnection.php';

/**
 * Description of Outdoor
 *
 * @author ndonge
 */
class OutdoorsRepository implements IOutdoorsRepository {
    //put your code here
    private $db;

    function __construct() {
        $this->db = DbConnection::getInstance();
    }

    public function selectAll() {
        $outdoors = Array();
        $stmt = $this->db->prepare("SELECT * FROM outdoor");
        $stmt->execute();
        $result = $stmt->fetchAll();

        foreach ($result as $outdoor) {
            $outdoors[] = new Outdoor($outdoor['id'], $outdoor['id_tipo_odr'], $outdoor['comuna'], $outdoor['estado'], $outdoor['preco'], $outdoor['photo'], $outdoor['criacao']);
        }
        return $outdoors;
    }

    public function selectById($id) {

        $stmt = $this->db->prepare("SELECT * FROM outdoor WHERE id_odr = :id");
        $stmt->execute(['id' => $id]);
        $outdoor = $stmt->fetch();

        return new Outdoor($outdoor['id'], $outdoor['id_tipo_odr'], $outdoor['comuna'], $outdoor['estado'], $outdoor['preco'], $outdoor['photo'], $outdoor['criacao']);
    }

    public function insert($tipo, $comuna, $estado, $preco, $foto) {

        try {
            $stmt = $this->db->prepare("INSERT INTO  outdoor(`id_tipo_odr`, `id_comuna`, `estado`, `preco`, `photo`) VALUES(:tipo, :comuna, :estado, :preco, :foto)");
            $stmt->bindparam(":tipo", $tipo);
            $stmt->bindparam(":comuna", $comuna);    
            $stmt->bindparam(":estado", $estado);
            $stmt->bindparam(":preco", $preco);
            $stmt->bindparam(":foto", $foto);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
    
     public function update($tipo, $comuna, $estado, $preco, $foto) {

        try {
            $stmt = $this->db->prepare("UPDATE outdoor SET nome=:nome, tipo=:tipo, actividade=:actividade, comuna=:comuna, nacionalidade=:nacionalidade, morada=:morada)");
            $stmt->bindparam(":tipo", $tipo);
            $stmt->bindparam(":comuna", $comuna);    
            $stmt->bindparam(":estado", $estado);
            $stmt->bindparam(":preco", $preco);
            $stmt->bindparam(":foto", $foto);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function delete($id) {

        try {

            $stmt = $this->db->prepare("DELETE FROM outdoor WHERE id_odr=:id");
            $stmt->bindparam(":id", $id);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

}
