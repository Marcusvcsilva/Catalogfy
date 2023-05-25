<?php
// Painel de administração
session_start();
// Verificar se a sessão NÃO existe: 
if (!isset($_SESSION['dados'])) {
    header('Location: ../admin/index.php');
    exit;
}

require_once('../admin/classes/Produto.class.php');

$p = new Produto();

// Guardar o array de resultado em uma variavel 

$resultado = $p->Listar();


// puxar as categorias
require_once('../admin/classes/Categoria.class.php');
$c = new Categoria();
$categorias = $c->Listar();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Listagem de Produtos</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <style>
        body {
            background: #f8f9fa;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Gerenciamento de Produtos</h1>
        <div class="row mb-3">
            <div class="col d-flex justify-content-end">
                <button type="button" class="btn btn-success mx-1" data-toggle="modal" data-target="#modalCadastro"><i class="bi bi-plus-circle"></i> Cadastrar Produto</button>
                <a class="btn btn-danger mx-1 text-white" href="../actions/logout.php"><i class="bi bi-box-arrow-right"></i> Sair</a>
            </div>
        </div>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Foto</th>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th>Categoria</th>
                    <th>Estoque</th>
                    <th>Preço</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($resultado as $produto){ ?>
                <tr>
                    <td><?=$produto['id'];?></td>
                    <td><?=$produto['foto'];?></td>
                    <td><?=$produto['nome'];?></td>
                    <td><?=$produto['descricao'];?></td>
                    <td><?=$produto['categoria'];?></td>
                    <td><?=$produto['estoque'];?></td>
                    <td><?=$produto['preco'];?></td>
                    <td><a href="../actions/editar_produto.php?id=<?=$produto['id'];?>">Editar</a>  |  <a href="../actions/deletar.php?id=<?=$produto['id'];?>">Excluir</a></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>