<?php

	// Fabio Benitez Ramirez

	class Marca
	{
		private $NombreMarca ;
		private $CodigoMarca;
		private $anioFundacion ;
		private $logo ;
		

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

	   
	    public function getNombreMarca()
	    {
	        return $this->NombreMarca;
	    }

	   
	    public function setNombreMarca($NombreMarca)
	    {
	        $this->NombreMarca = $NombreMarca;

	        return $this;
	    }

	   
	    public function getlogo()
	    {
	        return $this->logo;
	    }

	    /**
	     * @param mixed $poster
	     *
	     * @return self
	     */
	    public function setlogo($logo)
	    {
	        $this->logo = $logo;

	        return $this;
	    }

	    
	    public function getanioFundacion()
	    {
	        return $this->anioFundacion;
	    }

	    
	    public function setanioFundacion($anioFundacion)
	    {
	        $this->anioFundacion= $anioFundacion;

	        return $this;
	    }

        }