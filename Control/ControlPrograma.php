<?php
	class ControlPrograma
    {
		var $objPrograma;
		function __construct($objPrograma)
        {
			$this->objPrograma=$objPrograma;
		}
		function guardar(){
			$Id=$this->objPrograma->getId();
			$Nom=$this->objPrograma->getNombre();
			$Tit=$this->objPrograma->getTitulo();
            $Tip=$this->objPrograma->getTipo();
            $Inst=$this->objPrograma->getInstitucion();
            $Modal=$this->objPrograma->getModalidad();
            
			$comandoSql="INSERT INTO tbl_Programa VALUES('".$Id."','".$Nom."','".$Tit."','".$Tip."','".$Inst."','".$Modal."')";
			$objControlPrograma=new ControlConexion();
			$objControlPrograma->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat']);
			$objControlPrograma->ejecutarComandoSql($comandoSql);
			$objControlPrograma->cerrarBd();
		}
		function modificar(){
			$Id=$this->objPrograma->getId();
			$Nom=$this->objPrograma->getNombre();
			$Tit=$this->objPrograma->getTitulo();
            $Tip=$this->objPrograma->getTipo();
            $Inst=$this->objPrograma->getInstitucion();
            $Modal=$this->objPrograma->getModalidad();
            
$comandoSql="UPDATE tbl_programa SET Nombre='".$Nom."', Titulo='".$Tit."', Tipo='".$Tip."', Institucion='".$Inst."', modalidad='".$Modal."', where Id='".$Id."'";
			$objControlPrograma=new ControlConexion();
			$objControlPrograma->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat']);
			$objControlPrograma->ejecutarComandoSql($comandoSql);
			$objControlPrograma->cerrarBd();
		}
		function borrar(){
			$Id=$this->objPrograma->getId();
$comandoSql="delete from tbl_programa where Id ='".$Id."'";
			$objControlPrograma=new ControlConexion();
			$objControlPrograma->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat']);
			$objControlPrograma->ejecutarComandoSql($comandoSql);
			$objControlPrograma->cerrarBd();
		}
		function consultar(){
			$Id="";
			$Nom="";
			$Tit="";
			$Tip="";
			$Inst="";
			$Modal="";
			$Id=$this->objPrograma->getId();
			$comandoSql="select * from tbl_Programa where Id='".$Id."'";
			$objControlConexion=new ControlConexion();
			$objControlConexion->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat']);
			$recordSet=$objControlConexion->ejecutarSelect($comandoSql);
			if($row=$recordSet->fetch_array(MYSQLI_BOTH)){
				$Nom=$row["Nombre"];
				$Tit=$row["Titulo"];
				$Tip=$row["Tipo"];
				$Inst=$row["Institucion"];
				$Modal=$row["modalidad"];
				$Nom=$this->objPrograma->setNombre($Nom);
				$Tit=$this->objPrograma->setTitulo($Tit);
				$Tip=$this->objPrograma->setTipo($Tip);
				$Inst=$this->objPrograma->setInstitucion($Inst);
				$Modal=$this->objPrograma->setModalidad($Modal);
			}
			return $this->objPrograma;
		}			
	}
?>