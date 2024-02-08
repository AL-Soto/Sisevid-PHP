<?php 

error_reporting(0);
session_start();
if($_SESSION['Usu']==  null)header('Location: ../index.php');
include '../Modelo/Sedes.php';
include '../Control/ControlConexion.php';
include '../Control/ControlSedes.php';
include '../Control/configBd.php';
include '../Vista/Validacion.php';
$cod=$_POST['txtId'];
$nom=$_POST['txtNombre'];
$nit=$_POST['txtNit'];
$tel=$_POST['txtTel'];
$direc=$_POST['txtDirec'];
$dep=$_POST['txtDep'];
$city=$_POST['txtCity'];
$nomM2=Mostrarcity($city);
$tipoLugar=$_POST['txtTipo'];
$nomM3=Mostrartipo($tipoLugar);
$lugar=$_POST['txtLugar'];
$nomM=0;
$nomM1=Mostrardep($dep);
$bot=$_POST['btn'];


switch ($bot) {
	case 'Guardar':
		$objSedes=new Sedes($cod,$nom,$nit,$tel,$direc,$dep,$city,$tipoLugar,$lugar);
		$objControlSedes=new ControlSedes($objSedes);
		
        $objValido=new Validar();
        $Valido=$objValido->ValidarInt($cod);
        $Valido2=$objValido->ValidarText($nom);
        $Valido3=$objValido->ValidarInt($nit);
        $Valido4=$objValido->ValidarInt($tel);
        $Valido5=$objValido->ValidarText($direc);
        $Valido6=$objValido->ValidarVacio($dep);
        $Valido7=$objValido->ValidarVacio($city);
        $Valido8=$objValido->ValidarVacio($tipoLugar);
        $Valido9=$objValido->ValidarText($lugar);

        if($Valido && $Valido2 && $Valido3 && $Valido4 && $Valido5 && $Valido6 && $Valido7 && $Valido8 && $Valido9){  
            include '../Vista/Mensaje.html';
            $objControlSedes->guardar();
        }
        else{
            include '../Vista/MensajeError.html';
        }
		break;
		case 'Modificar':
			$objSedes=new Sedes($cod,$nom,$nit,$tel,$direc,$dep,$city,$tipoLugar,$lugar);
			$objControlSedes=new ControlSedes($objSedes);
			
            $objValido=new Validar();
            $Valido=$objValido->ValidarInt($cod);
            $Valido2=$objValido->ValidarText($nom);
            $Valido3=$objValido->ValidarInt($nit);
            $Valido4=$objValido->ValidarInt($tel);
            $Valido5=$objValido->ValidarText($direc);
            $Valido6=$objValido->ValidarVacio($dep);
            $Valido7=$objValido->ValidarVacio($city);
            $Valido8=$objValido->ValidarVacio($tipoLugar);
            $Valido9=$objValido->ValidarText($lugar);

            if($Valido && $Valido2 && $Valido3 && $Valido4 && $Valido5 && $Valido6 && $Valido7 && $Valido8 && $Valido9){  
                include '../Vista/Mensaje.html';
                $objControlSedes->modificar();
            }
            else{
                include '../Vista/MensajeError.html';
            }
			break;	
		case 'Borrar':
			$objSedes=new Sedes($cod,'','','','','','','','');
			$objControlSedes=new ControlSedes($objSedes);
			$objControlSedes->borrar();
			break;
		case 'Consultar':
			$objSedes=new Sedes($cod,'','','','','','','','');
			$objControlSedes=new ControlSedes($objSedes);
			$objSedes=$objControlSedes->consultar();
			$nom=$objSedes->getNombre();
			$nit=$objSedes->getNit();
			$tel=$objSedes->getTelefono();
			$direc=$objSedes->getDireccion();
			$dep=$objSedes->getDepartamento();
            $nomM1=Mostrardep($dep);
            $city=$objSedes->getCiudad();
            $nomM2=mostrarcity($city);
            $tipoLugar=$objSedes->getTipoLugar();
            $nomM3=Mostrartipo($tipoLugar);
            $lugar=$objSedes->getLugar();
			break;
		default:
			// code...
			break;
}
function Mostrartipo($id)
{
    
        $objConexion = new ControlConexion();
        $objConexion->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat']);
        $comandoSql ='SELECT * FROM tbl_tipolugar where codigo="'.$id.'" ';
        $recordSet=$objConexion->ejecutarSelect($comandoSql);
        $dp = $recordSet->fetch_array(MYSQLI_NUM);
        return ($dp[1]);
}

function mostrarcity($id)
{
    if ($id!=0)

    {
        $objConexion = new ControlConexion();
        $objConexion->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat']);
        $comandoSql ='SELECT * FROM municipios  where id="'.$id.'" ';
        $recordSet=$objConexion->ejecutarSelect($comandoSql);
        $dp = $recordSet->fetch_array(MYSQLI_NUM);
        return ($dp[3]);
    }
}
function mostrardep($id)
{
    if ($id!=0)

    {
        $objConexion = new ControlConexion();
        $objConexion->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat']);
        $comandoSql ='SELECT * FROM departamentos  where id="'.$id.'" ';
        $recordSet=$objConexion->ejecutarSelect($comandoSql);
        $dp = $recordSet->fetch_array(MYSQLI_NUM);
        return ($dp[1]);
    }
}

echo"
<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Sisevid</title>
    <link rel='stylesheet' href='styleform.css'>
    <link rel='stylesheet' href='https://fonts.googleapis.com/icon?family=Material+Icons'>
</head>
<body>
    <div class='IngresoDT'>
        <div class='btMenu'>
            <a href='Menu.php' style='text-decoration: none;'><span class='material-icons'>arrow_back</span></a>
        </div>
        <form action='VsSedes.php' method='post'>
            <h1 style='text-align: center;'>Sedes</h1>
                <label for=''>Id</label>
                <input type='text' name='txtId' id=''value='".$cod."' placeholder='Ingrese aqui el id de la sede'>
                <label for=''>Nombre</label>
                <input type='text' name='txtNombre' id='' value='".$nom."' placeholder='Ingrese aqui Nombre de la sede'>
                <label for=''>Nit</label>
                <input type='text' name='txtNit' id='' value='".$nit."' placeholder='Ingrese aqui Nit'>
                <label for=''>Telefono</label>
                <input type='text' name='txtTel' id='' value='".$tel."' placeholder='Ingrese aqui Telefono'>
                <label for=''>Direccion</label>
                <input type='text' name='txtDirec' id='' value='".$direc."' placeholder='Ingrese aqui Direccion'>

   
                <div>  
                <label for='condicion'>Departamento</label>
                    <select name='txtDep' id='txtDE' onchange='this.form.submit()'>
                        <option value='".$dep."'>$nomM1</option>";
                            $objConexion = new ControlConexion();
                            $objConexion->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat']);
                            $comandoSql ='SELECT * FROM departamentos ';
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

                <div>
                
                <label>Ciudad</label>
                <select name='txtCity'>
                        <option value='".$city."'>$nomM2</option>";
                            $objConexion = new ControlConexion();
                            $objConexion->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat']);
                            $comandoSql ='SELECT id, nombre FROM municipios where departamento_id="'.$dep.'"';
                            $recordSet=$objConexion->ejecutarSelect($comandoSql);
                            
                            while ($cit = $recordSet->fetch_array(MYSQLI_BOTH))
                            {
                                echo " <option value= ".$cit["id"]." > ".$cit["nombre"]."</option>";
                            }
                    echo"</select>
                </div>";

            echo "
                    <div>
                    <label>Tipo</label>
                    <select name='txtTipo'>
                        <div class='option'>
                            <option value='".$tipoLugar."'>$nomM3</option>";
                                $objConexion = new ControlConexion();
                                $objConexion->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat']);
                                $comandoSql ='SELECT * FROM tbl_tipolugar ';
                                $recordSet=$objConexion->ejecutarSelect($comandoSql);
                                
                                while ($tip= $recordSet->fetch_array(MYSQLI_BOTH))
                                {
                                    echo " <option value= ".$tip["Codigo"]." > ".$tip["Nombre"]."</option>";
                                }";
                        </div>
                    </select>
                    </div>";
                    echo"
                    <label>Lugaryyyy</label>
                    <input type='text' name='txtLugar' id='' value='".$lugar."' placeholder='Ingrese aqui Lugar'>

                <div class='Btn'>
                <input type='submit' value='Guardar' name='btn'/>
                <input type='submit' value='Consultar' name='btn'/>
                <input type='submit' value='Modificar' name='btn'/>
                <input type='submit' value='Borrar' name='btn'/>
            </div>
        </form>
    </div>";
echo"    
</body>
</html>
";
?>