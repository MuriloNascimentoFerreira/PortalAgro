<?php

class Rebanho{

    private $id;
    private $descricao;
    private $tipo;

    public function __construct()
    {
        $this->id = 0;
        $this->descricao = '';
        $this->tipo = TipoRebanho::class;
    }

    public function getId(){
        return $this->id;
    }

    public function getDescricao(){
        return $this->descricao;
    }

    public function getTipo(){
        return $this->tipo;
    }

    public function getTipoRebanhoEmNumero($tipo){
        switch($tipo){
            case TipoRebanho::ASSININO: return 1;
            case TipoRebanho::BOVINO: return 2;
            case TipoRebanho::BUFALINO: return 3;
            case TipoRebanho::CAPRINO: return 4;
            case TipoRebanho::EQUINO: return 5;
            case TipoRebanho::MUAR: return 6;
            case TipoRebanho::OVINO: return 7;
            case TipoRebanho::SUINO: return 8;
        }    
    }

    public function getTipoRebanhoEmString($tipo){
        switch($tipo){
            case 1: return TipoRebanho::ASSININO;
            case 2: return TipoRebanho::BOVINO;
            case 3: return TipoRebanho::BUFALINO;
            case 4: return TipoRebanho::CAPRINO;
            case 5: return TipoRebanho::EQUINO;
            case 6: return TipoRebanho::MUAR;
            case 7: return TipoRebanho::OVINO;
            case 8: return TipoRebanho::SUINO;
        }
    }

    public function setId($id){
        $this->id = $id;
    }

    public function setDescricao($descricao){
        $this->descricao = $descricao;
    }

    public function setTipo($tipo){
        $this->tipo = $tipo;
    }

}