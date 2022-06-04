<?php

include_once("../logica/Usuario.php");
include_once("../logica/Conexao.php");

class RepositoryUsuario extends Conexao{

    public function getUsuario($id)
    {
        $this->db = $this->conectaDB()->prepare("select * from usuario where id = ?");
        $this->db->bindValue(1,$id);

        if($this->db->execute()){
            
            $dados = $this->db->fetch();
            $usuario = new Usuario();
            $usuario->setId($dados['id']);
            $usuario->setNome($dados['nome']);
            $usuario->setSobrenome($dados['sobrenome']);
            $usuario->setEmail($dados['email']);
            $usuario->setSenha($dados['senha']);
        }

        return $usuario;
    }
}

?>