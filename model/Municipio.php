<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of Municipio
 *
 * @author ndonge
 */
class Municipio {
    //put your code here
    private $id;
    private $nome;
    private $provincia;
    
    public function getId() {
        return $this->id;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getProvincia() {
        return $this->provincia;
    }

    public function __construct($id, $nome, $provincia) {
        $this->id = $id;
        $this->nome = $nome;
        $this->provincia = $provincia;
    }

    
}
