<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */
require_once 'IGenericas.php';
/**
 * Description of Usuario
 *
 * @author ndonge
 */
interface IUsuariosRepository extends IGenericas {
    //put your code here
   
    public function insert($usuario, $senha, $confirmacao, $papel, $email, $foto);
    
    public function update($id, $usuario, $senha, $confirmacao, $papel, $email, $foto, $estado);
    
    public function delete($id);
}
