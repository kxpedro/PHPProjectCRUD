<?php

class FuncionarioDAO {

    private $host = "mysql:host=localhost;port=3306;dbname=teste";
    private $user = "root";
    private $senha = "";

    public function Inserir(FuncionarioTO $fun) {
        try {            
            $con = new PDO($this->host, $this->user, $this->senha);
            $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $con->exec("set names utf8");
            $sql = "INSERT INTO funcionario(nome,nasc,sal,foto) VALUES ('{$fun->getNome()}','{$fun->getNasc()}','{$fun->getSal()}','{$fun->getFoto()}' )";
            $st = $con->prepare($sql);
            $st->execute();
            return $con->lastInsertId();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    
    public function Listar() {
        try {
            $con = new PDO($this->host, $this->user, $this->senha);
            $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $con->exec("set names utf8");

            $sql = "SELECT 
                        funcionario.id,
                        funcionario.nome,
                        funcionario.nasc,
                        funcionario.sal,
                        funcionario.foto                     
                    FROM funcionario;";
            $st = $con->prepare($sql);
            $st->execute();
            $st->setFetchMode(PDO::FETCH_OBJ);
            return $st->fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    
    
    public function excluir($id) {
        try {
            $con = new PDO($this->host, $this->user, $this->senha);
            $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $con->exec("set names utf8");

            $sql = "DELETE FROM  funcionario WHERE id=$id";
            $st = $con->prepare($sql);
            
            $st->execute();            
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function editar($col, $novo, $id) {
        try {
            $con = new PDO($this->host, $this->user, $this->senha);
            $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $con->exec("set names utf8");          

            $sql = "UPDATE funcionario SET $col='$novo' WHERE id=$id";
            $st = $con->prepare($sql);            
            $st->execute();            
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }    
}
