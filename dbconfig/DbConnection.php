<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

define("DB_host", "localhost");
define("DB_user", "root");
define("DB_pwd", " ");
define("DB_name", "xptoutdoors");

/**
 * Description of DbConnection
 *
 * @author ndonge
 */
class DbConnection {
    //put your code here
    
    private static $instance = NULL;
    
    public static function getInstance() {

        if (!isset(self::$instance)) {
            try {
                self:: $instance = new PDO("mysql:host=".DB_host.";dbname=".DB_name, DB_user, "");
                self:: $instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }
        return self::$instance;
    }
}


