<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

require_once 'model/Comuna.php';
require_once 'interfaces/IGenericas.php';
require_once 'dbconfig/DbConnection.php';

/**
 * Description of Comuna
 *
 * @author ndonge
 */
class ComunasRepository implements IGenericas {
    //put your code here
     private $db;

    function __construct() {
        $this->db = DbConnection::getInstance();
    }

    public function selectAll() {
        $comunas = Array();
        $stmt = $this->db->prepare("SELECT * FROM comuna");
        $stmt->execute();
        $result = $stmt->fetchAll();

        foreach ($result as $comuna) {
            $comunas[] = new Comuna($comuna['id_comuna'], $comuna['nome'], $comuna['id_mun']);
        }
        return $comunas;
    }

    public function selectById($id) {

        $stmt = $this->db->prepare("SELECT * FROM comuna WHERE id_comuna = :id");
        $stmt->execute(['id' => $id]);
        $comuna = $stmt->fetch();

        return new Comuna($comuna['id_comuna'], $comuna['nome'], $comuna['id_mun']);
    }

}
