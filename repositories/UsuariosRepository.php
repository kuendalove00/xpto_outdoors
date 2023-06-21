<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

require_once 'model/Usuario.php';
require_once 'interfaces/IUsuariosRepository.php';
require_once 'dbconfig/DbConnection.php';

/**
 * Description of Usuario
 *
 * @author ndonge
 */
class UsuariosRepository implements IUsuariosRepository{
    //put your code here
    private $db;

    function __construct() {
        $this->db = DbConnection::getInstance();
    }

    public function selectAll() {
        $usuarios = Array();
        $stmt = $this->db->prepare("SELECT * FROM usuario");
        $stmt->execute();
        $result = $stmt->fetchAll();

        foreach ($result as $usuario) {
            $usuarios[] = new Usuario($usuario['uid'], $usuario['usuario'], $usuario['senha'], $usuario['confirma_senha'], $usuario['papel'], $usuario['email'], $usuario['photo'], $usuario['estado'], $usuario['criacao']);
        }
        return $usuario;
    }

    public function selectById($id) {

        $stmt = $this->db->prepare("SELECT * FROM usuario WHERE uid = :id");
        $stmt->execute(['id' => $id]);
        $usuario = $stmt->fetch();

        return new Usuario($usuario['uid'], $usuario['usuario'], $usuario['senha'], $usuario['confirma_senha'], $usuario['papel'], $usuario['email'], $usuario['photo'], $usuario['estado'], $usuario['criacao']);
    }
    
    public function selectByCredentials($user, $email, $senha) {

        $stmt = $this->db->prepare("SELECT * FROM usuario WHERE usuario = :user OR email = :email AND senha =: senha");
        $stmt->execute(['user' => $user, 'email' => $email, 'senha' => $senha]);
        $usuario = $stmt->fetch();

        return new Usuario($usuario['uid'], $usuario['usuario'], $usuario['senha'], $usuario['confirma_senha'], $usuario['papel'], $usuario['email'], $usuario['photo'], $usuario['estado'], $usuario['criacao']);
    }

    public function insert($usuario, $senha, $confirmacao, $papel, $email, $foto) {
        
        try {
            $stmt = $this->db->prepare("INSERT INTO usuario(`usuario`, `senha`, `confirma_senha`, `papel`, `email`, `photo`) VALUES(:usuario, :senha, :confirmacao, :papel, :email, :foto)");
            $stmt->bindparam(":usuario", $usuario);
            $stmt->bindparam(":senha", $senha);
            $stmt->bindparam(":confirmacao", $confirmacao);
            $stmt->bindparam(":papel", $papel);
            $stmt->bindparam(":email", $email);
            $stmt->bindparam(":foto", $foto);
            $stmt->execute();
            $id = $this->db->lastInsertId();
            var_dump($id);
            return $id;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
    
     public function update($id, $nome, $senha, $confirmacao, $papel, $email, $foto, $estado) {

        try {
            $stmt = $this->db->prepare("UPDATE usuario SET nome=:nome, senha=:senha, confirma_senha=:confirmacao, papel=:papel, email=:email, photo=:foto, estado:=estado WHERE uid=:id");
            $stmt->bindparam(":id", $id);
            $stmt->bindparam(":nome", $nome);
            $stmt->bindparam(":senha", $senha);
            $stmt->bindparam(":confirmacao", $confirmacao);
            $stmt->bindparam(":papel", $papel);
            $stmt->bindparam(":email", $email);
            $stmt->bindparam(":foto", $foto);
            $stmt->bindparam(":estado", $estado);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
    
    public function updateState($id, $estado) {

        try {
            $stmt = $this->db->prepare("UPDATE usuario SET estado:=estado WHERE uid=:id");
            $stmt->bindparam(":id", $id);
            $stmt->bindparam(":estado", $estado);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function delete($id) {

        try {

            $stmt = $this->db->prepare("DELETE FROM usuario WHERE uid=:id");
            $stmt->bindparam(":id", $id);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
}
