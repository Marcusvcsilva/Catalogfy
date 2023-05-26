<?php
// Painel de administração
session_start();
// Verificar se a sessão NÃO existe: 
if($_SERVER['REQUEST_METHOD'] == 'POST' and isset($_SESSION['dados'])){
require_once('../admin/classes/Produto.class.php');

$p = new Produto();

$p->nome = $_POST['nome'];
$p->estoque = $_POST['estoque'];
$p->descricao = $_POST['descricao'];
$p->preco = $_POST['preco'];
$p->id_categoria = $_POST['id_categoria'];
$p->id_usuario = $_SESSION['dados']['id'];

// Valor temporário
$p->foto = "semfoto.jpg";

// puxar as categorias
require_once('../admin/classes/Categoria.class.php');
$c = new Categoria();
$categorias = $c->Listar();

if($p->Atualizar() == 1 ){
    // Caso dê certo
    // Redirecionar
    header('Location: ../admin/painel.php');
    exit();
}else{
    echo "A página deve ser carregada por POST . <br>"; 
    echo "a href=\"../painel.php\">Voltar</a>"; 
}
}

?>   
