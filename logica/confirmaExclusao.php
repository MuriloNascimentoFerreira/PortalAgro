<?php
include_once("../persistencia/RepositoryRebanho.php");

class ConfirmaExclusao{

    public function __construct()
    {
        $this->excluirRebanho();
    }

    public function excluirRebanho(){
        $repositoryRebanho = new RepositoryRebanho();
        if(isset($_GET['id'])){
            $repositoryRebanho->excluir($_GET['id']);
        }
    }
}
$new = new ConfirmaExclusao();
?>