<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of Outdoor
 *
 * @author ndonge
 */
interface IOutdoorsService {
    //put your code here

    public function getAllOutdoor();

    public function getOutdoor($id);

    public function createNewOutdoor($tipo, $comuna, $estado, $preco, $foto);
    
    public function editOutdoor($id, $tipo, $comuna, $estado, $preco, $foto);

    public function deleteOutdoor($id);

}
