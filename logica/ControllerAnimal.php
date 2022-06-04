<?php

include_once("../persistencia/RepositoryAnimal.php");
include_once("Animal.php");
include_once("enums.php");

class ControllerAnimal{

    private $animal;
    private $rebanho;

    public function __construct()
    {
        $this->animal = new Animal();
        
        $this->validaDados();
    }

    public function validaDados(){

    }


}

$new = new ControllerAnimal();