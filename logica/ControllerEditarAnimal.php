<?php

require_once("../persistencia/RepositoryAnimal.php");
require_once("enums.php");

class ControllerEditarAnimal{
    private $animal;

    public function __construct()
    {
        $this->animal = new Animal();
        $this->situacao = new TipoSituacao();
        $this->animal->setId($_GET['id']);
        $this->animal->setRacao($_POST['racao']);
        $this->animal->setPeso($_POST['peso']);
        $this->animal->setDataNascimento($_POST['dataNascimento']);
        $this->animal->setSituacao($this->situacao->getTipoSituacao($_POST['situacao']));
        $this->alterarDados();
        
    }

    public function alterarDados(){

        $repositoryAnimal = new RepositoryAnimal();
        $repositoryAnimal->editar($this->animal);
            
    }

}

$controllerEditarAnimal = new ControllerEditarAnimal();
?>