<?php
	class ControlUsuario
    {
		var $objUsuario;
		function __construct($objUsuario)
        {
			$this->objUsuario=$objUsuario;
		}
		function guardar(){
			$Ced=$this->objUsuario->getCedula();
			$Nom1=$this->objUsuario->getNombre1();
			$Nom2=$this->objUsuario->getNombre2();
            $Apell1=$this->objUsuario->getApellido1();
            $Apell2=$this->objUsuario->getApellido2();
            $Contra=$this->objUsuario->getContrasena();
            $TipUsu=$this->objUsuario->getTipoUsuario();
			$correo=$this->objUsuario->getCorreo();
			$comandoSql="INSERT INTO tbl_USUARIO VALUES('".$Ced."','".$Nom1."','".$Nom2."','".$Apell1."','".$Apell2."','".$Contra."','".$TipUsu."','".$correo."')";
			$objControlUsuario=new ControlConexion();
			$objControlUsuario->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat']);
			$objControlUsuario->ejecutarComandoSql($comandoSql);
			$objControlUsuario->cerrarBd();
		}
		function modificar(){
			$Ced=$this->objUsuario->getCedula();
			$Nom1=$this->objUsuario->getNombre1();
			$Nom2=$this->objUsuario->getNombre2();
            $Apell1=$this->objUsuario->getApellido1();
            $Apell2=$this->objUsuario->getApellido2();
            $Contra=$this->objUsuario->getContrasena();
            $TipUsu=$this->objUsuario->getTipoUsuario();
			$correo=$this->objUsuario->getCorreo();
$comandoSql="UPDATE tbl_usuario SET nombre1='".$Nom1."', nombre2='".$Nom2."', apellido1='".$Apell1."', apellido2='".$Apell2."', contrasena='".$Contra."', tipousuario='".$TipUsu."', correo='".$correo."' where cedula='".$Ced."'";
			$objControlUsuario=new ControlConexion();
			$objControlUsuario->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat']);
			$objControlUsuario->ejecutarComandoSql($comandoSql);
			$objControlUsuario->cerrarBd();
		}
		function borrar(){
			$Ced=$this->objUsuario->getCedula();
$comandoSql="delete from tbl_usuario where cedula ='".$Ced."'";
			$objControlUsuario=new ControlConexion();
			$objControlUsuario->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat']);
			$objControlUsuario->ejecutarComandoSql($comandoSql);
			$objControlUsuario->cerrarBd();
		}	
		function consultar(){
			$Nom1="";
			$Nom2="";
			$Apell1="";
			$Apell2="";
			$Contra="";
			$TipUsu="";
			$correo="";
			$Ced=$this->objUsuario->getCedula();
			$comandoSql="select * from tbl_usuario where Cedula='".$Ced."'";
			$objControlConexion=new ControlConexion();
			$objControlConexion->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat']);
			$recordSet=$objControlConexion->ejecutarSelect($comandoSql);
			if($row=$recordSet->fetch_array(MYSQLI_BOTH)){
				$Nom1=$row["Nombre1"];
				$Nom2=$row["Nombre2"];
				$Apell1=$row["Apellido1"];
				$Apell2=$row["Apellido2"];
				$Contra=$row["Contrasena"];
				$TipUsu=$row["TipoUsuario"];
				$correo=$row["CorreoElectronico"];
				$Nom1=$this->objUsuario->setNombre1($Nom1);/*falta...*/
				$Nom2=$this->objUsuario->setNombre2($Nom2);
				$Apell1=$this->objUsuario->setApellido1($Apell1);
				$Apell2=$this->objUsuario->setApellido2($Apell2);
				$Contra=$this->objUsuario->setContrasena($Contra);
				$TipUsu=$this->objUsuario->setTipoUsuario($TipUsu);
				$correo=$this->objUsuario->setCorreo($correo);
			}
			return $this->objUsuario;
		}				
	}
?>