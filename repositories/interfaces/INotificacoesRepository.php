<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of Notificacao
 *
 * @author ndonge
 */
interface INotificacoesRepository extends IGenericas {
    //put your code here
    public function insert($nome, $descricao, $gestor, $cliente);
    
    public function update($nome, $descricao, $gestor, $cliente);       
    
    public function delete($id);
    
}
