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
    function confirmar(id, nome) {
        // alert('Você clicou em apagar '+id);
        swal({
                title: "Atenção",
                text: "Tem certeza que deseja apagar o " + nome + "?",
                icon: "warning",
                buttons: ["Não", "Sim"],
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    // Redirecionar para o apagar:
                    window.location.href = "actions/apagar.php?id=" + id;
                }
            });
    }
</script>

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