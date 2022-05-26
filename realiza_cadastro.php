<?php
include "conexao.inc";

$nome = $_POST['nome'];
$sobrenome = $_POST['sobrenome'];
$email = $_POST['email'];
$senha = $_POST['senha'];

if($nome != null && $sobrenome != null && $email != null &&
    $senha != null){

    $sql = "insert into usuario values";
    $sql .= "('$nome','$sobrenome','$email','$senha')";
    //try cach aqui
    $resultado = mysqli_query($conexao, $sql);
    mysqli_close($conexao);
}

if($resultado == 1){
    echo '<script>
    window.alert("Cadastro Realizado com Sucesso! Realize o login para continuar") 
    window.close()
    </script>';
}else{
    echo '
    <script>
    window.alert("Cadastro não realizado,tente novamente!")
    self.location.href="cadastroUsuario.html"
    </script>';
}

?>