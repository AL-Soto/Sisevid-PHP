<?php
session_start();
error_reporting(0);
if($_SESSION['Usu']==  null)header('Location: ../index.php'); 
include '../Modelo/Cursos.php';
include '../Control/ControlConexion.php';
include '../Control/ControlCursos.php';
include("../Control/configBd.php");
include '../Vista/Validacion.php';
$cod=$_POST['txtCodigo'];
$nom=$_POST['txtNombre'];
$Cred=$_POST['txtCreditos'];
$Prog=$_POST['txtPrograma'];
$bot=$_POST['btn'];
switch ($bot) {
	case 'Guardar':
		$objCursos=new Cursos($cod,$nom,$Cred,$Prog);
		$objControlCursos=new ControlCursos($objCursos);
        $objValido=new Validar();
        $Valido=$objValido->ValidarInt($cod);
        $Valido2=$objValido->ValidarText($nom);
        $Valido3=$objValido->ValidarInt($Cred);
        $Valido4=$objValido->ValidarVacio($Prog);
        if($Valido && $Valido2 && $Valido3 && $Valido4 ){  
            include '../Vista/Mensaje.html';
            $objControlCursos->guardar();
        }
        else{
            include '../Vista/MensajeError.html';
        }
		
		break;
		case 'Modificar':
			$objCursos=new Cursos($cod,$nom,$Cred,$Prog);
			$objControlCursos=new ControlCursos($objCursos);
			
            $objValido=new Validar();
            $Valido=$objValido->ValidarInt($cod);
            $Valido2=$objValido->ValidarText($nom);
            $Valido3=$objValido->ValidarInt($Cred);
            $Valido4=$objValido->ValidarVacio($Prog);
            if($Valido && $Valido2 && $Valido3 && $Valido4 ){  
                include '../Vista/Mensaje.html';
                $objControlCursos->modificar();
            }
            else{
                include '../Vista/MensajeError.html';
            }
			break;	
		case 'Borrar':
			$objCursos=new Cursos($cod,"","","");
			$objControlCursos=new ControlCursos($objCursos);
			$objControlCursos->borrar();
			break;
		case 'Consultar':
			$objCursos=new Cursos($cod,"","","");
			$objControlCursos=new ControlCursos($objCursos);
			$objCursos=$objControlCursos->consultar();
			$nom=$objCursos->getNombre();
			$Cred=$objCursos->getCreditos();
			$Prog=$objCursos->getPrograma();
			break;
		default:
			// code...
			break;
}
echo'
<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sisevid</title>
    <link rel="stylesheet" href="styleform.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</head>
<body>
    <div class="IngresoDT">
    <div class="btMenu">
            <a href="Menu.php" style="text-decoration: none;"><span class="material-icons">arrow_back</span></a>
    </div>
        <form action="VsCursos.php" method="post">
            <h1 style="text-align: center;">Cursos</h1>
                <label for="">Codigo</label>
                <input type="text" name="txtCodigo" id="" value="'.$cod.'" placeholder="Ingrese aqui el codigo del curso">
                <label for="">Nombre</label>
                <input type="text" name="txtNombre" id="" value="'.$nom.'" placeholder="Ingrese aqui el nombre del curso">
                <label for="">Creditos</label>
                <input type="text" name="txtCreditos" id="" value="'.$Cred.'" placeholder="Ingrese aqui el numero de creditos">
                <label for="">Programa</label>
                <input type="text" name="txtPrograma" id="" value="'.$Prog.'" placeholder="Ingrese aqui el programa del curso">
            <div class="Btn">
                <input type="submit" value="Guardar" name="btn"/>
                <input type="submit" value="Consultar" name="btn"/>
                <input type="submit" value="Modificar" name="btn"/>
                <input type="submit" value="Borrar" name="btn"/>
            </div>
        </form>
    </div>
    
</body>
</html>
';
?>