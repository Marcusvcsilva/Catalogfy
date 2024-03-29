<?php
// Verificar se a página está sendo carregada por POST:
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Importar a classe:
        require_once('../admin/classes/Usuario.class.php');
        // Instanciar um obj do tipo contato:
        $u = new Usuario();

        // Definir os valores das suas propriedades:
        $u->nome = $_POST['nome'];
        $u->email = $_POST['email'];
        $u->senha = $_POST['senha'];

        try {
        $u->Cadastrar();
        // echo "Contato cadastrado com sucesso!";
        // Redirecionar o jovem de volta à agenda:
        header('Location: ../index.php?msg=0');
        exit();
    }catch(PDOException $e){
        header('Location: ../index.php?erro=1');
        exit();
    }
}else{
    echo "Você precisa estar logado e essa página deve ser carregada por POST!";
}

?>