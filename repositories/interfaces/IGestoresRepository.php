<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */
require_once 'IGenericas.php';
/**
 * Description of Gestor
 *
 * @author ndonge
 */
interface IGestoresRepository extends IGenericas {
    //put your code here
    public function insert($nome, $comuna, $morada, $uid);
    
    public function update($nome, $comuna, $morada, $uid);
    
    public function delete($id);
}