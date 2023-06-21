<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of Funcionario
 *
 * @author ndonge
 */
interface IFuncionariosService {
    //put your code here

    public function getAllFuncionarios();

    public function getFuncionario($id);

    public function createNewFuncionario($nome, $comuna, $morada, $uid);
    
    public function editFuncionario($id, $nome, $comuna, $morada, $uid);

    public function deleteFuncionario($id);
}