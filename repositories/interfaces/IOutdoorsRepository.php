<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

require_once 'IGenericas.php';

/**
 * Description of Outdoor
 *
 * @author ndonge
 */
interface IOutdoorsRepository extends IGenericas{
    //put your code here
    
     public function insert($tipo, $comuna, $estado, $preco, $foto);
     
     public function update($tipo, $comuna, $estado, $preco, $foto);

     public function delete($id);
}
