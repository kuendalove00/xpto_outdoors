<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */
require_once 'model/Provincia.php';
require_once 'interfaces/IGenericas.php';
require_once 'dbconfig/DbConnection.php';
/**
 * Description of Provincia
 *
 * @author kuenda
 */
class ProvinciasRepository implements IGenericas {
    //put your code here
   private $db;

    function __construct() {
        $this->db = DbConnection::getInstance();
    }

    public function selectAll() {
        $provincias = Array();
        $stmt = $this->db->prepare("SELECT * FROM provincia");
        $stmt->execute();
        $result = $stmt->fetchAll();

        foreach ($result as $provincia) {
            $provincias[] = new Provincia($provincia['id_prov'], $provincia['nome']);
        }
        return $provincias;
    }

    public function selectById($id) {

        $stmt = $this->db->prepare("SELECT * FROM provincia WHERE id_prov = :id");
        $stmt->execute(['id' => $id]);
        $provincia = $stmt->fetch();

        return new Provincia($provincia['id_prov'], $provincia['nome']);
    }
}
