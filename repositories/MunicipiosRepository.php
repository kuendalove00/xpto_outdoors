<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */
require_once 'model/Municipio.php';
require_once 'interfaces/IMunicipiosRepository.php';
require_once 'dbconfig/DbConnection.php';
/**
 * Description of Municipio
 *
 * @author ndonge
 */
class MunicipiosRepository implements IGenericas {
    //put your code here
    private $db;

    function __construct() {
        $this->db = DbConnection::getInstance();
    }

    public function selectAll() {
        $municipios = Array();
        $stmt = $this->db->prepare("SELECT * FROM municipio");
        $stmt->execute();
        $result = $stmt->fetchAll();

        foreach ($result as $municipio) {
            $municipios[] = new Municipio($municipio['id_mun'], $municipio['nome'], $municipio['id_prov']);
        }
        return $municipio;
    }

    public function selectById($id) {

        $stmt = $this->db->prepare("SELECT * FROM municipio WHERE id_mun = :id");
        $stmt->execute(['id' => $id]);
        $municipio = $stmt->fetch();

        return new Municipio($municipio['id_mun'], $municipio['nome'], $municipio['id_prov']);
    }
    
}
