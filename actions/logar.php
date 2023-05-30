<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    require_once('../admin/classes/Usuario.class.php');
    $u = new Usuario();
    $u->email = $_POST['email'];
    $u->senha = $_POST['senha'];

    $resultado = $u->Logar();
    // Check for rows in the result // Verifica se há linhas no resultado
    if (count($resultado) == 1) {
        session_start();
        $_SESSION['dados'] = $resultado[0];
        header("Location: ../admin/painel.php");
        exit();
    } else {
        header('Location: ../admin/index.php');
        exit();
    }
}
?>