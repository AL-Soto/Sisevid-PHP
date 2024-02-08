<?php
    class IngresoUsuario
    {
        var $nomUsuario;
        var $contrasena;
        var $nivelAcceso;
        function __construct($nomUsuario,$contrasena,$nivelAcceso)
        {
            $this->nomUsuario=$nomUsuario;
            $this->contrasena=$contrasena;
            $this->nivelAcceso=$nivelAcceso;
        }
        function setNomUsuario($nomUsuario)
        {
            $this->nomUsuario=$nomUsuario;
        }
        function getNomUsuario()
        {
            return $this->nomUsuario;
        }
        function setContrasena($contrasena)
        {
            $this->contrasena=$contrasena;
        }
        function getContrasena()
        {
            return $this->contrasena;
        }
        function setNivelAcceso($nivelAcceso)
        {
            $this->nivelAcceso=$nivelAcceso;
        }
        function getNivelAcceso()
        {
            return $this->nivelAcceso;
        }
        
    }
?>