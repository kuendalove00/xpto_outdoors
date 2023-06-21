<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of Nacionalidade
 *
 * @author ndonge
 */
class Nacionalidade {
    //put your code here
    private $id;
    private $pais;
    private $nacionalidade;
    
    public function getId() {
        return $this->id;
    }

    public function getPais() {
        return $this->pais;
    }

    public function getNacionalidade() {
        return $this->nacionalidade;
    }

    public function __construct($id, $pais, $nacionalidade) {
        $this->id = $id;
        $this->pais = $pais;
        $this->nacionalidade = $nacionalidade;
    }

    
}
