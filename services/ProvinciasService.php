<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

require_once 'repositories/ProvinciasRepository.php';
/**
 * Description of Provincia
 *
 * @author kuenda
 */
class ProvinciasService {
    //put your code here
    
    private $repositorioProvincias = NULL;

    public function __construct() {
        $this->repositorioProvincias = new ProvinciasRepository();
    }

    public function getAllProvincias() {
        try {

            $res = $this->repositorioProvincias->selectAll();
            return $res;
        } catch (Exception $e) {
        }
    }

    public function getProvincia($id) {
        try {
            $res = $this->repositorioProvincias->selectById($id);
            return $res;
        } catch (Exception $e) {
            throw $e;
        }
    }
}
