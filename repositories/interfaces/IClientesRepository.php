<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */
require_once 'IGenericas.php';

/**
 * Description of Cliente
 *
 * @author ndonge
 */
interface IClientesRepository extends IGenericas {
    //put your code here
    
    public function insert($nome, $tipo, $actividade, $comuna, $nacionalidade, $morada, $uid);
    
    public function update($nome, $tipo, $actividade, $comuna, $nacionalidade, $morada);
    
    public function delete($id);

}
