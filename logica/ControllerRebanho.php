<?php

include_once("Rebanho.php");
include_once("enums.php");
include_once("../persistencia/RepositoryRebanho.php");

class ControllerRebanho{

    private $rebanhoController;
    private $tipoRebanho;

    public function __construct()
    {
        $this->rebanhoController = new Rebanho();
        $this->tipoRebanho = new TipoRebanho();
        $this->rebanhoController->setDescricao($_POST['descricao']);
        $this->rebanhoController->setTipo($this->tipoRebanho->getTipoRebanho($_POST['tipo']));
        $this->validaDados();
    }

    public function validaDados(){

        if($this->rebanhoController->getDescricao() != null){
            $repositoryRebanho = new RepositoryRebanho();
            $repositoryRebanho->adicionar($this->rebanhoController);
            $repositoryRebanho->listar();
        }else{
            echo '<script> 
                    window.alert("Preencha todos os campos!")
                    window.history.back()   
                </script>';
        }
    }

}

$controllerRebanho = new ControllerRebanho();