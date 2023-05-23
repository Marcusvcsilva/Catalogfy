<?php 

session_start(); // Inicia a sessão

// Destroi todas as variáveis da sessão
session_unset();
//Destroi a sessão
session_destroy();

// Remove os cookies da sessão 
setcookie(session_name(), '', time() - 3600, '/');

// Redireciona o usuário de volta a página de login
header("Location: ../admin/index.php");
exit();

?> 