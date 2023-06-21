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
interface IUsuariosService {
    //put your code here

    public function getAllUsuarios();

    public function getUsuarios($id);

    public function createNewUsuarios($usuario, $senha, $confirmacao, $papel, $email, $foto);
    
    public function editUsuarios($id, $usuario, $senha, $confirmacao, $papel, $email, $foto);

    public function deleteUsuarios($id);

}
