<?php
    class Profesor
    {
        var $Cedula;
        var $Nombre;
        var $Apellido;
        var $Estatus;
        var $Institucion;
        function __construct($Cedula,$Nombre,$Apellido,$Estatus,$Institucion)
        {
            $this->Cedula=$Cedula;
            $this->Nombre=$Nombre;
            $this->Apellido=$Apellido;
            $this->Estatus=$Estatus;
            $this->Institucion=$Institucion;
        }
        function setCedula($Cedula)
        {
            $this->Cedula=$Cedula;
        }
        function getCedula()
        {
            return $this->Cedula;
        }
        function setNombre($Nombre)
        {
            $this->Nombre=$Nombre;
        }
        function getNombre()
        {
            return $this->Nombre;
        }
        function setApellido($Apellido)
        {
            $this->Apellido=$Apellido;
        }
        function getApellido()
        {
            return $this->Apellido;
        }
        function setEstatus($Estatus)
        {
            $this->Estatus=$Estatus;
        }
        function getEstatus()
        {
            return $this->Estatus;
        }
        function setInstitucion($Institucion)
        {
            $this->Institucion=$Institucion;
        }
        function getInstitucion()
        {
            return $this->Institucion;
        }
        
    }
?>