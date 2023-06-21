<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of TipoOutdoor
 *
 * @author ndonge
 */
class TipoOutdoor {
    //put your code here
    private $id;
    private $nome;
    private $criacao;
    
    public function getId() {
        return $this->id;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getCriacao() {
        return $this->criacao;
    }

    public function setNome($nome): void {
        $this->nome = $nome;
    }
    
    public function __construct($id, $nome, $criacao) {
        $this->id = $id;
        $this->nome = $nome;
        $this->criacao = $criacao;
    }

}
