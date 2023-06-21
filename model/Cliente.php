<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

require_once 'Usuario.php';

/**
 * Description of Cliente
 *
 * @author ndonge
 */
class Cliente extends Usuario {
    //put your code here
    private $id; 
    private $nome;
    private $tipo;
    private $actividade;
    private $comuna;
    private $nacionalidade;
    private $morada;
    private $uid;
    private $criacao;
    
    public function getId() {
        return $this->id;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getTipo() {
        return $this->tipo;
    }

    public function getActividade() {
        return $this->actividade;
    }

    public function getComuna() {
        return $this->comuna;
    }

    public function getNacionalidade() {
        return $this->nacionalidade;
    }

    public function getMorada() {
        return $this->morada;
    }

    public function getUid() {
        return $this->uid;
    }

    public function getCriacao() {
        return $this->criacao;
    }

    public function setNome($nome): void {
        $this->nome = $nome;
    }

    public function setTipo($tipo): void {
        $this->tipo = $tipo;
    }

    public function setActividade($actividade): void {
        $this->actividade = $actividade;
    }

    public function setComuna($comuna): void {
        $this->comuna = $comuna;
    }

    public function setNacionalidade($nacionalidade): void {
        $this->nacionalidade = $nacionalidade;
    }

    public function setMorada($morada): void {
        $this->morada = $morada;
    }

    public function setUid($uid): void {
        $this->uid = $uid;
    }

    
    
    public function __construct($id, $nome, $tipo, $actividade, $comuna, $nacionalidade, $morada, $uid, $criacao) {
        $this->id = $id;
        $this->nome = $nome;
        $this->tipo = $tipo;
        $this->actividade = $actividade;
        $this->comuna = $comuna;
        $this->nacionalidade = $nacionalidade;
        $this->morada = $morada;
        $this->uid = $uid;
        $this->criacao = $criacao;
    }

}
