<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of Contacto
 *
 * @author ndonge
 */
class Contacto {
    //put your code here
    private $terminal;
    private $uid;

    public function getTerminal() {
        return $this->terminal;
    }

    public function getUid() {
        return $this->uid;
    }

    public function setTerminal($terminal): void {
        $this->terminal = $terminal;
    }

    public function setUid($uid): void {
        $this->uid = $uid;
    }

    public function __construct($terminal, $uid) {
        $this->terminal = $terminal;
        $this->uid = $uid;
    }


}
