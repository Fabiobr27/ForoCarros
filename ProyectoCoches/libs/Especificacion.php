<?php

// Fabio Benitez Ramirez

class Especificacion {

    private $CodEspe;
    private $CodigoMod;
    private $Caballos;
    private $Año;
    private $Combustible;

    public function __construct() {
        
    }

  
    public function getCaballos() {
        return $this->Caballos;
    }

  
    public function setCaballos($Caballos) {
        $this->Caballos = $Caballos;

        return $this;
    }


    public function getAño() {
        return $this->Año;
    }

  
    public function setAño($Año) {
        $this->Año = $Año;

        return $this;
    }


    public function getCombustible() {
        return $this->imagen;
    }


    public function setCombustible($Combustible) {
        $this->imagen = $imagen;

        return $this;
    }

   
    public function getcodigoMod() {
        return $this->CodigoMod;
    }

 
    public function setcodigoMod($codMod) {
        $this->CodigoMod = $codMod;

        return $this;
    }

    public function getcodigoEspe() {
        return $this->CodEspe;
    }

  
    public function setcodigoEspe($CodEspe) {
        $this->CodEspe = $CodEspe;

        return $this;
    }

}
