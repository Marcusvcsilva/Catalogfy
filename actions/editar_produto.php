<?php

session_start(); 

if($_SERVER['REQUEST_METHOD'] == 'POST' and isset($_SESSION['dados'])){

require_once('../admin/classes/Produto.class.php');

$p = new produto(); 

$p->nome = $_POST['nome'];
$p->estoque = $_POST['estoque'];
$p->descricao = $_POST['descricao'];
$p->preco = $_POST['preco'];
$p->id_categoria = $_POST['id_categoria'];
$p->id_usuario = $_SESSION['dados']['id'];

if($p->Atualizar() == 1){
    // Deu Certo!
    // Redirecionar:
    header('Location: ../admin/painel.php?');
    exit();
}else{
    header('Location: ../admin/painel.php?');
    exit();
}
} else{
    echo "A página deve ser carregada por POST . <br>";
    echo "<a href=\"../admin/painel.php\">Voltar</a>";
}

?>