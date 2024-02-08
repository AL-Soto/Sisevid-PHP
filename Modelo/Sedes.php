<?php
    class Sedes
    {
        var $Id;
        var $Nombre;
        var $Nit;
        var $Telefono;
        var $Direccion;
        var $Departamento;
        var $Ciudad;
        var $TipoLugar;
        var $Lugar;
        function __construct($Id,$Nombre,$Nit,$Telefono,$Direccion,$Departamento,$Ciudad,$TipoLugar,$Lugar)
        {
            $this->Id=$Id;
            $this->Nombre=$Nombre;
            $this->Nit=$Nit;
            $this->Telefono=$Telefono;
            $this->Direccion=$Direccion;
            $this->Departamento=$Departamento;
            $this->Ciudad=$Ciudad;
            $this->TipoLugar=$TipoLugar;
            $this->Lugar=$Lugar;
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
        function setNit($Nit)
        {
            $this->Nit=$Nit;
        }
        function getNit()
        {
            return $this->Nit;
        }
        function setTelefono($Telefono)
        {
            $this->Telefono=$Telefono;
        }
        function getTelefono()
        {
            return $this->Telefono;
        }
        function setDireccion($Direccion)
        {
            $this->Direccion=$Direccion;
        }
        function getDireccion()
        {
            return $this->Direccion;
        }
        function setDepartamento($Departamento)
        {
            $this->Departamento=$Departamento;
        }
        function getDepartamento()
        {
            return $this->Departamento;
        }
        function setCiudad($Ciudad)
        {
            $this->Ciudad=$Ciudad;
        }
        function getCiudad()
        {
            return $this->Ciudad;
        }
        function setTipoLugar($TipoLugar)
        {
            $this->TipoLugar=$TipoLugar;
        }
        function getTipoLugar()
        {
            return $this->TipoLugar;
        }
        function setLugar($Lugar)
        {
            $this->Lugar=$Lugar;
        }
        function getLugar()
        {
            return $this->Lugar;
        }
    }
?>