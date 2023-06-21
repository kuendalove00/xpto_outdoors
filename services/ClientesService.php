<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

require_once 'repositories/ClientesRepository.php';

/**
 * Description of Cliente
 *
 * @author ndonge
 */
class ClientesService {
    //put your code here
    private $repositorioClientes = NULL;

    public function __construct() {
        $this->repositorioClientes = new ClientesRepository();
    }

    public function getAllClientes() {
        try {

            $res = $this->repositorioClientes->selectAll();
            return $res;
        } catch (Exception $e) {
        }
    }

    public function getCliente($id) {
        try {
            $res = $this->repositorioClientes->selectById($id);
            return $res;
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function createNewCliente($nome, $tipo, $actividade, $comuna, $nacionalidade, $morada, $uid) {
        try {

            $res = $this->repositorioClientes->insert($nome, $tipo, $actividade, $comuna, $nacionalidade, $morada, $uid);
            return $res;
        } catch (Exception $e) {
            throw $e;
        }
    }
    
    public function editCliente($id,$nome, $tipo, $actividade, $comuna, $nacionalidade, $morada, $uid) {
        try {

            $res = $this->repositorioClientes->update($id, $nome, $tipo, $actividade, $comuna, $nacionalidade, $morada, $uid);
            return $res;
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function deleteCliente($id) {
        try {
            $res = $this->repositorioClientes->delete($id);
            return $res;
        } catch (Exception $e) {
            throw $e;
        }
    }

}
