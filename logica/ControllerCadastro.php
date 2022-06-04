<?php
include("Conexao.php");
include_once("Usuario.php");

// não cadastrar emails iguais (adicionar essa funcionalida)

class ControllerCadastro extends Conexao{

    private $usuario;
    private $resultado;
    private $conexao;

    public function __construct(){

        $this->usuario = new Usuario();
        $this->usuario->setNome($_POST['nome']);
        $this->usuario->setSobrenome($_POST['sobrenome']);
        $this->usuario->setEmail($_POST['email']);
        $this->usuario->setSenha($_POST['senha']);
        $this->usuario->setConfSenha($_POST['confSenha']);

        $this->validaDados();

    }

    private function validaDados(){

        if($this->usuario->getNome() != null && $this->usuario->getSobrenome() != null && $this->usuario->getEmail() != null && $this->usuario->getSenha() != null && $this->usuario->getConfSenha() != null){
            $this->validaSenha();
        }

    }

    private function validaSenha(){

        if($this->usuario->getSenha == $this->usuario->getConfSenha){
            $this->cadastraSenha();
        }else{
            echo '<script>
            window.alert("As senhas não conferem")
            window.history.back()
            </script>';
        }
        
    }

    private function cadastraSenha(){

        $this->usuario->setSenha(password_hash($this->usuario->getSenha(),PASSWORD_DEFAULT));

        $this->conexao = $this->conectaDB()->prepare("insert into usuario values (?,?,?,?,?)");
        $id = 0;
        $this->conexao->bindValue("1", $this->usuario->getId());
        $this->conexao->bindValue("2", $this->usuario->getNome());
        $this->conexao->bindValue("3", $this->usuario->getSobrenome());
        $this->conexao->bindValue("4", $this->usuario->getEmail());
        $this->conexao->bindValue("5", $this->usuario->getSenha());
        
        $this->resultado = $this->conexao->execute();

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
