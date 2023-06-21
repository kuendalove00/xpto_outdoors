<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */
require_once 'model/Contacto.php';
require_once 'interfaces/IContactosRepository.php';
require_once 'dbconfig/DbConnection.php';
/**
 * Description of Contacto
 *
 * @author ndonge
 */
class ContactosRepository implements IContactosRepository {
    //put your code here
     private $db;

    function __construct() {
        $this->db = DbConnection::getInstance();
    }

    public function selectAll() {
        $contactos = Array();
        $stmt = $this->db->prepare("SELECT * FROM contacto");
        $stmt->execute();
        $result = $stmt->fetchAll();

        foreach ($result as $contacto) {
            $contactos[] = new Contacto($contacto['terminal'], $contacto['uid'], $contacto['criacao']);
        }
        return $contactos;
    }

    public function selectById($id) {

        $stmt = $this->db->prepare("SELECT * FROM contacto WHERE uid=:id");
        $stmt->execute(['id' => $id]);
        $contacto = $stmt->fetch();

        return new Contacto($contacto['terminal'], $contacto['uid']);
    }

    public function insert($terminal, $uid) {

        var_dump($terminal.' '.$uid);
        
        try {
            $stmt = $this->db->prepare("INSERT INTO contacto(`terminal`, `uid`) VALUES(:terminal, :uid)");
            $stmt->bindparam(":terminal", $terminal);
            $stmt->bindparam(":uid", $uid);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
    
     public function update($terminal, $uid) {

        try {
            $stmt = $this->db->prepare("UPDATE contacto SET terminal=:terminal, uid=:gestor)");
            $stmt->bindparam(":terminal", $terminal);
            $stmt->bindparam(":uid", $uid);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

}
