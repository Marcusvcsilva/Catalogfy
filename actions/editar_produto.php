<?php
// Painel de administração
session_start();
// Verificar se a sessão NÃO existe: 
if($_SERVER['REQUEST_METHOD'] == 'POST' and isset($_SESSION['dados'])){
require_once('../admin/classes/Produto.class.php');

$p = new Produto();

$p->id = $_POST['id'];

$p->nome = $_POST['nome'];

$p->foto = $_POST['foto'];

$p->descricao = $_POST['descricao'];

$p->id_categoria = $_POST['id_categoria'];

$p->estoque = $_POST['estoque'];

$p->preco = $_POST['preco'];

// puxar as categorias

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
