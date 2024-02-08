<?php
    class Programa
    {
        var $Id;
        var $Nombre;
        var $Titulo;
        var $Tipo;
        var $Institucion;
        var $Modalidad;
        function __construct($Id,$Nombre,$Titulo,$Tipo,$Institucion,$Modalidad,)
        {
            $this->Id=$Id;
            $this->Nombre=$Nombre;
            $this->Titulo=$Titulo;
            $this->Tipo=$Tipo;
            $this->Institucion=$Institucion;
            $this->Modalidad=$Modalidad;
        }
        function setId($Id)
        {
            $this->Id=$Id;
        }
        function getId()
        {
            return $this->Id;
        }
        function setNombre($Nombre)
        {
            $this->Nombre=$Nombre;
        }
        function getNombre()
        {
            return $this->Nombre;
        }
        function setTitulo($Titulo)
        {
            $this->Titulo=$Titulo;
        }
        function getTitulo()
        {
            return $this->Titulo;
        }
        function setTipo($Tipo)
        {
            $this->Tipo=$Tipo;
        }
        function getTipo()
        {
            return $this->Tipo;
        }
        function setInstitucion($Institucion)
        {
            $this->Institucion=$Institucion;
        }
        function getInstitucion()
        {
            return $this->Institucion;
        }
        function setModalidad($Modalidad)
        {
            $this->Modalidad=$Modalidad;
        }
        function getModalidad()
        {
            return $this->Modalidad;
        }
    }
?>