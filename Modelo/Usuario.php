<?php
    class Usuario
    {
        var $Cedula;
        var $Nombre1;
        var $Nombre2;
        var $Apellido1;
        var $Apellido2;
        var $Contrasena;
        var $TipoUsuario;
        var $correoElectronico;
        function __construct($Cedula,$Nombre1,$Nombre2,$Apellido1,$Apellido2,$Contrasena,$TipoUsuario,$correoElectronico)
        {
            $this->Cedula=$Cedula;
            $this->Nombre1=$Nombre1;
            $this->Nombre2=$Nombre2;
            $this->Apellido1=$Apellido1;
            $this->Apellido2=$Apellido2;
            $this->Contrasena=$Contrasena;
            $this->TipoUsuario=$TipoUsuario;
            $this->CorreoElectronico=$correoElectronico;
        }
        function setCedula($Cedula)
        {
            $this->Cedula=$Cedula;
        }
        function getCedula()
        {
            return $this->Cedula;
        }
        function setNombre1($Nombre1)
        {
            $this->Nombre1=$Nombre1;
        }
        function getNombre1()
        {
            return $this->Nombre1;
        }
        function setNombre2($Nombre2)
        {
            $this->Nombre2=$Nombre2;
        }
        function getNombre2()
        {
            return $this->Nombre2;
        }
        function setApellido1($Apellido1)
        {
            $this->Apellido1=$Apellido1;
        }
        function getApellido1()
        {
            return $this->Apellido1;
        }
        function setApellido2($Apellido2)
        {
            $this->Apellido2=$Apellido2;
        }
        function getApellido2()
        {
            return $this->Apellido2;
        }
        function setContrasena($Contrasena)
        {
            $this->Contrasena=$Contrasena;
        }
        function getContrasena()
        {
            return $this->Contrasena;
        }
        function setTipoUsuario($TipoUsuario)
        {
            $this->TipoUsuario=$TipoUsuario;
        }
        function getTipoUsuario()
        {
            return $this->TipoUsuario;
        }
        function setCorreo($correoElectronico)
        {
            $this->CorreoElectronico=$correoElectronico;
        }
        function getCorreo()
        {
            return $this->CorreoElectronico;
        }
        
    }
?>