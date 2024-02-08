<?php
	class ControlCursos
    {
		var $objCursos;
		function __construct($objCursos)
        {
			$this->objCursos=$objCursos;
		}
		function guardar(){
			$cod=$this->objCursos->getCodigo();
			$nom=$this->objCursos->getNombre();
			$cred=$this->objCursos->getCreditos();
            $prog=$this->objCursos->getPrograma();
			$comandoSql="INSERT INTO tbl_cursos VALUES('".$cod."','".$nom."','".$cred."','".$prog."')";
			$objControlCursos=new ControlConexion();
			$objControlCursos->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat']);
			$objControlCursos->ejecutarComandoSql($comandoSql);
			$objControlCursos->cerrarBd();
		}
		function modificar(){
            $cod=$this->objCursos->getCodigo();
			$nom=$this->objCursos->getNombre();
			$cred=$this->objCursos->getCreditos();
            $prog=$this->objCursos->getPrograma();
$comandoSql="UPDATE tbl_cursos SET Nombre='".$nom."', Creditos='".$cred."', programa='".$prog."' where Codigo='".$cod."'";
			$objControlCursos=new ControlConexion();
			$objControlCursos->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat']);
			$objControlCursos->ejecutarComandoSql($comandoSql);
			$objControlCursos->cerrarBd();
		}
		function borrar(){
			$cod=$this->objCursos->getCodigo();
$comandoSql="delete from tbl_cursos where Codigo ='".$cod."'";
			$objControlCursos=new ControlConexion();
			$objControlCursos->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat']);
			$objControlCursos->ejecutarComandoSql($comandoSql);
			$objControlCursos->cerrarBd();
		}
		function consultar(){
			$nom="";
			$cred="";
			$prog="";
			$cod=$this->objCursos->getCodigo();
			$comandoSql="select * from tbl_cursos where Codigo='".$cod."'";
			$objControlConexion=new ControlConexion();
			$objControlConexion->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat']);
			$recordSet=$objControlConexion->ejecutarSelect($comandoSql);
			if($row=$recordSet->fetch_array(MYSQLI_BOTH)){
				$nom=$row["Nombre"];
				$cred=$row["Creditos"];
				$prog=$row["programa"];
				$nom=$this->objCursos->setNombre($nom);
				$cred=$this->objCursos->setCreditos($cred);
				$prog=$this->objCursos->setPrograma($prog);
			}
			return $this->objCursos;
		}						
	}
?>