<?php

	// Fabio Benitez Ramirez
	class Modelo
	{

                private $CodigoMod ;
		private $idUsu;
                private $favorito ;
                private $Comentario;
               
		

		public function __construct() { }
	
	   
	    public function getidUsU()
	    {
	        return $this->idUsu;
	    }

	    
	    public function setidUsu($idUsu)
	    {
	        $this->idUsu = $idUsu;

	        return $this;
	    }

	   
	    public function getfavorito()
	    {
	        return $this->favorito;
	    }

	    
	    public function setfavorito($favorito)
	    {
	        $this->favorito= $favorito;

	        return $this;
	    }
            
             public function getcomentario()
	    {
	        return $this->Comentario;
	    }

	   
	    public function setcomentario($Comentario)
	    {
	        $this->Comentario= $Comentario;

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