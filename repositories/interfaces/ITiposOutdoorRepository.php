<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

require_once 'IGenericas.php';

/**
 * Description of TipoOutdoor
 *
 * @author ndonge
 */
interface ITiposOutdoorRepository extends IGenericas {
    //put your code here
    
    public function insert($nome);
    
    public function update($id, $nome);
    
    public function delete($id);
}
