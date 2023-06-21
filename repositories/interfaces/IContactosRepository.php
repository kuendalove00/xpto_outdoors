<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of Contacto
 *
 * @author ndonge
 */
interface IContactosRepository extends IGenericas {
    //put your code here
    public function insert($terminal, $uid);
    
    public function update($terminal, $uid);
    
    
    
}
