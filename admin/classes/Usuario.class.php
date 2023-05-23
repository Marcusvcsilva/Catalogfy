<?php 
require_once('Banco.class.php');
class Usuario{
    public $id;
    public $nome;
    public $email;
    public $senha;

    public function Cadastrar(){
        $sql = "INSERT INTO usuarios (nome, email, senha) VALUES(?,?,?)";
        // Trabalhar com o banco:
        // Conectando:
        $banco = Banco::conectar();
        // Transformar a string em comando sql
        $comando = $banco->prepare($sql);
        // Executar e subsitituir os coringas (?):
        $hash = hash ('sha256', $this->senha);
        $comando->execute(array($this->nome, $this->email, $hash));
        // Desconectar do banco:
        Banco::desconectar();
    }
    public function Logar(){
        $banco = Banco::conectar();
        $sql = "SELECT * FROM usuarios WHERE email = ? AND senha = ?";
        $comando = $banco->prepare($sql);
        $hash = hash ('sha256', $this->senha);
        $comando->execute(array($this->email, $hash));
        // "Salvar" o resultado da consulta (tabela) na $resultado
        $resultado = $comando->fetchAll(PDO::FETCH_ASSOC);
        Banco::desconectar();
        return $resultado;
    }
}
?>