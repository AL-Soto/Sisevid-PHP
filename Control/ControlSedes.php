<?php
	class ControlSedes
    {
		var $objSedes;
		function __construct($objSedes)
        {
			$this->objSedes=$objSedes;
		}
		function guardar(){
			$Id=$this->objSedes->getId();
            $nom=$this->objSedes->getNombre();
            $nit=$this->objSedes->getNit();
            $tel=$this->objSedes->getTelefono();
            $dire=$this->objSedes->getDireccion();
            $dep=$this->objSedes->getDepartamento();
            $ciu=$this->objSedes->getCiudad();
            $tip=$this->objSedes->getTipoLugar();
            $lug=$this->objSedes->getLugar();
			$comandoSql="INSERT INTO tbl_sedes VALUES('".$Id."','".$nom."','".$nit."','".$tel."','".$dire."','".$dep."','".$ciu."','".$tip."','".$lug."')";
			$objControlSedes=new ControlConexion();
			$objControlSedes->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat']);
			$objControlSedes->ejecutarComandoSql($comandoSql);
			$objControlSedes->cerrarBd();
		}
		function modificar(){
            $Id=$this->objSedes->getId();
            $nom=$this->objSedes->getNombre();
            $nit=$this->objSedes->getNit();
            $tel=$this->objSedes->getTelefono();
            $dire=$this->objSedes->getDireccion();
            $dep=$this->objSedes->getDepartamento();
            $ciu=$this->objSedes->getCiudad();
            $tip=$this->objSedes->getTipoLugar();
            $lug=$this->objSedes->getLugar();
$comandoSql="UPDATE tbl_sedes SET nomSede='".$nom."', Nit='".$nit."', Telefono='".$tel."', Direccion='".$dire."', Departamento='".$dep."', Ciudad='".$ciu."', Tipolugar='".$tip."', lugar='".$lug."' where Id='".$Id."'";
			$objControlSedes=new ControlConexion();
			$objControlSedes->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat']);
			$objControlSedes->ejecutarComandoSql($comandoSql);
			$objControlSedes->cerrarBd();
		}
		function borrar(){
			$Id=$this->objSedes->getId();
$comandoSql="delete from tbl_sedes where Id ='".$Id."'";
			$objControlSedes=new ControlConexion();
			$objControlSedes->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat']);
			$objControlSedes->ejecutarComandoSql($comandoSql);
			$objControlSedes->cerrarBd();
		}
		function consultar(){
			$Id="";
			$nom="";
			$nit="";
			$tel="";
            $dire="";
			$dep="";
			$ciu="";
            $tip="";
			$lug="";
			$Id=$this->objSedes->getId();
			$comandoSql="select * from tbl_sedes where Id='".$Id."'";
			$objControlConexion=new ControlConexion();
			$objControlConexion->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat']);
			$recordSet=$objControlConexion->ejecutarSelect($comandoSql);
			if($row=$recordSet->fetch_array(MYSQLI_BOTH)){
				$nom=$row["nomSede"];
				$nit=$row["Nit"];
				$tel=$row["Telefono"];
				$dire=$row["Direccion"];
				$dep=$row["Departamento"];
                $ciu=$row["Ciudad"];
                $tip=$row["Tipolugar"];
				$lug=$row["lugar"];
                $nom=$this->objSedes->setNombre($nom);
                $nit=$this->objSedes->setNit($nit);
                $tel=$this->objSedes->setTelefono($tel);
                $dire=$this->objSedes->setDireccion($dire);
                $dep=$this->objSedes->setDepartamento($dep);
                $ciu=$this->objSedes->setCiudad($ciu);
                $tip=$this->objSedes->setTipoLugar($tip);
                $lug=$this->objSedes->setLugar($lug);	
			}
			return $this->objSedes;
		}						
	}
?>