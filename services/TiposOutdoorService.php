<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

require_once 'repositories/TiposOutdoorRepository.php';

/**
 * Description of TipoOutdoor
 *
 * @author ndonge
 */
class TiposOutdoorService {
    //put your code here
    private $repositorioTiposOutdoor = NULL;

    public function __construct() {
        $this->repositorioTiposOutdoor = new TiposOutdoorRepository();
    }

    public function getAllTiposOutdoor() {
        try {

            $res = $this->repositorioTiposOutdoor->selectAll();
            return $res;
        } catch (Exception $e) {
        }
    }

    public function getTipoOutdoor($id) {
        try {
            $res = $this->repositorioTiposOutdoor->selectById($id);
            return $res;
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function createNewTipoOutdoor($nome) {
        try {

            $res = $this->repositorioTiposOutdoor->insert($nome);
            return $res;
        } catch (Exception $e) {
            throw $e;
        }
    }
    
    public function editTipoOutdoor($id,$nome) {
        try {

            $res = $this->repositorioTiposOutdoor->update($id, $nome);
            return $res;
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function deleteTipoOutdoor($id) {
        try {
            $res = $this->repositorioTiposOutdoor->delete($id);
            return $res;
        } catch (Exception $e) {
            throw $e;
        }
    }
}
