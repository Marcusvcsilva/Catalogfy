<?php 
session_start();

if(isset($_GET['id']) and isset($_SESSION['dados'])){
    require_once('../admin/classes/Produto.class.php');
    $p = new produto(); 

    $p->id = $_GET['id'];
    
        if ($p->Deletar() == 1){
            header("Location: ../admin/painel.php?");
            exit();
       }else{
            header("Location: ../admin/painel.php?");
           exit();
       }
   }else{
       echo "Defina o ID do item a ser apagado ou faça o login na sua conta";
   }

   ?>