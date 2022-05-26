<?php
include "conexao.inc";

$email = $_POST['email'];
$senha = $_POST['senha'];
$sql = "select email,senha from usuario where email='".$email."' and senha='".$senha."'";
$resultado = mysqli_query($conexao, $sql);
mysqli_close($conexao);

if(mysqli_fetch_assoc($resultado) != null){
    echo '<!DOCTYPE html>
    <html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <title>Pagina inicial</title>
    </head>
    <body>
    <h1>Pagina inicial</h1>
    <p>Essa é a pagina inicial do sistema para gerenciar seu rebanho</p>
    </body>
    </html>';
    exit;
}else{
    echo '<!DOCTYPE html>
    <html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Resulado</title>
    </head>
    <body>
    <script>
        window.alert("Email ou senha inválidos")
        window.history.back()
    </script>
    </body>
    </html>';
    exit;

}

?>