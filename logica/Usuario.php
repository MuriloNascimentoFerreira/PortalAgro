<?php 

class Usuario{
    private $id;
    private $nome;
    private $sobrenome;
    private $email;
    private $senha;
    private $confSenha;

    public function __construct(){

        $this->id = 0;
        $this->nome = '';
        $this->sobrenome = '';
        $this->email = '';
        $this->senha = '';
        $this->confSenha = '';

    }

    public function getID(){
        return $this->id;
    }

    public function getNome(){
        return $this->nome;
    }

    public function getSobrenome(){
        return $this->sobrenome;
    }

    public function getEmail(){
        return $this->email;
    }

    public function getSenha(){
        return $this->senha;
    }

    public function getConfSenha(){
        return $this->confSenha;
    }

    public function setID($id)
    {
        $this->id = $id;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function setSobrenome($sobrenome)
    {
        $this->sobrenome = $sobrenome;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function setSenha($senha)
    {
        $this->senha = $senha;
    }

    public function setConfSenha($confSenha)
    {
        $this->confSenha = $confSenha;
    }
}
?>