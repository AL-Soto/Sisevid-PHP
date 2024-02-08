<?php
	class ControlEvidencia
    {
		var $objEvidencia;
		function __construct($objEvidencia)
        {
			$this->objEvidencia=$objEvidencia;
		}
		function guardar(){
			$cod=$this->objEvidencia->getCodigo();
			$cond=$this->objEvidencia->getCondicion();
			$art=$this->objEvidencia->getArticulo();
            $lit=$this->objEvidencia->getLiteral();
            $num=$this->objEvidencia->getNumeral();
            $prog=$this->objEvidencia->getPrograma();
            $titEvid=$this->objEvidencia->getTituloEvidencia();
            $fecCrea=$this->objEvidencia->getFechaCreacion();
            $nomAutor=$this->objEvidencia->getNombreAutor();
            $apeAutor=$this->objEvidencia->getApellidoAutor();
            $tipEvi=$this->objEvidencia->getTipoEvidencia();
            $evi=$this->objEvidencia->getEvidencia();

			$comandoSql="INSERT INTO tbl_Evidencia VALUES('".$cod."','".$cond."','".$art."','".$lit."','".$num."','".$prog."','".$titEvid."','".$fecCrea."','".$nomAutor."','".$apeAutor."','".$tipEvi."','".$evi."')";
			$obj=new ControlConexion();
			$obj->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat']);
			$obj->ejecutarComandoSql($comandoSql);
			$obj->cerrarBd();
		}
		function modificar(){
			$cod=$this->objEvidencia->getCodigo();
			$cond=$this->objEvidencia->getCondicion();
			$art=$this->objEvidencia->getArticulo();
            $lit=$this->objEvidencia->getLiteral();
            $num=$this->objEvidencia->getNumeral();
            $prog=$this->objEvidencia->getPrograma();
            $titEvid=$this->objEvidencia->getTituloEvidencia();
            $fecCrea=$this->objEvidencia->getFechaCreacion();
            $nomAutor=$this->objEvidencia->getNombreAutor();
            $apeAutor=$this->objEvidencia->getApellidoAutor();
            $tipEvi=$this->objEvidencia->getTipoEvidencia();
            $evi=$this->objEvidencia->getEvidencia();
$comandoSql="UPDATE tbl_Evidencia SET Condicion='".$cond."', Articulo='".$art."', Literal='".$lit."', Numeral='".$num."', Programa='".$prog."', TituloEvidencia='".$titEvid."', FechaCreacion='".$fecCrea."', NombreAutor='".$nomAutor."', ApellidoAutor='".$apeAutor."', TipoEvidencia='".$tipEvi."', Evidencia='".$evi."' where codigo='".$cod."'";
			$obj=new ControlConexion();
			$obj->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat']);
			$obj->ejecutarComandoSql($comandoSql);
			$obj->cerrarBd();
		}
		function borrar(){
			$cod=$this->objEvidencia->getCodigo();
$comandoSql="delete from tbl_evidencia where codigo ='".$cod."'";
			$obj=new ControlConexion();
			$obj->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat']);
			$obj->ejecutarComandoSql($comandoSql);
			$obj->cerrarBd();
		}
		function consultar(){
			$cond="";
			$art="";
			$lit="";
			$num="";
            $prog="";
			$titEvid="";
			$fecCrea="";
			$nomAutor="";
			$apeAutor="";
			$titEvid="";
			$evi="";
			
			$cod=$this->objEvidencia->getCodigo();
			$comandoSql="select * from tbl_Evidencia where codigo='".$cod."'";
			$objControlConexion=new ControlConexion();
			$objControlConexion->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat']);
			$recordSet=$objControlConexion->ejecutarSelect($comandoSql);
			if($row=$recordSet->fetch_array(MYSQLI_BOTH)){
				$cond=$row["Condicion"];
				$art=$row["Articulo"];
				$lit=$row["Literal"];
				$num=$row["Numeral"];
				$prog=$row["Programa"];
                $titEvid=$row["TituloEvidencia"];
				$fecCrea=$row["FechaCreacion"];
				$nomAutor=$row["NombreAutor"];
				$apeAutor=$row["ApellidoAutor"];
				$tipEvi=$row["TipoEvidencia"];
                $evi=$row["Evidencia"];
				$cond=$this->objEvidencia->setCondicion($cond);
                $art=$this->objEvidencia->setArticulo($art);
                $lit=$this->objEvidencia->setLiteral($lit);
                $num=$this->objEvidencia->setNumeral($num);
                $prog=$this->objEvidencia->setPrograma($prog);
                $titEvid=$this->objEvidencia->setTituloEvidencia($titEvid);
                $fecCrea=$this->objEvidencia->setFechaCreacion($fecCrea);
                $nomAutor=$this->objEvidencia->setNombreAutor($nomAutor);
                $apeAutor=$this->objEvidencia->setApellidoAutor($apeAutor);
                $tipEvi=$this->objEvidencia->setTipoEvidencia($tipEvi);
                $evi=$this->objEvidencia->setEvidencia($evi);
				
			}
			return $this->objEvidencia;
		}	

	}
?>