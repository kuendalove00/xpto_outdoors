<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

require_once 'repositories/NacionalidadesRepository.php';

/**
 * Description of Nacionalidade
 *
 * @author ndonge
 */
class NacionalidadesService {
    //put your code here
    private $repositorioNacionalidades = NULL;

    public function __construct() {
        $this->repositorioNacionalidades = new NacionalidadesRepository();
    }

    public function getAllNacionalidades() {
        try {

            $res = $this->repositorioNacionalidades->selectAll();
            return $res;
        } catch (Exception $e) {
        }
    }

    public function getNacionalidade($id) {
        try {
            $res = $this->repositorioNacionalidades->selectById($id);
            return $res;
        } catch (Exception $e) {
            throw $e;
        }
    }

}
