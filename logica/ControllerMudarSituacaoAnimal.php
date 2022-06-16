<?php
require_once("../persistencia/RepositoryAnimal.php");

class ControllerMudarSituacaoAnimal{
    private $animal;

    public function __construct()
    {
        $this->animal = new Animal();
        $repositoryAnimal = new RepositoryAnimal();
        $animalRecuperado = $repositoryAnimal->getAnimal($_GET["id"]);
        if($animalRecuperado->getSituacao() == TipoSituacao::VIVO){
            $this->animal->setSituacao(TipoSituacao::ABATIDO);
        }else{
            $this->animal->setSituacao(TipoSituacao::VIVO);
        }
        $this->animal->setId($_GET["id"]);
        
        
        $repositoryAnimal->mudarSituacao($this->animal);        
        
    }
}

$controllerMudarSituacaoAnimal = new ControllerMudarSituacaoAnimal();
?>