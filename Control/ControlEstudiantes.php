<?php
	class ControlEstudiantes
    {
		var $objEstudiantes;
		function __construct($objEstudiantes)
        {
			$this->objEstudiantes=$objEstudiantes;
		}
		function guardar(){
			$Ident=$this->objEstudiantes->getIdentificacion();
			$Nom=$this->objEstudiantes->getNombre();
			$Apell=$this->objEstudiantes->getApellido();
            $NivAcd=$this->objEstudiantes->getNivelAcademico();
            $Prog=$this->objEstudiantes->getPrograma();
            $Inst=$this->objEstudiantes->getInstitucion();
			$comandoSql="INSERT INTO tbl_estudiante VALUES('".$Ident."','".$Nom."','".$Apell."','".$NivAcd."','".$Prog."','".$Inst."')";
			$objControlEstudiantes=new ControlConexion();
			$objControlEstudiantes->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat']);
			$objControlEstudiantes->ejecutarComandoSql($comandoSql);
			$objControlEstudiantes->cerrarBd();
		}
		function modificar(){
			$Ident=$this->objEstudiantes->getIdentificacion();
			$Nom=$this->objEstudiantes->getNombre();
			$Apell=$this->objEstudiantes->getApellido();
            $NivAcd=$this->objEstudiantes->getNivelAcademico();
            $Prog=$this->objEstudiantes->getPrograma();
            $Inst=$this->objEstudiantes->getInstitucion();
$comandoSql="UPDATE tbl_estudiante SET Nombre='".$Nom."',Apellido='".$Apell."', NivelAcademico='".$NivAcd."', Programa='".$Prog."', Institucion='".$Inst."' where Identificacion='".$Ident."'";
			$objControlEstudiantes=new ControlConexion();
			$objControlEstudiantes->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat']);
			$objControlEstudiantes->ejecutarComandoSql($comandoSql);
			$objControlEstudiantes->cerrarBd();
		}
		function borrar(){
			$Ident=$this->objEstudiantes->getIdentificacion();
$comandoSql="delete from tbl_estudiante where identificacion ='".$Ident."'";
			$objControlEstudiantes=new ControlConexion();
			$objControlEstudiantes->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat']);
			$objControlEstudiantes->ejecutarComandoSql($comandoSql);
			$objControlEstudiantes->cerrarBd();
		}	
		function consultar(){
			$Nom="";
			$Apell="";
			$NivAcd="";
			$Prog="";
			$Inst="";
			$Ident=$this->objEstudiantes->getIdentificacion();
			$comandoSql="select * from tbl_Estudiante where Identificacion='".$Ident."'";
			$objControlConexion=new ControlConexion();
			$objControlConexion->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat']);
			$recordSet=$objControlConexion->ejecutarSelect($comandoSql);
			if($row=$recordSet->fetch_array(MYSQLI_BOTH)){
				$Nom=$row["Nombre"];
				$Apell=$row["Apellido"];
				$NivAcd=$row["NivelAcademico"];
				$Prog=$row["Programa"];
				$Inst=$row["Institucion"];
				$Nom=$this->objEstudiantes->setNombre($Nom);
				$Apell=$this->objEstudiantes->setApellido($Apell);
				$NivAcd=$this->objEstudiantes->setNivelAcademico($NivAcd);
				$Prog=$this->objEstudiantes->setPrograma($Prog);
				$Inst=$this->objEstudiantes->setInstitucion($Inst);
			}
			return $this->objEstudiantes;
		}			
	}
?>