<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */
require_once 'model/Nacionalidade.php';
require_once 'interfaces/IGenericas.php';
require_once 'dbconfig/DbConnection.php';
/**
 * Description of Nacionalidade
 *
 * @author ndonge
 */
class NacionalidadesRepository implements IGenericas {
    //put your code here
    private $db;

    function __construct() {
        $this->db = DbConnection::getInstance();
    }

    public function selectAll() {
        $nacionalidades = Array();
        $stmt = $this->db->prepare("SELECT * FROM nacionalidade");
        $stmt->execute();
        $result = $stmt->fetchAll();

        foreach ($result as $nacionalidade) {
            $nacionalidades[] = new Nacionalidade($nacionalidade['id_nac'], $nacionalidade['pais'], $nacionalidade['nacionalidade']);
        }
        return $nacionalidades;
    }

    public function selectById($id) {

        $stmt = $this->db->prepare("SELECT * FROM nacionalidade WHERE id_nac = :id");
        $stmt->execute(['id' => $id]);
        $nacionalidade = $stmt->fetch();

        return new Nacionalidade($nacionalidade['id_nac'], $nacionalidade['pais'], $nacionalidade['nacionalidade']);
    }
    
}
