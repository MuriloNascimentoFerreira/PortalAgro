<?php
include ("Conexao.php");

class ControllerLogin extends Conexao{

    private $email;
    private $senha;
    private $resultado;
    private $db;

    public function __construct(){

        $this->email= $_POST['email'];
        $this->senha = $_POST['senha'];   
        
        $this->validaDados();
    }
    
    private function validaDados(){

        if($this->email != null && $this->senha != null){
            $this->autenticaSenha();
        }else{
            echo '<script> 
                    window.alert("Preencha todos os campos!")
                    window.history.back()   
                </script>';
        }
    }

    private function autenticaSenha(){

        $this->db = $this->conectaDB()->prepare("select email,senha from usuario where email = ?");
        $this->db->bindValue(1,$this->email);
        $this->db->execute();
        $fetch = $this->db->fetch(PDO::FETCH_ASSOC);

        if(password_verify($this->senha,$fetch['senha'])){
            $this->resultado = 1;
        }else{
            $this->resultado = 0;
        }

        if($this->resultado == 1){
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
            echo '
                <script>
                    window.alert("Email ou senha inválidos")
                    window.history.back()
                </script>';
            exit; 
        }
    }
}

$new = new ControllerLogin();