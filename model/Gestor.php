<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of Funcionario
 *
 * @author ndonge
 */
class Gestor extends Gestor {
    //put your code here
    private $id; 
    private $nome;
    private $comuna;
    private $morada;
    private $criacao;
    
    public function getId() {
        return $this->id;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getComuna() {
        return $this->comuna;
    }

    public function getMorada() {
        return $this->morada;
    }

    public function getCriacao() {
        return $this->criacao;
    }

    public function setNome($nome): void {
        $this->nome = $nome;
    }

    public function setComuna($comuna): void {
        $this->comuna = $comuna;
    }

    public function setMorada($morada): void {
        $this->morada = $morada;
    }
    
    public function __construct($id, $nome, $comuna, $morada, $criacao) {
        $this->id = $id;
        $this->nome = $nome;
        $this->comuna = $comuna;
        $this->morada = $morada;
        $this->criacao = $criacao;
    }
}