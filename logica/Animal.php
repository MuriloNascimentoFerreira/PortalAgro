<?php 

class Animal{
    private $id;
    private $racao;
    private $peso;
    private $dataNascimento;
    private $situacao;
    private $rebanho;

    public function __construct()
    {
        $this->id = 0;
        $this->racao = 0;
        $this->peso = 0;
        $this->dataNascimento = date("d/m/Y");
        $this->situacao = TipoSituacao::VIVO;
        $this->rebanho = Rebanho::class;
    }

    public function getId(){
        return $this->id;
    }

    public function getRacao(){
        return $this->racao;
    }

    public function getPeso(){
        return $this->peso;
    }

    public function getDataNascimento(){
        return $this->dataNascimento;
    }

    public function getSituacao(){
        return $this->situacao; 
    }

    public function getSituacaoNumero($numero){
        switch($numero){
            case TipoSituacao::VIVO: return 1;
            case TipoSituacao::ABATIDO: return 2;
        }
    }

    public function getSituacaoString($tipo){
        switch($tipo){
            case 1: return TipoSituacao::VIVO;
            case 2: return TipoSituacao::ABATIDO;
        }
        
    }

    public function getRebanho(){
        return $this->rebanho;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function setRacao($racao){
        $this->racao = $racao;
    }

    public function setPeso($peso){
        $this->peso = $peso;
    }

    public function setDataNascimento($dataNascimento){
        $this->dataNascimento = $dataNascimento;
    }

    public function setSituacao($tipoSituacao){
        $this->tipoSituacao = $tipoSituacao;
    }

    public function setRebanho($rebanho){
        $this->rebanho = $rebanho;
    }
}

?>