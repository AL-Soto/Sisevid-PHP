<?php
    class Cursos
    {
        var $Codigo;
        var $Nombre;
        var $Creditos;
        var $Programa;
        function __construct($Codigo,$Nombre,$Creditos,$Programa)
        {
            $this->Codigo=$Codigo;
            $this->Nombre=$Nombre;
            $this->Creditos=$Creditos;
            $this->Programa=$Programa;
        }
        function setCodigo($Codigo)
        {
            $this->Codigo=$Codigo;
        }
        function getCodigo()
        {
            return $this->Codigo;
        }
        function setNombre($Nombre)
        {
            $this->Nombre=$Nombre;
        }
        function getNombre()
        {
            return $this->Nombre;
        }
        function setCreditos($Creditos)
        {
            $this->Creditos=$Creditos;
        }
        function getCreditos()
        {
            return $this->Creditos;
        }
        function setPrograma($Programa)
        {
            $this->Programa=$Programa;
        }
        function getPrograma()
        {
            return $this->Programa;
        }
        
    }
?>