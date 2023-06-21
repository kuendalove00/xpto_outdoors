<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of Outdoor
 *
 * @author ndonge
 */
class Outdoor {
    //put your code here
    private $id;
    private $tipo;
    private $comuna;
    private $estado;
    private $preco;
    private $photo;
    private $criacao;
    
    public function getId() {
        return $this->id;
    }

    public function getTipo() {
        return $this->tipo;
    }

    public function getComuna() {
        return $this->comuna;
    }

    public function getEstado() {
        return $this->estado;
    }

    public function getPreco() {
        return $this->preco;
    }

    public function getPhoto() {
        return $this->photo;
    }

    public function getCriacao() {
        return $this->criacao;
    }

    public function setTipo($tipo): void {
        $this->tipo = $tipo;
    }

    public function setComuna($comuna): void {
        $this->comuna = $comuna;
    }

    public function setEstado($estado): void {
        $this->estado = $estado;
    }

    public function setPreco($preco): void {
        $this->preco = $preco;
    }

    public function setPhoto($photo): void {
        $this->photo = $photo;
    }

}
