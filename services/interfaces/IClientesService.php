<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of Cliente
 *
 * @author ndonge
 */
interface IClientesService {
    //put your code here
    public function createNewCliente($nome, $tipo, $actividade, $comuna, $nacionalidade, $morada, $uid);
    
    public function editCliente($id, $nome, $tipo, $actividade, $comuna, $nacionalidade, $morada, $uid);

    public function deleteCliente($id);

}
