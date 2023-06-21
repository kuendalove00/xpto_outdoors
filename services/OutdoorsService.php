<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

require_once 'repositories/OutdoorsRepository.php';

/**
 * Description of Outdoor
 *
 * @author ndonge
 */
class OutdoorsService {
    //put your code here
    private $repositorioOutdoors = NULL;

    public function __construct() {
        $this->repositorioOutdoors = new OutdoorsRepository();
    }

    public function getAllOutdoor() {
        try {

            $res = $this->repositorioOutdoors->selectAll();
            return $res;
        } catch (Exception $e) {
        }
    }

    public function getOutdoor($id) {
        try {
            $res = $this->repositorioOutdoors->selectById($id);
            return $res;
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function createNewOutdoor($tipo, $comuna, $estado, $preco, $foto) {
        try {

            $res = $this->repositorioOutdoors->insert($tipo, $comuna, $estado, $preco, $foto);
            return $res;
        } catch (Exception $e) {
            throw $e;
        }
    }
    
    public function editOutdoor($id, $tipo, $comuna, $estado, $preco, $foto) {
        try {

            $res = $this->repositorioOutdoors->update($id, $tipo, $comuna, $estado, $preco, $foto);
            return $res;
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function deleteOutdoor($id) {
        try {
            $res = $this->repositorioOutdoors->delete($id);
            return $res;
        } catch (Exception $e) {
            throw $e;
        }
    }

}
