<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */
require_once 'model/Cliente.php';
require_once 'interfaces/IClientesRepository.php';
require_once 'dbconfig/DbConnection.php';
/**
 * Description of Cliente
 *
 * @author ndonge
 */
class ClientesRepository implements IClientesRepository {
    //put your code here
    private $db;

    function __construct() {
        $this->db = DbConnection::getInstance();
    }

    public function selectAll() {
        $clientes = Array();
        $stmt = $this->db->prepare("SELECT * FROM cliente");
        $stmt->execute();
        $result = $stmt->fetchAll();

        foreach ($result as $cliente) {
            $clientes[] = new Cliente($cliente['id_client'], $cliente['nome'], $cliente['tipo'], $cliente['actividade'], $cliente['id_com'], $cliente['id_nac'], $cliente['morada'], $cliente['uid'], $cliente['criacao']);
        }
        return $clientes;
    }

    public function selectById($id) {

        $stmt = $this->db->prepare("SELECT * FROM cliente WHERE id_client = :id");
        $stmt->execute(['id' => $id]);
        $cliente = $stmt->fetch();

        return new Cliente($cliente['id_client'], $cliente['nome'], $cliente['tipo'], $cliente['actividade'], $cliente['id_com'], $cliente['id_nac'], $cliente['morada'], $cliente['uid'], $cliente['criacao']);
    }

    public function insert($nome, $tipo, $actividade, $comuna, $nacionalidade, $morada, $uid) {

        try {
            $stmt = $this->db->prepare("INSERT INTO `cliente`(`nome`, `tipo`, `actividade`, `id_com`, `id_nac`, `morada`, `uid`) VALUES(:nome, :tipo, :actividade, :comuna, :nacionalidade, :morada, :uid)");
            $stmt->bindparam(":nome", $nome);
            $stmt->bindparam(":tipo", $tipo);
            $stmt->bindparam(":actividade", $actividade);
            $stmt->bindparam(":comuna", $comuna);
            $stmt->bindparam(":nacionalidade", $nacionalidade);
            $stmt->bindparam(":morada", $morada);
            $stmt->bindparam(":uid", $uid);
            $stmt->execute();
            $id = $this->db->lastInsertId();
            return $id;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
    
    public function update($nome, $tipo, $actividade, $comuna, $nacionalidade, $morada) {

        try {
            $stmt = $this->db->prepare("UPDATE cliente SET nome=:nome, tipo=:tipo, actividade=:actividade, comuna=:comuna, nacionalidade=:nacionalidade, morada=:morada)");
            $stmt->bindparam(":nome", $nome);
            $stmt->bindparam(":tipo", $tipo);
            $stmt->bindparam(":actividade", $actividade);
            $stmt->bindparam(":comuna", $comuna);
            $stmt->bindparam(":nacionalidade", $nacionalidade);
            $stmt->bindparam(":morada", $morada);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
    
    

    public function delete($id) {

        try {

            $stmt = $this->db->prepare("DELETE FROM cliente WHERE id_client=:id");
            $stmt->bindparam(":id", $id);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

}
