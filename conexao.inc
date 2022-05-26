<?php
$servidor = "localhost";
$user = "root";
$senha = "";
$bancodados = "banco_portal_agro";
$conexao = mysqli_connect($servidor, $user, $senha);
$bd = mysqli_select_db($conexao, $bancodados);
?> 