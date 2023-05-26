<?php
// Verificar se a página está sendo carregada por POST:
    session_start();
    if($_SERVER['REQUEST_METHOD'] == 'POST' and isset($_SESSION['dados'])){
        // Importar a classe:
        require_once('../admin/classes/Categoria.class.php');
        // Instanciar um obj do tipo contato:
        $c = new Categoria();

        // Definir os valores das suas propriedades:
        $c->nome = $_POST['nome'];
        $c->Cadastrar();
        // echo "Contato cadastrado com sucesso!";
        // Redirecionar o jovem de volta à agenda:
        header('Location: ../admin/painel.php?msg=0');
        exit();
    }else{
        echo "Você precisa estar logado e essa página deve ser carregada por POST!";
    }
?>