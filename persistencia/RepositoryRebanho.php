<?php

include_once('../logica/Conexao.php');
include_once('../logica/Rebanho.php');
include_once("../logica/enums.php");
include_once("RepositoryUsuario.php");
include_once("../logica/Usuario.php");

class RepositoryRebanho extends Conexao{
    
    private $db;

    public function __construct()
    {
        if(session_status() == 1){
            session_start();
        }
            
    }

    public function adicionar($rebanho){
        
        $this->db = $this->conectaDB()->prepare("INSERT INTO rebanho VALUES (?,?,?,?)");

        $this->db->bindValue("1",$rebanho->getId());
        $this->db->bindValue("2",$rebanho->getDescricao());
        $this->db->bindValue("3",$rebanho->getTipoRebanhoEmNumero($rebanho->getTipo()));
        $this->db->bindValue("4",$_SESSION['usuario_id']);

        $resultado = $this->db->execute();

        if($resultado ){
            echo 
                '<script>
                    window.location.replace("../apresentacao-web/rebanhos.php");
                </script>';
            exit;
            
        }else{
            echo '
                <script>
                    window.alert("Rebanho não adicionado")
                </script>';
            exit; 
        }
    }

    public function listar(){

        $this->db =$this->conectaDB()->prepare("SELECT * from rebanho where usuario_id = ?");
        
        $this->db->bindValue("1",$_SESSION['usuario_id']);
        $resultado = $this->db->execute();
        $lista = $this->db->fetchAll();

        $rebanhos = array(); 

        if($resultado){
            foreach($lista as $item){
                $rebanho = new Rebanho();
                $rebanho->setId($item['id']);
                $rebanho->setDescricao($item['descricao']);
                $rebanho->setTipo($rebanho->getTipoRebanhoEmString($item['tipo']));
                $rebanhos[] = $rebanho;
            }
        }
        
        return $rebanhos;
    }

    public function getRebanho($id){
        $this->db = $this->conectaDB()->prepare("SELECT * from rebanho where id = ?");
        $this->db->bindValue(1,$id);

        if($this->db->execute()){
            $dados = $this->db->fetch();
            $rebanho = new Rebanho();
            $rebanho->setId($dados['id']);
            $rebanho->setDescricao($dados['descricao']);
            $rebanho->setTipo($rebanho->getTipoRebanhoEmString($dados['tipo']));
            $rebanho->setUsuario($this->recuperaUsuario($dados['usuario_id']));
        }

        return $rebanho;
    }

    public function getTotalAnimais($id){
        $this->db = $this->conectaDB()->prepare("SELECT COUNT(*) FROM animal WHERE rebanho_id = ?");
        $this->db->bindValue(1,$id);
        $resultado = $this->db->execute();

        $dados = $this->db->fetch(PDO::FETCH_NUM);

        if($resultado){
            $total = $dados[0];
        }else{
            $total = 0;
        }

        return $total;
    }

    public function recuperaUsuario($usuario_id){
        $repositoryUsuario = new RepositoryUsuario();
        $usuario = $repositoryUsuario->getUsuario($usuario_id);
        return $usuario;
    }

    public function excluir($id){
        $this->db = $this->conectaDB()->prepare("DELETE FROM rebanho WHERE id=?");
        $this->db->bindValue(1,$id);
        $resultado = $this->db->execute();

        if($resultado){
            echo 
                '<script>
                    window.location.replace("../apresentacao-web/rebanhos.php");
                </script>';
            exit;
            
        }else{
            echo '
                <script>
                    window.alert("Rebanho não excluido")
                </script>';
            exit; 
        }
        
    }

    public function editar($rebanho){
       
        $this->db = $this->conectaDB()->prepare("UPDATE rebanho SET descricao=?, tipo=? where id=?");
        $this->db->bindValue(1,$rebanho->getDescricao());
        $this->db->bindValue(2,$rebanho->getTipoRebanhoEmNumero($rebanho->getTipo()));
        $this->db->bindValue(3,$rebanho->getId());
        $resultado = $this->db->execute();

        if($resultado ){
            echo 
                '<script>
                    window.location.replace("../apresentacao-web/formAnimais.php");
                </script>';
            exit;
            
        }else{
            echo '
                <script>
                    window.alert("Rebanho não alterado")
                </script>';
            exit; 
        }
        
    }
}
