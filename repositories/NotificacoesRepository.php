<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of Notificacao
 *
 * @author ndonge
 */
class NotificacoesRepository implements INotificacoesRepository{
    //put your code here
    private $db;

    function __construct() {
        $this->db = DbConnection::getInstance();
    }

    public function selectAll() {
        $notificacoes = Array();
        $stmt = $this->db->prepare("SELECT * FROM notificacao");
        $stmt->execute();
        $result = $stmt->fetchAll();

        foreach ($result as $notificacao) {
            $notificacoes[] = new Notificacao($notificacao['id'], $notificacao['nome'], $notificacao['descricao'], $notificacao['id_gestor'], $notificacao['id_cliente'], $notificacao['criacao']);
        }
        return $notificacoes;
    }

    public function selectById($id) {

        $stmt = $this->db->prepare("SELECT * FROM notificacao WHERE id_notif = :id");
        $stmt->execute(['id' => $id]);
        $notificacao = $stmt->fetch();

        return new Notificacao($notificacao['id'], $notificacao['nome'], $notificacao['descricao'], $notificacao['id_gestor'], $notificacao['id_cliente'], $notificacao['criacao']);
    }

    public function insert($nome, $descricao, $gestor, $cliente) {

        try {
            $stmt = $this->db->prepare("INSERT INTO notificacao VALUES(:nome, :descricao, :gestor, :cliente)");
            $stmt->bindparam(":nome", $nome);
            $stmt->bindparam(":descricao", $descricao);    
            $stmt->bindparam(":gestor", $gestor);
            $stmt->bindparam(":cliente", $cliente);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
    
     public function update($nome, $descricao, $gestor, $cliente) {

        try {
            $stmt = $this->db->prepare("UPDATE notificacao SET nome=:nome, descricao=:descricao, id_gestor=:gestor, id_cliente=:cliente)");
            $stmt->bindparam(":nome", $nome);
            $stmt->bindparam(":descricao", $descricao);    
            $stmt->bindparam(":gestor", $gestor);
            $stmt->bindparam(":cliente", $cliente);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function delete($id) {

        try {

            $stmt = $this->db->prepare("DELETE FROM notificacao WHERE id_notif=:id");
            $stmt->bindparam(":id", $id);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
}
