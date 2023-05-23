<?php
// Peguei da cadastrar_categoria.php:
session_start();
// Verificar se a página está sendo carregada por POST:
    if($_SERVER['REQUEST_METHOD'] == 'POST' and isset($_SESSION['dados'])){
        // Importar a classe:
        require_once('../classes/Produto.class.php');
        // Instanciar um obj do tipo contato:
        $p = new Produto();
        $p->nome = $_POST['nome'];
        $p->estoque = $_POST['estoque'];
        $p->preco = $_POST['preco'];
        $p->id_categoria = $_POST['id_categoria'];
        $p->descricao = $_POST['descricao'];
        $p->id_usuario = $_SESSION['dados']['id'];
        // Valor temporário, modificar depois:
        $p->foto = "semfoto.jpg";

        // Será que o usuario está enviando um foto??????
        if(is_uploaded_file($_FILES['foto']['tmp_name'])){
            $validos = ['jpg', 'jpeg', 'png', 'gif', 'svg'];
            $ext = pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION);
            $novo_nome = hash_file('md5',$_FILES['foto']['tmp_name']).".$ext";
            if(in_array($ext, $validos)){
                move_uploaded_file($_FILES['foto']['tmp_name'], "../../img/$novo_nome");
                $p->foto = $novo_nome;
            }else{
                echo "$ext não é permitido.";
                exit();
            }
        }
        $p->Cadastrar();
       
        header('Location: ../painel.php?msg=1');
        exit();
    }else{
        echo "Você precisa estar logado e essa página deve ser carregada por POST!";
    }
?>