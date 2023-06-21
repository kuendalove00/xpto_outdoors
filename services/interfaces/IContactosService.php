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
interface IContactosService {
    //put your code here

    public function getAllContactos();
    
    public function getContacto($id);

    public function createNewContacto($terminal, $uid);
    
    public function editContacto($terminal, $uid);

    public function deleteContacto($id);


}
