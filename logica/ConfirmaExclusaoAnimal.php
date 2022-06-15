<?php
include_once("../persistencia/RepositoryAnimal.php");

class ConfirmaExclusao{

    public function __construct()
    {
        $this->excluirAnimal();
    }

    public function excluirAnimal(){
        $repositoryAnimal = new RepositoryAnimal();
        if(isset($_GET['id'])){
            $repositoryAnimal->excluir($_GET['id']);
        }
        
    }
}
$new = new ConfirmaExclusao();
?>