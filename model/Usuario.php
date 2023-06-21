<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of Usuario
 *
 * @author ndonge
 */
class Usuario {
    //put your code here
    private $id;   
    private $nome;
    private $pwd;
    private $confirm_pwd;
    private $papel;
    private $foto;
    private $email;
    private $estado;
    private $criacao;
    
    public function getId() {
        return $this->id;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getPwd() {
        return $this->pwd;
    }

    public function getConfirm_pwd() {
        return $this->confirm_pwd;
    }

    public function getPapel() {
        return $this->papel;
    }

    public function getFoto() {
        return $this->foto;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getCriacao() {
        return $this->criacao;
    }
    
    public function getEstado() {
        return $this->estado;
    }

    public function setEstado($estado): void {
        $this->estado = $estado;
    }

    
    public function setNome($nome): void {
        $this->nome = $nome;
    }

    public function setPwd($pwd): void {
        $this->pwd = $pwd;
    }

    public function setConfirm_pwd($confirm_pwd): void {
        $this->confirm_pwd = $confirm_pwd;
    }

    public function setPapel($papel): void {
        $this->papel = $papel;
    }

    public function setFoto($foto): void {
        $this->foto = $foto;
    }

    public function setEmail($email): void {
        $this->email = $email;
    }

    public function __construct($id, $nome, $pwd, $confirm_pwd, $papel, $foto, $email, $estado, $criacao) {
        $this->id = $id;
        $this->nome = $nome;
        $this->pwd = $pwd;
        $this->confirm_pwd = $confirm_pwd;
        $this->papel = $papel;
        $this->foto = $foto;
        $this->email = $email;
        $this->estado = $estado;
        $this->criacao = $criacao;
    }


}
