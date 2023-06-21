<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of Confirmado
 *
 * @author ndonge
 */
class Confirmado {
    //put your code here
    private $id; 
    private $solicitado;
    private $gestor;
    private $criacao;
    
    public function getId() {
        return $this->id;
    }

    public function getSolicitado() {
        return $this->solicitado;
    }

    public function getGestor() {
        return $this->gestor;
    }

    public function getCriacao() {
        return $this->criacao;
    }

    public function setSolicitado($solicitado): void {
        $this->solicitado = $solicitado;
    }

    public function setGestor($gestor): void {
        $this->gestor = $gestor;
    }

}
