<?php 

$msg = [
    "Cadastro efetuado com sucesso!",
];
$erro = [
    "Usuario e/ou senha invalidos!",
    "Erro ao cadastrar usuário!"
]







?>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script>
    <?php if (isset($_GET['erro'])) { ?>
        swal("Erro!", "<?= $erro[$_GET['erro']]; ?>", "error");
    <?php } ?>
    <?php if (isset($_GET['msg'])) { ?>
        swal("Sucesso!", "<?= $msg[$_GET['msg']]; ?>", "success");
    // Remover parametro da url
    window.history.replaceState(null, null, window.location.pathname);
    <?php } ?>
</script>