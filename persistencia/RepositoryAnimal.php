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
        $this->db = $this->conectaDB()->prepare("INSERT INTO animal VALUES (?,?,?,?,?,?)");
        $this->db->bindValue("1",$animal->getId());
        $this->db->bindValue("2",$animal->getRacao());
        $this->db->bindValue("3",$animal->getPeso());
        $this->db->bindValue("4",$animal->getDataNascimento());
        $this->db->bindValue("5",$animal->getSituacaoNumero($animal->getSituacao()));
        $this->db->bindValue("6",$_SESSION['rebanho_id']);
        $resultado = $this->db->execute();

        if($resultado){
            echo 
                '<script>
                    window.location.replace("../apresentacao-web/formAnimais.php");
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
        $this->db = $this->conectaDB()->prepare("SELECT * from animal where rebanho_id = ?");
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
        $this->db = $this->conectaDB()->prepare("SELECT * from animal where id = ?");
        $this->db->bindValue(1,$id);
        $resultado = $this->db->execute();
        $item = $this->db->fetch();
        $animal = new Animal();

        if($resultado){
            $animal->setId($item['id']);
            $animal->setRacao($item['racao']);
            $animal->setPeso($item['peso']);
            $animal->setDataNascimento($item['data_nascimento']);
            $animal->setSituacao($animal->getSituacaoString($item['situacao']));
            $animal->setRebanho($this->recuperaRebanho($item['rebanho_id']));
        }
        return $animal;

    }

    public function recuperaRebanho($id){
        $repositoryRebanho = new RepositoryRebanho();
        return $repositoryRebanho->getRebanho($id); 
    }

    public function excluir($id){
        $this->db = $this->conectaDB()->prepare("DELETE from animal where id=?");
        $this->db->bindValue(1,$id);
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
                    window.alert("Animal não excluido")
                </script>';
            exit; 
        }
    }

    public function editar($animal){
       
        $this->db = $this->conectaDB()->prepare("UPDATE animal SET racao=?, peso=?, data_nascimento=?, situacao=? where id=?");
        $this->db->bindValue(1,$animal->getRacao());
        $this->db->bindValue(2,$animal->getPeso());
        $this->db->bindValue(3,$animal->getDataNascimento());
        $this->db->bindValue(4,$animal->getSituacaoNumero($animal->getSituacao()));
        $this->db->bindValue(5,$animal->getId());
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
                    window.alert("Animal não alterado")
                </script>';
            exit; 
        }
        
    }

    public function mudarSituacao($animal){
       
        $this->db = $this->conectaDB()->prepare("UPDATE animal SET situacao=? where id=?");
 
        $this->db->bindValue(1,$animal->getSituacaoNumero($animal->getSituacao()));
        $this->db->bindValue(2,$animal->getId());
        $resultado = $this->db->execute();

        if($resultado ){
            echo 
                '<script>
                    window.location.replace("../apresentacao-web/formAnimais.php");
                </script>';  
            exit;
            
        }else{
            echo 
                '<script>
                    window.alert("Animal não abatido")
                </script>';
            exit; 
        }
        
    }

}
?>