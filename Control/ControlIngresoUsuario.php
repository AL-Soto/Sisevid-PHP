<?php
	class ControlIngresoUsuario
    {
		var $objIngresoUsuario;
		function __construct($objIngresoUsuario)
        {
			$this->objIngresoUsuario=$objIngresoUsuario;
		}
		function validarIngreso(){
			$esValido=false;
			$usuDigitado=$this->objIngresoUsuario->getNomUsuario();
			$conDigitada=$this->objIngresoUsuario->getContrasena();
			$comamdoSql="SELECT * FROM tbl_ingresousuario WHERE NombreUsusario='".$usuDigitado."' AND contrasena='".$conDigitada."'";
			$objControlConexion= new ControlConexion();

			$objControlConexion->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat']);
			$recordSet=$objControlConexion->ejecutarSelect($comamdoSql);
			if($row=$recordSet->fetch_array(MYSQLI_BOTH))
			{
				if($usuDigitado==$row["NombreUsusario"]&& $conDigitada==$row[1] && $usuDigitado!=null && $usuDigitado!="" && $conDigitada!=null && $conDigitada !="")
				{
					$esValido=true;
				}
				else
				{
					$esValido=false;
				}
				return $esValido;
			}
		}
	}
?>