<?php 
session_start();
error_reporting(0);
if($_SESSION['Usu']==  null)header('Location: ../index.php');
include '../Modelo/Profesor.php';
include '../Control/ControlConexion.php';
include '../Control/ControlProfesor.php';
include("../Control/configBd.php");
include '../Vista/Validacion.php';
$cod=$_POST['txtCed'];
$nom=$_POST['txtNombre'];
$Apell=$_POST['txtApell'];
$Estat=$_POST['txtEstat'];
$Inst=$_POST['txtInst'];
$bot=$_POST['btn'];

switch ($bot) {
	case 'Guardar':
		$objProfesor=new Profesor($cod,$nom,$Apell,$Estat,$Inst);
		$objControlProfesor=new ControlProfesor($objProfesor);
		
        $objValido=new Validar();
            $Valido=$objValido->ValidarInt($cod);
            $Valido2=$objValido->ValidarText($nom);
            $Valido3=$objValido->ValidarText($Apell);
            $Valido4=$objValido->ValidarText($Estat);
            $Valido5=$objValido->ValidarVacio($Inst);

            if($Valido && $Valido2 && $Valido3 && $Valido4 && $Valido5){  
                include '../Vista/Mensaje.html';
                $objControlProfesor->guardar();
            }
            else{
                include '../Vista/MensajeError.html';
            }
		break;
		case 'Modificar':
			$objProfesor=new Profesor($cod,$nom,$Apell,$Estat,$Inst);
			$objControlProfesor=new ControlProfesor($objProfesor);
			
            $objValido=new Validar();
            $Valido=$objValido->ValidarInt($cod);
            $Valido2=$objValido->ValidarText($nom);
            $Valido3=$objValido->ValidarText($Apell);
            $Valido4=$objValido->ValidarText($Estat);
            $Valido5=$objValido->ValidarVacio($Inst);

            if($Valido && $Valido2 && $Valido3 && $Valido4 && $Valido5){  
                include '../Vista/Mensaje.html';
                $objControlProfesor->modificar();
            }
            else{
                include '../Vista/MensajeError.html';
            }
			break;	
		case 'Borrar':
			$objProfesor=new Profesor($cod,"","","","");
			$objControlProfesor=new ControlProfesor($objProfesor);
			$objControlProfesor->borrar();
			break;
		case 'Consultar':
			$objProfesor=new Profesor($cod,"","","","");
			$objControlProfesor=new ControlProfesor($objProfesor);
			$objProfesor=$objControlProfesor->consultar();
			$nom=$objProfesor->getNombre();
			$Apell=$objProfesor->getApellido();
			$Estat=$objProfesor->getEstatus();
			$Inst=$objProfesor->getInstitucion();
			break;
		default:
			// code...
		break;
}
echo'
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Sisevid</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="styleform.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    </head>
    <body>
        <div class="IngresoDT">
        <div class="btMenu">
            <a href="Menu.php" style="text-decoration: none;"><span class="material-icons">arrow_back</span></a>
        </div>
            <form action="VsProfesor.php" method="post">
                <h1 style="text-align: center;">Profesor</h1>
                <label for="cedula">Cedula</label>
                <input type="text" name="txtCed" required value="'.$cod.'" placeholder="Ingrese aqui su Identificación"><br/><br/>
                <label for="nombre">Nombre</label>
                <input type="text" name="txtNombre" value="'.$nom.'" placeholder="Ingrese aqui su Nombre"><br/><br/>
                <label for="apellido">Apellido</label>
                <input type="text" name="txtApell" value="'.$Apell.'" placeholder="Ingrese aqui su Apellido"><br/><br/>
                <label for="estatus">Estatus</label>
                <input type="text" name="txtEstat" value="'.$Estat.'" placeholder="Ingrese aqui su Estatus"><br/><br/>
                <label for="institucion">Institución</label>
                <input type="text" name="txtInst" value="'.$Inst.'" placeholder="Ingrese aqui su Institución"><br/><br/>
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