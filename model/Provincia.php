<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of Provincia
 *
 * @author kuenda
 */
class Provincia {
    //put your code here
    
    private $id;
    
    private $nome;
    
    public function getId() {
        return $this->id;
    }

    public function getNome() {
        return $this->nome;
    }

    public function __construct($id, $nome) {
        $this->id = $id;
        $this->nome = $nome;
    }


}
