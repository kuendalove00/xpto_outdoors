<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of Alugado
 *
 * @author ndonge
 */
class Solicitado {
    //put your code here
    private $id;
    private $nome;
    private $outdoor;
    private $cliente;
    private $comprovativo;
    private $data_ini;
    private $data_fim;
    private $criacao;
    
    public function getId() {
        return $this->id;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getOutdoor() {
        return $this->outdoor;
    }

    public function getCliente() {
        return $this->cliente;
    }

    public function getComprovativo() {
        return $this->comprovativo;
    }

    public function getData_ini() {
        return $this->data_ini;
    }

    public function getData_fim() {
        return $this->data_fim;
    }

    public function getCriacao() {
        return $this->criacao;
    }

    public function setNome($nome): void {
        $this->nome = $nome;
    }

    public function setOutdoor($outdoor): void {
        $this->outdoor = $outdoor;
    }

    public function setCliente($cliente): void {
        $this->cliente = $cliente;
    }

    public function setComprovativo($comprovativo): void {
        $this->comprovativo = $comprovativo;
    }

    public function setData_ini($data_ini): void {
        $this->data_ini = $data_ini;
    }

    public function setData_fim($data_fim): void {
        $this->data_fim = $data_fim;
    }
    
    public function __construct($id, $nome, $outdoor, $cliente, $comprovativo, $data_ini, $data_fim, $criacao) {
        $this->id = $id;
        $this->nome = $nome;
        $this->outdoor = $outdoor;
        $this->cliente = $cliente;
        $this->comprovativo = $comprovativo;
        $this->data_ini = $data_ini;
        $this->data_fim = $data_fim;
        $this->criacao = $criacao;
    }

}
