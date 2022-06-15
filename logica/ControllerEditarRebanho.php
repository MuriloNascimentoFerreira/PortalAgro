<?php

require_once("../persistencia/RepositoryRebanho.php");
require_once("enums.php");

class ControllerEditarRebanho{
    private $rebanho;

    public function __construct()
    {
        $this->rebanho = new Rebanho();
        $this->tipoRebanho = new TipoRebanho();
        $this->rebanho->setId($_GET['id']);
        $this->rebanho->setDescricao($_POST['descricao']);
        $this->rebanho->setTipo($this->tipoRebanho->getTipoRebanho($_POST['tipo']));
        $this->validaDados();
    }

    public function validaDados(){

        if($this->rebanho->getDescricao() != null){
            $repositoryRebanho = new RepositoryRebanho();
            $repositoryRebanho->editar($this->rebanho);
        }else{
            echo '<script> 
                    window.alert("Preencha todos os campos!")
                    window.history.back()   
                </script>';
        }
    }
}

$controllerEditarRebanho = new ControllerEditarRebanho();
    //editar rebanho 
?>