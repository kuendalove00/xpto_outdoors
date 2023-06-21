<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of TipoOutdoor
 *
 * @author ndonge
 */
interface ITiposOutdoorService {
    //put your code here

    public function getAllTiposOutdoor();

    public function getTipoOutdoor($id);

    public function createNewTipoOutdoor($nome);
    
    public function editTipoOutdoor($nome);

    public function deleteTipoOutdoor($id);
}
