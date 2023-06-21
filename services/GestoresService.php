<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

require_once 'repositories/GestoresRepository.php';
/**
 * Description of Gestor
 *
 * @author ndonge
 */
class GestoresService {
    //put your code here
    private $repositorioGestores = NULL;

    public function __construct() {
        $this->repositorioGestores = new GestoresRepository();
    }

    public function repositorioGestores() {
        try {

            $res = $this->repositorioGestores->selectAll();
            return $res;
        } catch (Exception $e) {
        }
    }

    public function getGestor($id) {
        try {
            $res = $this->repositorioGestores->selectById($id);
            return $res;
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function createNewGestor($nome, $comuna, $morada, $uid) {
        try {

            $res = $this->repositorioGestores->insert($nome, $comuna, $morada, $uid);
            return $res;
        } catch (Exception $e) {
            throw $e;
        }
    }
    
    public function editGestor($id, $nome, $comuna, $morada, $uid) {
        try {

            $res = $this->repositorioGestores->update($id, $nome, $comuna, $morada, $uid);
            return $res;
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function deleteGestor($id) {
        try {
            $res = $this->repositorioGestores->delete($id);
            return $res;
        } catch (Exception $e) {
            throw $e;
        }
    }
}