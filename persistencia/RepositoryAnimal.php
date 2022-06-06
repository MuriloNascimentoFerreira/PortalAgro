<?php
include_once("../logica/Conexao.php");
include_once("../logica/Animal.php");
include_once("../logica/enums.php");
include_once("RepositoryRebanho.php");

class RepositoryAnimal extends Conexao{

    private $db;

    public function adicionar($animal)
    {
        session_start();
        $this->db = $this->conectaDB()->prepare("insert into animal values (?,?,?,?,?,?)");
        $this->db->bindValue("1",$animal->getId());
        $this->db->bindValue("2",$animal->getRacao());
        $this->db->bindValue("3",$animal->getPeso());
        $this->db->bindValue("4",$animal->getDataNascimento());
        $this->db->bindValue("5",$animal->getSituacaoNumero($animal->getSituacao()));
        $this->db->bindValue("6",$_SESSION['rebanho_id']);
        $resultado = $this->db->execute();

        if($resultado ){
            echo 
                '<script>
                    window.location.replace("http://localhost/portalagro/apresentacao-web/formAnimais.php");
                </script>';
            exit;
            
        }else{
            echo '
                <script>
                    window.alert("Animal não adicionado")
                </script>';
            exit; 
        }
    
    }

    public function listar()
    {
        $this->db = $this->conectaDB()->prepare("select * from animal where rebanho_id = ?");
        $this->db->bindValue(1,$_SESSION['rebanho_id']);
        $resultado = $this->db->execute();

        $lista = $this->db->fetchAll();

        $animais = array(); 

        if($resultado){
            foreach($lista as $item){
                $animal = new Animal();
                $animal->setId($item['id']);
                $animal->setRacao($item['racao']);
                $animal->setPeso($item['peso']);
                $animal->setDataNascimento($item['data_nascimento']);
                $animal->setSituacao($animal->getSituacaoString($item['situacao']));
                $animal->setRebanho($this->recuperaRebanho($item['rebanho_id']));
                $animais[] = $animal;
            }
        }
        
        return $animais;
    }

    public function getAnimal($id){
        
    }

    public function recuperaRebanho($id){
        $repositoryRebanho = new RepositoryRebanho();
        return $repositoryRebanho->getRebanho($id); 
    }

}
?>