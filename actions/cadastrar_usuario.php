<?php
// Check for page is loading with post // Verifica se a página está sendo carregada por POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require_once('../admin/classes/Usuario.class.php');
    // Instacing object of tip contact // Instaciando objeto do tipo contato 
    $u = new Usuario();
    // Values of proprierties // Valores das propriedades
    $u->nome = $_POST['nome'];
    $u->senha = $_POST['senha'];
    $u->email = $_POST['email'];

    try {
        $u->cadastrar();
        //Redirection user back for login // Redirecionando usuario de volta ao login
        header('Location: ../admin/index.php?msg=0');
        exit();
    } catch (PDOException $e) {
        header('Location: ../admin/index.php?erro=1');
        exit();
    }
} else {
    echo "Á página deve ser carregada por POST";
}
?>