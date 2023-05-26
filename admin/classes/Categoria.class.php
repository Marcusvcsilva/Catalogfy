<?php 

require_once('Banco.class.php');
class Categoria{
    public $id;
    public $nome;

    public function Cadastrar(){
        $sql = "INSERT INTO categorias (nome) VALUES(?)";
        // Trabalhar com o banco:
        // Conectando:
        $banco = Banco::conectar();
        $comando = $banco->prepare($sql);
        $comando->execute(array($this->nome));
        // Desconectar do banco:
        Banco::desconectar();
    }
    public function Listar(){
        $banco = Banco::conectar();
        $sql = "SELECT * FROM categorias";
        $comando = $banco->prepare($sql);
        $comando->execute();
        // "Salvar" o resultado da consulta (tabela) na $resultado
        $resultado = $comando->fetchAll(PDO::FETCH_ASSOC);
        Banco::desconectar();
        return $resultado;
    }
}



?> 