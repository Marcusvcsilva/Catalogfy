<?php 

require_once('Banco.class.php');
class Produto{
    public $id;
    public $nome;
    public $estoque;
    public $descricao;
    public $preco;
    public $foto;
    public $data_cadastro;
    public $id_categoria;
    public $id_usuario;

    public function Cadastrar(){
        $sql = "INSERT INTO produtos (nome, estoque, descricao, preco, foto, id_categoria, id_usuario) VALUES(?, ?, ?, ?, ?, ?, ?)";
        // Trabalhar com o banco:
        // Conectando:
        $banco = Banco::conectar();
        $comando = $banco->prepare($sql);
        $comando->execute(array($this->nome, $this->estoque, $this->descricao, $this->preco, $this->foto, $this->id_categoria, $this->id_usuario));
        // Desconectar do banco:
        Banco::desconectar();
    }
}

?>