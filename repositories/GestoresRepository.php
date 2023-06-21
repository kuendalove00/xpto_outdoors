<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */
require_once 'model/Gestor.php';
require_once 'interfaces/IGestoresRepository.php';
require_once 'dbconfig/DbConnection.php';
/**
 * Description of Gestor
 *
 * @author ndonge
 */
class GestoresRepository implements IGestoresRepository {
    //put your code here
    private $db;

    function __construct() {
        $this->db = DbConnection::getInstance();
    }

    public function selectAll() {
        $gestores = Array();
        $stmt = $this->db->prepare("SELECT * FROM gestor");
        $stmt->execute();
        $result = $stmt->fetchAll();

        foreach ($result as $gestores) {
            $gestores[] = new Gestor($gestores['id'], $gestores['nome'], $gestores['comuna'], $gestores['morada'], $gestores['uid'], $gestores['criacao']);
        }
        return $gestores;
    }

    public function selectById($id) {

        $stmt = $this->db->prepare("SELECT * FROM gestor WHERE id_gestor = :id");
        $stmt->execute(['id' => $id]);
        $gestor = $stmt->fetch();

        return new Gestor($gestor['id'], $gestor['nome'], $gestor['comuna'], $gestor['morada'], $gestor['uid'], $gestor['criacao']);
    }

    public function insert($nome, $comuna, $morada, $uid) {

        try {
            $stmt = $this->db->prepare("INSERT INTO gestor(`nome`, `id_com`, `morada`, `uid`) VALUES(:nome, :comuna, :morada, :uid)");
            $stmt->bindparam(":nome", $nome);
            $stmt->bindparam(":comuna", $comuna);    
            $stmt->bindparam(":morada", $morada);
            $stmt->bindparam(":uid", $uid);
            $stmt->execute();
            $id = $this->db->lastInsertId();
            return $id;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
    
     public function update($nome, $comuna, $morada, $uid) {

        try {
            $stmt = $this->db->prepare("UPDATE gestor SET nome=:nome, tipo=:tipo, actividade=:actividade, comuna=:comuna, nacionalidade=:nacionalidade, morada=:morada)");
            $stmt->bindparam(":name", $nome);
            $stmt->bindparam(":comuna", $comuna);    
            $stmt->bindparam(":morada", $morada);
            $stmt->bindparam(":iud", $iud);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function delete($id) {

        try {

            $stmt = $this->db->prepare("DELETE FROM gestor WHERE id_gestor=:id");
            $stmt->bindparam(":id", $id);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
}