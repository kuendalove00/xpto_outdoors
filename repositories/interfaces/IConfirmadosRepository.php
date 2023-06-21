<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */
require_once 'IGenericas.php';

/**
 * Description of Confirmado
 *
 * @author ndonge
 */
interface IConfirmadosRepository extends IGenericas {
    //put your code here
     public function insert($solicitacao, $gestor);
     
     public function update($solicitacao, $gestor);
     
     public function delete($id);

}
