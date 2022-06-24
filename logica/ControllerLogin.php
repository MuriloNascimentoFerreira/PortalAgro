<?php
include ("Conexao.php");

class ControllerLogin extends Conexao{

    private $email;
    private $senha;
    private $resultado;
    private $db;

    public function __construct(){

        $this->email = $_POST['email'];
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

        $this->db = $this->conectaDB()->prepare("SELECT email,senha from usuario where email = ?");
        $this->db->bindValue(1,$this->email);
        $this->db->execute();
        $fetch = $this->db->fetch(PDO::FETCH_ASSOC);

        if(password_verify($this->senha,$fetch['senha'])){
            $this->resultado = 1;
        }else{
            $this->resultado = 0;
        }

        if($this->resultado == 1){ 
            $this->registraUsuarioNaPagina();
            echo 
                '<script>
                    window.location.replace("../apresentacao-web/rebanhos.php");
                </script>';
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

    private function registraUsuarioNaPagina(){
        $this->db = $this->conectaDB()->prepare("SELECT id from usuario where email = ?");
        $this->db->bindValue(1,$this->email);
        $this->db->execute();
        $fetch = $this->db->fetch(PDO::FETCH_ASSOC);

        session_start();
        $_SESSION['usuario_id'] = $fetch['id'];
        $_SESSION['logado'] = true;
    }
}

$new = new ControllerLogin();