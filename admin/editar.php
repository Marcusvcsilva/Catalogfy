<?php 
session_start();
$erro = "";
 
// if (se) (isset{está setado} (_$variavel[campo]))

if(isset($_SESSION['dados'])){
  if(isset($_GET['id'])){
    require_once('classes/Produto.class.php'); 
    
    $p = new produto(); 
    $c->id = $_GET['id']; 
    
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

    <form action="actions/editar_contato.php" method="POST">
      <div class="form-group">
        <label for="nome">Nome:</label>
        <input value="<?=$resultado[0]["nome"] ?>" type="text" class="form-control" id="nome" name="nome">
      </div>
      <div class="form-group">
        <label for="foto">Foto:</label>
        <input value="<?=$resultado[0][""] ?>" type="email" class="form-control" id="email" name="email">
      </div>
      <div class="form-group">
        <label for="descricao">Descrição:</label>
        <input value="<?=$resultado[0]["telefone"] ?>" type="tel" class="form-control" id="telefone" name="telefone">
      </div>
      <div class="form-group">
        <label for="categoria">Categoria:</label>
        <input value="<?=$resultado[0]["telefone"] ?>" type="tel" class="form-control" id="telefone" name="telefone">
      </div>
      <div class="form-group">
        <label for="estoque">Estoque:</label>
        <input value="<?=$resultado[0]["telefone"] ?>" type="tel" class="form-control" id="telefone" name="telefone">
      </div>
      <div class="form-group">
        <label for="preco">Preço:</label>
        <input value="<?=$resultado[0]["telefone"] ?>" type="tel" class="form-control" id="telefone" name="telefone">
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