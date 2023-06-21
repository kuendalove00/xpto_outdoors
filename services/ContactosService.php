<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */
require_once 'repositories/ContactosRepository.php';
/**
 * Description of Contacto
 *
 * @author ndonge
 */
class ContactosService {
    //put your code here
    private $repositorioContactos = NULL;

    public function __construct() {
        $this->repositorioContactos = new ContactosRepository();
    }

    public function getAllContactos() {
        try {

            $res = $this->repositorioContactos->selectAll();
            return $res;
        } catch (Exception $e) {
        }
    }

    public function getContacto($id) {
        try {
            $res = $this->repositorioContactos->selectById($id);
            return $res;
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function createNewContacto($terminal, $uid) {
        try {

            $res = $this->repositorioContactos->insert($terminal, $uid);
            return $res;
        } catch (Exception $e) {
            throw $e;
        }
    }
    
    public function editContacto($terminal, $uid) {
        try {

            $res = $this->repositorioContactos->update($terminal, $uid);
            return $res;
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function deleteContacto($id) {
        try {
            $res = $this->repositorioContactos->delete($id);
            return $res;
        } catch (Exception $e) {
            throw $e;
        }
    }


}
