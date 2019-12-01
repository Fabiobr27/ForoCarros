<?php

	// Fabio Benitez Ramirez
	class Modelo
	{
		private $NombreMod ;
                private $CodigoMod ;
		private $CodigoMarca;
                private $imagen ;
               private $FichaTecnica ;
		

		public function __construct() { }
	
	    
	    public function getCodigoMarca()
	    {
	        return $this->CodigoMarca;
	    }

	   
	    public function setCodigoMarca($CodigoMarca)
	    {
	        $this->CodigoMarca = $CodigoMarca;

	        return $this;
	    }

	    
	    public function getNombreMod()
	    {
	        return $this->NombreMod;
	    }

	    
	    public function setNombreMod($NombreMod)
	    {
	        $this->NombreMod = $NombreMod;

	        return $this;
	    }

	    public function getFichaTecnica()
	    {
	        return $this->FichaTecnica;
	    }

	    
	    public function setFichaTecnica($FichaTecnica)
	    {
	        $this->FichaTecnica = $FichaTecnica;

	        return $this;
	    }
	    
	    public function getimagen()
	    {
	        return $this->imagen;
	    }

	    
	    public function setimagen($imagen)
	    {
	        $this->imagen = $imagen;

	        return $this;
	    }

	    
	    public function getcodigoMod()
	    {
	        return $this->CodigoMod;
	    }

	   
	    public function setcodigoMod($codMod)
	    {
	        $this->CodigoMod= $codMod;

	        return $this;
	    }

        }