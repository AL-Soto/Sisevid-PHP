<?php
	class ControlProfesor
    {
		var $objProfesor;
		function __construct($objProfesor)
        {
			$this->objProfesor=$objProfesor;
		}
		function guardar(){
			$Ced=$this->objProfesor->getCedula();
			$Nom=$this->objProfesor->getNombre();
			$Apell=$this->objProfesor->getApellido();
            $Estat=$this->objProfesor->getEstatus();
            $Inst=$this->objProfesor->getInstitucion();
			$comandoSql="INSERT INTO tbl_profesor VALUES('".$Ced."','".$Nom."','".$Apell."','".$Estat."','".$Inst."')";
			$objControlProfesor=new ControlConexion();
			$objControlProfesor->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat']);
			$objControlProfesor->ejecutarComandoSql($comandoSql);
			$objControlProfesor->cerrarBd();
		}
		function modificar(){
			$Ced=$this->objProfesor->getCedula();
			$Nom=$this->objProfesor->getNombre();
			$Apell=$this->objProfesor->getApellido();
            $Estat=$this->objProfesor->getEstatus();
            $Inst=$this->objProfesor->getInstitucion();
$comandoSql="UPDATE tbl_profesor SET Nombre='".$Nom."', Apellido='".$Apell."', EstatusInterno='".$Estat."', Nnstitucion='".$Inst."' where Cedula='".$Ced."'";
			$objControlProfesor=new ControlConexion();
			$objControlProfesor->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat']);
			$objControlProfesor->ejecutarComandoSql($comandoSql);
			$objControlProfesor->cerrarBd();
		}
		function borrar(){
			$Ced=$this->objProfesor->getCedula();
$comandoSql="delete from tbl_profesor where Cedula ='".$Ced."'";
			$objControlProfesor=new ControlConexion();
			$objControlProfesor->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat']);
			$objControlProfesor->ejecutarComandoSql($comandoSql);
			$objControlProfesor->cerrarBd();
		}
		function consultar(){
			$Nom="";
			$Apell="";
			$Estat="";
			$Inst="";
			$Ced=$this->objProfesor->getCedula();
			$comandoSql="select * from tbl_Profesor where Cedula='".$Ced."'";
			$objControlConexion=new ControlConexion();
			$objControlConexion->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat']);
			$recordSet=$objControlConexion->ejecutarSelect($comandoSql);
			if($row=$recordSet->fetch_array(MYSQLI_BOTH)){
				$Nom=$row["Nombre"];
				$Apell=$row["Apellido"];
				$Estat=$row["EstatusInterno"];
				$Inst=$row["Institucion"];
				$Nom=$this->objProfesor->setNombre($Nom);
				$Apell=$this->objProfesor->setApellido($Apell);
				$Estat=$this->objProfesor->setEstatus($Estat);
				$Inst=$this->objProfesor->setInstitucion($Inst
			
			
			
			);
			}
			return $this->objProfesor;
		}				
	}
?>