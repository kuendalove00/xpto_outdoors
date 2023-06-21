<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of Confirmado
 *
 * @author ndonge
 */
interface IConfirmacoesService {
    //put your code here

    public function getAllConfirmacoes();

    public function getConfirmacao($id);

    public function createNewConfirmacao($solicitacao, $gestor);
    
    public function editConfirmacao($id, $solicitacao, $gestor);

    public function deleteConfirmacao($id);

}
