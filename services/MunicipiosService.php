<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */
require_once 'repositories/MunicipiosRepository.php';
/**
 * Description of Municipio
 *
 * @author ndonge
 */
class MunicipiosService {
    //put your code here
    private $repositorioMunicipios = NULL;

    public function __construct() {
        $this->repositorioMunicipios = new MunicipiosRepository();
    }

    public function getAllMunicipios() {
        try {

            $res = $this->repositorioMunicipios->selectAll();
            return $res;
        } catch (Exception $e) {
        }
    }

    public function getMunicipio($id) {
        try {
            $res = $this->repositorioMunicipios->selectById($id);
            return $res;
        } catch (Exception $e) {
            throw $e;
        }
    }
}
