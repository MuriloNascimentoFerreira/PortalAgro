<?php

include_once('../logica/Conexao.php');
include_once('../logica/Rebanho.php');
include_once("../logica/enums.php");

class RepositoryRebanho extends Conexao{
    
    private $db;

    public function adicionar($rebanho){
        $this->db = $this->conectaDB()->prepare("insert into rebanho values (?,?,?)");

        $this->db->bindValue("1",$rebanho->getId());
        $this->db->bindValue("2",$rebanho->getDescricao());
        $this->db->bindValue("3",$rebanho->getTipoRebanhoEmNumero($rebanho->getTipo()));
        
        $resultado = $this->db->execute();

        if($resultado ){
            echo 
                '<script>
                    window.location.replace("http://localhost/portalagro/apresentacao-web/rebanhos.php");
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

        $this->db =$this->conectaDB()->prepare("select * from rebanho");
        $resultado = $this->db->execute();
        $lista = $this->db->fetchAll();

        foreach($lista as $item){
            $rebanho = new Rebanho();
            $rebanho->setId($item['id']);
            $rebanho->setDescricao($item['descricao']);
            $rebanho->setTipo($rebanho->getTipoRebanhoEmString($item['tipo']));
            $rebanhos[] = $rebanho;
         
        }
        return $rebanhos;
    }
}
