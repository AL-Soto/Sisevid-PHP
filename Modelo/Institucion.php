<?php
    class Institucion
    {
        var $Nit;
        var $Nombre;
        var $Condicion;
        var $Estatus;
        var $Pagina;
        function __construct($Nit,$Nombre,$Condicion,$Estatus,$Pagina)
        {
            $this->Nit=$Nit;
            $this->Nombre=$Nombre;
            $this->Condicion=$Condicion;
            $this->Estatus=$Estatus;
            $this->Pagina=$Pagina;
        }
        function setNit($Nit)
        {
            $this->Nit=$Nit;
        }
        function getNit()
        {
            return $this->Nit;
        }
        function setNombre($Nombre)
        {
            $this->Nombre=$Nombre;
        }
        function getNombre()
        {
            return $this->Nombre;
        }
        function setCondicion($Condicion)
        {
            $this->Condicion=$Condicion;
        }
        function getCondicion()
        {
            return $this->Condicion;
        }
        function setEstatus($Estatus)
        {
            $this->Estatus=$Estatus;
        }
        function getEstatus()
        {
            return $this->Estatus;
        }
        function setPagina($Pagina)
        {
            $this->Pagina=$Pagina;
        }
        function getPagina()
        {
            return $this->Pagina;
        }
        
    }
?>