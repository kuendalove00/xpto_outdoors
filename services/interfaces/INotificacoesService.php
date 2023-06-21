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
interface INotificacoesService {
    //put your code here

    public function getAllNotificacoes();

    public function getNotificacoes($id);  

    public function createNewNotificacoes($nome, $descricao, $gestor, $cliente);
    
    public function editNotificacoes($id, $nome, $descricao, $gestor, $cliente);

    public function deleteNotificacoes($id);
}
