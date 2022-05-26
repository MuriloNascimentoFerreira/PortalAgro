<?php
include("Conexao.php");

class ControllerCadastro extends Conexao{

    private $nome;
    private $sobrenome;
    private $email;
    private $senha;
    private $confSenha;
    private $resultado;

    private $conexao;

    public function __construct(){

        $this->nome = $_POST['nome'];
        $this->sobrenome = $_POST['sobrenome'];
        $this->email = $_POST['email'];
        $this->senha = $_POST['senha'];
        $this->confSenha = $_POST['confSenha'];

        $this->validaDados();

    }

    private function validaDados(){

        if($this->nome != null && $this->sobrenome != null && $this->email != null && $this->senha != null && $this->confSenha != null){
            $this->validaSenha();
        }

    }

    private function validaSenha(){

        if($this->senha == $this->confSenha){
            $this->cadastraSenha();
        }else{
            echo '<script>
            window.alert("As senhas não conferem")
            window.history.back()
            </script>';
        }
        
    }

    private function cadastraSenha(){

        $this->senha = password_hash($this->senha ,PASSWORD_DEFAULT);

        $this->conexao = $this->conectaDB()->prepare("insert into usuario values (?,?,?,?,?)");
        $id = 0;
        $this->conexao->bindValue("1", $id);
        $this->conexao->bindValue("2", $this->nome);
        $this->conexao->bindValue("3", $this->sobrenome);
        $this->conexao->bindValue("4", $this->email);
        $this->conexao->bindValue("5", $this->senha);
        
        $this->resultado = $this->conexao->execute();
        echo $this->resultado;

        if($this->resultado == 1){
            echo '<script>
            window.alert("Cadastro Realizado com Sucesso! Realize o login para continuar") 
            window.close()
            </script>';
        }else{
            echo '
            <script>
            window.alert("Cadastro não realizado,tente novamente!")
            </script>';
        }

    }

}
$new = new ControllerCadastro();
