<?php 
session_start();
$erro = "";
 
// if (se) (isset{está setado} (_$variavel[campo]))

if(isset($_SESSION['dados'])){
  if(isset($_GET['id'])){
    require_once('../admin/classes/Produto.class.php'); 
    
    $p = new Produto(); 
    $p->id = $_GET['id']; 
    
    $resultado = $p->BuscarPorID(); 
    
    // Verificar se existem linhas no $resultado;
        if(count($resultado) == 0){
           $erro = "Produto não encontrado!";
        }
    
    }else {
      $erro = "ID não setado!";
    }
}

?> 


<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Formulário de Edição</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
  <div class="container">

  <?php if($erro == "") { ?>
    
    <h1>Formulário de Edição</h1>

    <form action="../actions/editar_produto.php" method="POST">
      <div class="form-group">
        <label for="nome">Nome:</label>
        <input value="<?=$resultado[0]["nome"] ?>" type="text" class="form-control" id="nome" name="nome">
      </div>
      <div class="form-group">
        <label for="foto">Foto:</label>
        <input value="<?=$resultado[0]["foto"] ?>" type="file" class="form-control" id="foto" name="foto">
      </div>
      <div class="form-group">
        <label for="descricao">Descrição:</label>
        <input value="<?=$resultado[0]["descricao"] ?>" type="text" class="form-control" id="descricao" name="descricao">
      </div>
      <div class="form-group">
        <label for="categoria">Categoria:</label>
        <input value="<?=$resultado[0]["categoria"] ?>" type="text" class="form-control" id="categoria" name="categoria">
      </div>
      <div class="form-group">
        <label for="estoque">Estoque:</label>
        <input value="<?=$resultado[0]["estoque"] ?>" type="estoque" class="form-control" id="estoque" name="estoque">
      </div>
      <div class="form-group">
        <label for="preco">Preço:</label>
        <input value="<?=$resultado[0]["preco"] ?>" type="preco" class="form-control" id="preco" name="preco">
      </div>
      <input value="<?=$resultado[0]["id"] ?>" type="hidden" name="id" id="id">
      <button type="submit" class="btn btn-primary">Editar</button>
    </form>

    <?php }else{ ?>

      <h1><?=$erro;?></h1>

    <?php } ?>

  </div>

  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>