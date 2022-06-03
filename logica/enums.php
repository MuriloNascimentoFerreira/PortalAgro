<?php

class TipoRebanho 
{
    const ASSININO = 'Assinino';
    const BOVINO = 'Bovino'; 
    const BUFALINO = 'Bufalino';
    const CAPRINO = 'Caprino';
    const EQUINO = 'Equino';
    const MUAR = 'Muar';
    const OVINO = 'Ovino';
    const SUINO = 'Suíno';

    public function getTipoRebanho($numero){
        switch($numero){
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
}


class TipoSituacao{
    const VIVO = 'Vivo';
    const ABATIDO = 'Abatido';

    public function getTipoSituacao($numero){
        switch($numero){
            case 1: return TipoSituacao::VIVO;
            case 2: return TipoSituacao::ABATIDO;
        }
    }
}

?>