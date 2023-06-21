<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of Comuna
 *
 * @author ndonge
 */
class Comuna {
    //put your code here
    private $id;
    private $nome;
    private $municipio;
    
    public function getId() {
        return $this->id;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getMunicipio() {
        return $this->municipio;
    }

    public function __construct($id, $nome, $municipio) {
        $this->id = $id;
        $this->nome = $nome;
        $this->municipio = $municipio;
    }

}
