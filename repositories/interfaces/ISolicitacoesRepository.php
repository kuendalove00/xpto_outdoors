<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of Alugado
 *
 * @author ndonge
 */
interface ISolicitacoesRepository extends IGenericas {
    //put your code here
    
   public function insert($cliente, $outdoor, $data_inicial, $data_final, $comprovativo);
   
   public function update($cliente, $outdoor, $data_inicial, $data_final, $comprovativo);
   
   public function delete($id);
}
