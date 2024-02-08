<?php
    class Estudiantes
    {
        var $Identificacion;
        var $Nombre;
        var $Apellido;
        var $NivelAcademico;
        var $Programa;
        var $Institucion;
        function __construct($Identificacion,$Nombre,$Apellido,$NivelAcademico,$Programa,$Institucion)
        {
            $this->Identificacion=$Identificacion;
            $this->Nombre=$Nombre;
            $this->Apellido=$Apellido;
            $this->NivelAcademico=$NivelAcademico;
            $this->Programa=$Programa;
            $this->Institucion=$Institucion;
        }
        function setIdentificacion($Identificacion)
        {
            $this->Identificacion=$Identificacion;
        }
        function getIdentificacion()
        {
            return $this->Identificacion;
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
        function setNivelAcademico($NivelAcademico)
        {
            $this->NivelAcademico=$NivelAcademico;
        }
        function getNivelAcademico()
        {
            return $this->NivelAcademico;
        }
        function setPrograma($Programa)
        {
            $this->Programa=$Programa;
        }
        function getPrograma()
        {
            return $this->Programa;
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