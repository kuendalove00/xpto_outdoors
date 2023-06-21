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
interface ISolicitacoesService {
    //put your code here

    public function getAllSolicitacoes();

    public function getSolicitacao($id);

    public function createNewSolicitacao($nome, $tipo, $actividade, $comuna, $nacionalidade, $morada, $uid);
    
    public function editSolicitacao($nome, $tipo, $actividade, $comuna, $nacionalidade, $morada, $uid);

    public function deleteSolicitacao($id);
}
