<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of Notificacao
 *
 * @author ndonge
 */
class Notificacao {
    //put your code here
    private $id; 
    private $assunto;
    private $gestor;
    private $cliente;
    private $descricao;
    private $criacao;
    
    public function getId() {
        return $this->id;
    }

    public function getAssunto() {
        return $this->assunto;
    }

    public function getGestor() {
        return $this->gestor;
    }

    public function getCliente() {
        return $this->cliente;
    }

    public function getDescricao() {
        return $this->descricao;
    }

    public function getCriacao() {
        return $this->criacao;
    }

    public function setAssunto($assunto): void {
        $this->assunto = $assunto;
    }

    public function setGestor($gestor): void {
        $this->gestor = $gestor;
    }

    public function setCliente($cliente): void {
        $this->cliente = $cliente;
    }

    public function setDescricao($descricao): void {
        $this->descricao = $descricao;
    }
    
    public function __construct($id, $assunto, $gestor, $cliente, $descricao, $criacao) {
        $this->id = $id;
        $this->assunto = $assunto;
        $this->gestor = $gestor;
        $this->cliente = $cliente;
        $this->descricao = $descricao;
        $this->criacao = $criacao;
    }
}
