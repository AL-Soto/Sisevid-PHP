<?php
error_reporting(0);
session_start();
if($_SESSION['Usu']==  null)header('Location: ../index.php');
include '../Modelo/Evidencia.php';
include '../Control/ControlConexion.php';
include '../Control/ControlEvidencia.php';
include '../Control/configBd.php';
include '../Vista/Validacion.php';
$cod=$_POST['txtCodigo'];
$cond=$_POST['txtCond'];
$art=$_POST['txtArti'];
$lit=$_POST['txtLiteral'];
$nume=$_POST['txtNume'];
$Prog=$_POST['txtProg'];
$titEvi=$_POST['txtTitEvi'];
$fechaC=$_POST['txtFechaCrea'];
$nomAut=$_POST['txtNomAut'];
$apell=$_POST['txtApellAut'];
$tipEvi=$_POST['txtTipEvid'];
$evid=$_FILES['Archivo']['name'];
$bot=$_POST['btn'];
$nomM==0;
$nomM1=MostrarCondicion($cond);
$nomM2=MostrarArticulo($art);
$nomM3=MostrarLiteral($lit);
$nomM4=MostrarNumeral($nume);
$nomM5=MostrarPrograma($prog);
$nomM6=MostrarTipo($tipEvi);

// print_r($_FILES);
$nombre=$_FILES['Archivo']['name'];
$guardado=$_FILES['Archivo']['tmp_name'];
if(!file_exists('Archivo'))
{
    mkdir('Archivo',0777,true);
    if(file_exists('Archivo')){
        if(move_uploaded_file($guardado, 'Archivo/'.$nombre)){
            echo 'Archivo guardado';
        }
        else{
            // echo'Archivo no guardado';
        }
    }
    
}
else{
    if(move_uploaded_file($guardado, 'Archivo/'.$nombre)){
        echo 'Archivo guardado';
    }
    else{
        // echo'Archivo no guardado';
    }
}
 $bytesArchivo = file_get_contents('Archivo/'.$nombre);
// $evid= file_get_contents('Archivo/'.$nombre);
$RT='signal.png';
$RG='..\Vista\Archivo/';
$Foto=$RG.$evid;
// echo $Foto;

function MostrarCondicion($id)
{
    
        $objConexion = new ControlConexion();
        $objConexion->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat']);
        $comandoSql ='SELECT * FROM tbl_condicion where idCondicion="'.$id.'" ';
        $recordSet=$objConexion->ejecutarSelect($comandoSql);
        $dp = $recordSet->fetch_array(MYSQLI_NUM);
        return ($dp[1]);
}

function MostrarArticulo($id)
{
    
        $objConexion = new ControlConexion();
        $objConexion->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat']);
        $comandoSql ='SELECT * FROM tbl_tipocondicionarticulo where id="'.$id.'" ';
        $recordSet=$objConexion->ejecutarSelect($comandoSql);
        $dp = $recordSet->fetch_array(MYSQLI_NUM);
        return ($dp[1]);
}

function MostrarLiteral($id)
{
    
        $objConexion = new ControlConexion();
        $objConexion->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat']);
        $comandoSql ='SELECT * FROM tbl_tipocondicion3literal where id="'.$id.'" ';
        $recordSet=$objConexion->ejecutarSelect($comandoSql);
        $dp = $recordSet->fetch_array(MYSQLI_NUM);
        return ($dp[1]);
}

function Mostrarnumeral($id)
{
    
        $objConexion = new ControlConexion();
        $objConexion->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat']);
        $comandoSql ='SELECT * FROM tbl_tipocondicionnumeral where id="'.$id.'" ';
        $recordSet=$objConexion->ejecutarSelect($comandoSql);
        $dp = $recordSet->fetch_array(MYSQLI_NUM);
        return ($dp[1]);
}

function MostrarPrograma($id)
{
    
        $objConexion = new ControlConexion();
        $objConexion->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat']);
        $comandoSql ='SELECT * FROM tbl_programa where id="'.$id.'" ';
        $recordSet=$objConexion->ejecutarSelect($comandoSql);
        $dp = $recordSet->fetch_array(MYSQLI_NUM);
        return ($dp[1]);
        echo $dp[1];
}

function MostrarTipo($id)
{
    
        $objConexion = new ControlConexion();
        $objConexion->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat']);
        $comandoSql ='SELECT * FROM tbl_tipoevidencia where id="'.$id.'" ';
        $recordSet=$objConexion->ejecutarSelect($comandoSql);
        $dp = $recordSet->fetch_array(MYSQLI_NUM);
        return ($dp[1]);
}



switch ($bot) {
	    case 'Guardar':
            $objEvidencia=new Evidencia($cod,$cond,$art,$lit,$nume,$Prog,$titEvi,$fechaC,$nomAut,$apell,$tipEvi,$evid);
            $objControlEvidencia=new ControlEvidencia($objEvidencia);
            
            $objValido=new Validar();
            $Valido=$objValido->ValidarInt($cod);
            $Valido2=$objValido->ValidarVacio($cond);
            $Valido3=$objValido->ValidarVacio($art);
            $Valido4=$objValido->ValidarVacio($lit);
            $Valido5=$objValido->ValidarVacio($nume);
            $Valido6=$objValido->ValidarVacio($prog);
            $Valido7=$objValido->ValidarText($titEvi);
            $Valido9=$objValido->ValidarText($nomAut);
            $Valido10=$objValido->ValidarText($apell);
            $Valido11=$objValido->ValidarVacio($tipEvi);

            if($Valido && $Valido2 && $Valido3 && $Valido4 && $Valido5 && $Valido6 && $Valido7 && $Valido9 && $Valido10 && $Valido11){  
                include '../Vista/Mensaje.html';
                $objControlEvidencia->guardar();
            }
            else{
                include '../Vista/MensajeError.html';
            }
		    break;
		case 'Modificar':
			$objEvidencia=new Evidencia($cod,$cond,$art,$lit,$nume,$Prog,$titEvi,$fechaC,$nomAut,$apell,$tipEvi,$evid);
			$objControlEvidencia=new ControlEvidencia($objEvidencia);
            $objValido=new Validar();
            $Valido=$objValido->ValidarInt($cod);
            $Valido2=$objValido->ValidarVacio($cond);
            $Valido3=$objValido->ValidarVacio($art);
            $Valido4=$objValido->ValidarVacio($lit);
            $Valido5=$objValido->ValidarVacio($nume);
            $Valido6=$objValido->ValidarVacio($prog);
            $Valido7=$objValido->ValidarText($titEvi);
            $Valido9=$objValido->ValidarText($nomAut);
            $Valido10=$objValido->ValidarText($apell);
            $Valido11=$objValido->ValidarVacio($tipEvi);

            if($Valido && $Valido2 && $Valido3 && $Valido4 && $Valido5 && $Valido6 && $Valido7 && $Valido9 && $Valido10 && $Valido11){  
                include '../Vista/Mensaje.html';
                $objControlEvidencia->modificar();
            }
            else{
                include '../Vista/MensajeError.html';
            }
			break;	
		case 'Borrar':
			$objEvidencia=new Evidencia($cod,'','','','','','','','','','','');
			$objControlEvidencia=new ControlEvidencia($objEvidencia);
			$objControlEvidencia->borrar();
			break;
		case 'Consultar':
			$objEvidencia=new Evidencia($cod,'','','','','','','','','','','');
			$objControlEvidencia=new ControlEvidencia($objEvidencia);
			$objEvidencia=$objControlEvidencia->consultar();
            $cond=$objEvidencia->getCondicion();
            $nomM1=MostrarCondicion($cond);
            $art=$objEvidencia->getArticulo();
            $nomM2=MostrarArticulo($art);
            $lit=$objEvidencia->getLiteral();
            $nomM3=MostrarLiteral($lit);
            $nume=$objEvidencia->getNumeral();
            $nomM4=MostrarNumeral($nume);
            $Prog=$objEvidencia->getPrograma();
            $nomM5=MostrarPrograma($Prog);
            $titEvi=$objEvidencia->getTituloEvidencia();
            $fechaC=$objEvidencia->getFechaCreacion();
            // $nomM7=MostrarFecha($cod);
            // echo $nomM7;
			$nomAut=$objEvidencia->getNombreAutor();
			$apell=$objEvidencia->getApellidoAutor();
            $tipEvi=$objEvidencia->getTipoEvidencia();
            $nomM6=MostrarTipo($tipEvi);
            $evid=$objEvidencia->getEvidencia();

            $RG='..\Vista\Archivo/';
            $Foto=$RG.$evid;
            // echo $Foto;
			break;
		default:
			// code...
			break;
}
echo"
<!DOCTYPE html>
<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Sisevid</title>
    <link rel='stylesheet' href='styleform.css'>
    <script src='script.js'></script>
    <link rel='stylesheet' href='https://fonts.googleapis.com/icon?family=Material+Icons'>
</head>
<body>
    <div class='IngresoDT'>
        <div class='btMenu'>
                <a href='Menu.php' style='text-decoration: none;'><span class='material-icons'>arrow_back</span></a>
        </div>
        <form action='VsEvidencia.php' method='post' enctype='multipart/form-data'>
            <h1 style='text-align: center;'>Evidencia</h1>
                <label for=''>Codigo</label>
                <input type='text' name='txtCodigo' id='' value='".$cod."' placeholder='Ingrese aqui '>

                <!--select Condicion-->
                <div>  
                <label for='condicion'>Condicion</label>
                    <select name='txtCond' id='txtDE' onchange='this.form.submit()'>
                        <option value='".$cond."'>$nomM1</option>";
                            $objConexion = new ControlConexion();
                            $objConexion->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat']);
                            $comandoSql ='SELECT * FROM tbl_condicion ';
                            $recordSet=$objConexion->ejecutarSelect($comandoSql);
                            if($nomM==0)
                            {
                                while ($dp = $recordSet->fetch_array(MYSQLI_NUM))
                                {
                                    echo " <option value= ".$dp[0]."> ".$dp[1]."</option>";
                                
                                }      
                                $nomM=1;
                            }
       
                    echo"</select >
                </div><br/>";

        echo"

        <!--select Articulo-->
        <div>  
        <label for='condicion'>Artículo</label>
            <select name='txtArti' id='txtDE' onchange='this.form.submit()'>
                <option value='".$art."'>$nomM2</option>";
                    $objConexion = new ControlConexion();
                    $objConexion->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat']);
                    $comandoSql ='SELECT * FROM tbl_tipocondicionarticulo where condicion = "'.$cond.'" ';
                    $recordSet=$objConexion->ejecutarSelect($comandoSql);
                    
                        while ($ar= $recordSet->fetch_array(MYSQLI_NUM))
                        {
                            echo " <option value= ".$ar[0]."> ".$ar[1]."</option>";
                        
                        }      
                       
                    

            echo"</select >
        </div><br/>";

echo"


<!--select literal-->
<div>  
<label for='condicion'>Literal</label>
    <select name='txtLiteral' id='txtDE' onchange='this.form.submit()'>
        <option value='".$lit."'>$nomM3</option>";
            $objConexion = new ControlConexion();
            $objConexion->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat']);
            $comandoSql ='SELECT * FROM tbl_tipocondicion3literal where NombreArticulo = "'.$art.'" ';
            $recordSet=$objConexion->ejecutarSelect($comandoSql);
            
                while ($lt= $recordSet->fetch_array(MYSQLI_NUM))
                {
                    echo " <option value= ".$lt[0]."> ".$lt[1]."</option>";
                
                }      
               



    echo"</select >
</div><br/>";

echo"
                <!--select numeral-->
                <div>  
                <label for='condicion'>Numeral</label>
                    <select name='txtNume' id='txtDE'>
                        <option value='".$nume."'>$nomM4</option>";
                            $objConexion = new ControlConexion();
                            $objConexion->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat']);
                            $comandoSql ='SELECT * FROM tbl_tipocondicionnumeral where Literal = "'.$lit.'" ';
                            $recordSet=$objConexion->ejecutarSelect($comandoSql);
                            
                                while ($nu= $recordSet->fetch_array(MYSQLI_NUM))
                                {
                                    echo " <option value= ".$nu[0]."> ".$nu[1]."</option>";
                                
                                }      

                            
                
                    echo"</select >
                </div><br/>";
                
                echo"
                
                <!--select Programa-->
                <div>  
                <label for='condicion'>Programa</label>
                    <select name='txtProg' id='txtDE'>
                        <option value='".$Prog."'>$nomM5</option>";
                            $objConexion = new ControlConexion();
                            $objConexion->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat']);
                            $comandoSql ='SELECT * FROM tbl_programa ';
                            $recordSet=$objConexion->ejecutarSelect($comandoSql);
                            
                                while ($pr= $recordSet->fetch_array(MYSQLI_NUM))
                                {
                                    echo " <option value= ".$pr[0]."> ".$pr[1]."</option>";
                                
                                }      
                               
                            
                
                    echo"</select >
                </div><br/>";
                
                echo"
                <label for=''>Titulo de evidencia</label>
                <input type='text' name='txtTitEvi' id='' value='".$titEvi."' placeholder='Ingrese aqui '>
                <label for=''>Fecha de creacion</label>
                <input type='date' name='txtFechaCrea' id='' value='".$fechaC."' placeholder='Ingrese aqui '> 
                <label for=''>Nombre Autor</label>
                <input type='text' name='txtNomAut' id='' value='".$nomAut."' placeholder='Ingrese aqui '>
                <label for=''>Apellido Autor</label>
                <input type='text' name='txtApellAut' id='' value='".$apell."' placeholder='Ingrese aqui '>

                <!--select TipoEvidencia-->
                <div>  
                <label for='Tipo'>Tipo de evidencia</label>
                    <select name='txtTipEvid' id='txtDE'>
                        <option value='".$tipEvi."'>$nomM6</option>";
                            $objConexion = new ControlConexion();
                            $objConexion->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat']);
                            $comandoSql ='SELECT * FROM tbl_tipoevidencia ';
                            $recordSet=$objConexion->ejecutarSelect($comandoSql);
                            
                                while ($te= $recordSet->fetch_array(MYSQLI_NUM))
                                {
                                    echo " <option value= ".$te[0]."> ".$te[1]."</option>";
                                
                                }      
                               
                            
                
                    echo"</select >
                </div><br/>";
                
                echo"
                    <label>Ingresar Evidencia</label>
                    <input type='file' name='Archivo' value'".$evid."' />


                <div id='Evid'>
                <a href='".$Foto."' target='_blank'><img src='".$Foto."' alt='' style='width:80px;'></a>
                
                </div>

        
            <div class='Btn'>
                <input type='submit' value='Guardar' name='btn'/>
                <input type='submit' value='Consultar' name='btn' />
                <input type='submit' value='Modificar' name='btn'/>
                <input type='submit' value='Borrar' name='btn'/>
            </div>
        </form>
    </div>
    
</body>
</html>

";

?>