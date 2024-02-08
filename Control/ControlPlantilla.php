<?php
	class Plantilla
    {
		var $obj;
		function __construct($obj)
        {
			$this->obj=$obj;
		}
		function guardar(){
			$=$this->obj->();
			$=$this->obj->();
			$=$this->obj->();
			$comandoSql="INSERT INTO PLANTILLA VALUES('".$."','".$."','".$."')";
			$obj=new ControlConexion();
			$obj->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat']);
			$obj->ejecutarComandoSql($comandoSql);
			$obj->cerrarBd();
		}
		function modificar(){
			$=$this->obj->();
			$=$this->obj->();
			$=$this->obj->();
$comandoSql="UPDATE plantilla SET nombre='".$."', telefono='".$."' where codigo='".$."'";
			$obj=new ControlConexion();
			$obj->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat']);
			$obj->ejecutarComandoSql($comandoSql);
			$obj->cerrarBd();
		}
		function borrar(){
			$=$this->obj->();
$comandoSql="delete from plantilla where codigo ='".$cod."'";
			$obj=new ControlConexion();
			$obj->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat']);
			$obj->ejecutarComandoSql($comandoSql);
			$obj->cerrarBd();
		}
		function consultar(){
			$="";
			$="";
			$="";
			$="";
			
			$=$this->obj->get();
			$comandoSql="select * from tbl_ where I='".$."'";
			$objControlConexion=new ControlConexion();
			$objControlConexion->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat']);
			$recordSet=$objControlConexion->ejecutarSelect($comandoSql);
			if($row=$recordSet->fetch_array(MYSQLI_BOTH)){
				$=$row[""];
				$=$row[""];
				$=$row[""];
				$=$row[""];
				$=$row[""];
				$=$this->obj->set($);
				$=$this->obj->set($);
				$=$this->obj->set($);
				$=$this->obj->set($);
				
			}
			return $this->obj;
		}	
		function listar(){

			$objConexion = new ControlConexion();
			$objConexion->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat']);
			$comandoSql="SELECT * FROM cliente";
			$recordSet=$objConexion->ejecutarSelect($comandoSql);
			$i=0;
			$mat=null;
			while ($registro = $recordSet->fetch_array(MYSQLI_BOTH)){
				
				$mat[$i][0]=  $registro['codigo'];
				$mat[$i][1]=  $registro['nombre'];
				$mat[$i][2]=  $registro['credito'];
				$i=$i+1;
			}		
	
			$objConexion->cerrarBd();
			return $mat;
		}	

	}
?>