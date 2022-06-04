<?php
include_once("../logica/Conexao.php");
include_once("../logica/Animal.php");
include_once("../logica/enums.php");

class RepositoryAnimal extends Conexao{

    private $db;

    public function adicionar()
    {
        $this->db = $this->conectaDB();
    }

    public function listar()
    {
        $this->db = $this->conectaDB();

        return $animais = new Animal();
    }

    public function getAnimal($id){
        
    }

}
?>