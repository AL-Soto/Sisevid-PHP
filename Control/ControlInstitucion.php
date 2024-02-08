<?php
	class ControlInstitucion
    {
		var $objInstitucion;
		function __construct($objInstitucion)
        {
			$this->objInstitucion=$objInstitucion;
		}
		function guardar(){
			$Nit=$this->objInstitucion->getNit();
			$Nom=$this->objInstitucion->getNombre();
			$Cond=$this->objInstitucion->getCondicion();
            $Estat=$this->objInstitucion->getEstatus();
			$Pag=1;
			$comandoSql="INSERT INTO tbl_institucion VALUES('".$Nit."','".$Nom."','".$Cond."','".$Estat."','".$Pag."')";
			$objControlInstitucion=new ControlConexion();
			$objControlInstitucion->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat']);
			$objControlInstitucion->ejecutarComandoSql($comandoSql);
			$objControlInstitucion->cerrarBd();
		}
		function modificar(){
			$Nit=$this->objInstitucion->getNit();
			$Nom=$this->objInstitucion->getNombre();
			$Cond=$this->objInstitucion->getCondicion();
            $Estat=$this->objInstitucion->getEstatus();
			$pag=$this->objInstitucion->getPagina();
			$Pag=1;
			$comandoSql="UPDATE tbl_institucion SET Nombre='".$Nom."', Condicion='".$Cond."', Estatus='".$Estat."', Pagina='".$Pag."' where Nit='".$Nit."'";
			$objControlInstitucion=new ControlConexion();
			$objControlInstitucion->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat']);
			$objControlInstitucion->ejecutarComandoSql($comandoSql);
			$objControlInstitucion->cerrarBd();
		}
		function borrar(){
			$Nit=$this->objInstitucion->getNit();
$comandoSql="delete from tbl_institucion where Nit ='".$Nit."'";
			$objControlInstitucion=new ControlConexion();
			$objControlInstitucion->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat']);
			$objControlInstitucion->ejecutarComandoSql($comandoSql);
			$objControlInstitucion->cerrarBd();
		}	
		function consultar(){
			$Nom="";
			$Cond="";
			$Estat="";
			$Nit=$this->objInstitucion->getNit();
			$comandoSql="select * from tbl_institucion where Nit='".$Nit."'";
			$objControlConexion=new ControlConexion();
			$objControlConexion->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat']);
			$recordSet=$objControlConexion->ejecutarSelect($comandoSql);
			if($row=$recordSet->fetch_array(MYSQLI_BOTH)){
				$Nom=$row["Nombre"];
				$Cond=$row["Condicion"];
				$Estat=$row["Estatus"];
				$Nom=$this->objInstitucion->setNombre($Nom);
				$Cond=$this->objInstitucion->setCondicion($Cond);
				$Estat=$this->objInstitucion->setEstatus($Estat);
			}
			return $this->objInstitucion;
		}				
	}
?>