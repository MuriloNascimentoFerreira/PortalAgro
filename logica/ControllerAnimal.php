<?php

include_once("../persistencia/RepositoryAnimal.php");
include_once("Animal.php");
include_once("enums.php");

class ControllerAnimal{

    private $animal;

    public function __construct()
    {
        $this->animal = new Animal();
        $this->animal->setRacao($_POST['racao']);
        $this->animal->setPeso($_POST['peso']);
        $this->animal->setDataNascimento($_POST['dataNascimento']);
        echo $_POST['dataNascimento'];
        $this->animal->setSituacao($this->animal->getSituacaoString($_POST['situacao']));
        $this->validaDados();
    }

    public function validaDados(){
        if(!is_null($this->animal->getRacao()) && !is_null($this->animal->getPeso()) && !is_null($this->animal->getDataNascimento()) ){
            $repositoryAnimal = new RepositoryAnimal();
            $repositoryAnimal->adicionar($this->animal);
            
        }else{
            echo '<script> 
                    window.alert("Preencha todos os campos!")
                    window.history.back()   
                </script>';
        }
    }
}

$new = new ControllerAnimal();