<?php
    class Evidencia
    {
        var $Codigo;
        var $Condicion;
        var $Articulo;
        var $Literal;
        var $Numeral;
        var $Programa;
        var $TituloEvidencia;
        var $FechaCreacion;
        var $NombreAutor;
        var $ApellidoAutor;
        var $TipoEvidencia;
        var $Evidencia;
        function __construct($Codigo,$Condicion,$Articulo,$Literal,$Numeral,$Programa,$TituloEvidencia,$FechaCreacion,$NombreAutor,$ApellidoAutor,$TipoEvidencia,$Evidencia)
        {
            $this->Codigo=$Codigo;
            $this->Condicion=$Condicion;
            $this->Articulo=$Articulo;
            $this->Literal=$Literal;
            $this->Numeral=$Numeral;
            $this->Programa=$Programa;
            $this->TituloEvidencia=$TituloEvidencia;
            $this->FechaCreacion=$FechaCreacion;
            $this->NombreAutor=$NombreAutor;
            $this->ApellidoAutor=$ApellidoAutor;
            $this->TipoEvidencia=$TipoEvidencia;
            $this->Evidencia=$Evidencia;
        }
        function setCodigo($Codigo)
        {
            $this->Codigo=$Codigo;
        }
        function getCodigo()
        {
            return $this->Codigo;
        }
        function setCondicion($Condicion)
        {
            $this->Condicion=$Condicion;
        }
        function getCondicion()
        {
            return $this->Condicion;
        }
        function setArticulo($Articulo)
        {
            $this->Articulo=$Articulo;
        }
        function getArticulo()
        {
            return $this->Articulo;
        }
        function setLiteral($Literal)
        {
            $this->Literal=$Literal;
        }
        function getLiteral()
        {
            return $this->Literal;
        }
        function setNumeral($Numeral)
        {
            $this->Numeral=$Numeral;
        }
        function getNumeral()
        {
            return $this->Numeral;
        }
        function setPrograma($Programa)
        {
            $this->Programa=$Programa;
        }
        function getPrograma()
        {
            return $this->Programa;
        }
        function setTituloEvidencia($TituloEvidencia)
        {
            $this->TituloEvidencia=$TituloEvidencia;
        }
        function getTituloEvidencia()
        {
            return $this->TituloEvidencia;
        }
        function setFechaCreacion($FechaCreacion)
        {
            $this->FechaCreacion=$FechaCreacion;
        }
        function getFechaCreacion()
        {
            return $this->FechaCreacion;
        }
        function setNombreAutor($NombreAutor)
        {
            $this->NombreAutor=$NombreAutor;
        }
        function getNombreAutor()
        {
            return $this->NombreAutor;
        }
        function setApellidoAutor($ApellidoAutor)
        {
            $this->ApellidoAutor=$ApellidoAutor;
        }
        function getApellidoAutor()
        {
            return $this->ApellidoAutor;
        }  
        function setTipoEvidencia($TipoEvidencia)
        {
            $this->TipoEvidencia=$TipoEvidencia;
        }
        function getTipoEvidencia()
        {
            return $this->TipoEvidencia;
        }  
        function setEvidencia($Evidencia)
        {
            $this->Evidencia=$Evidencia;
        }
        function getEvidencia()
        {
            return $this->Evidencia;
        }
    }
?>