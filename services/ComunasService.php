<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

require_once 'repositories/ComunasRepository.php';

/**
 * Description of Comuna
 *
 * @author ndonge
 */
class ComunasService {
    //put your code here
    private $repositorioComunas = NULL;

    public function __construct() {
        $this->repositorioComunas = new ComunasRepository();
    }

    public function getAllComunas() {
        try {

            $res = $this->repositorioComunas->selectAll();
            return $res;
        } catch (Exception $e) {
        }
    }

    public function getComuna($id) {
        try {
            $res = $this->repositorioComunas->selectById($id);
            return $res;
        } catch (Exception $e) {
            throw $e;
        }
    }

}
