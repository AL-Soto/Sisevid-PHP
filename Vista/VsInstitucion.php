<?php 
session_start();
error_reporting(0);
if($_SESSION['Usu']==  null)header('Location: ../index.php');
include '../Modelo/Institucion.php';
include '../Control/ControlConexion.php';
include '../Control/ControlInstitucion.php';
include '../Control/configBd.php';
include '../Vista/Validacion.php';
$cod=$_POST['txtNit'];
$nom=$_POST['txtNombre'];
$Cond=$_POST['txtCond'];
$Estat=$_POST['txtEstat'];
$Pag=1;
$bot=$_POST['btn'];

switch ($bot) {
	case 'Guardar':
		$objInstitucion=new Institucion($cod,$nom,$Cond,$Estat,$Pag);
		$objControlInstitucion=new ControlInstitucion($objInstitucion);
		
        $objValido=new Validar();
        $Valido=$objValido->ValidarInt($cod);
        $Valido2=$objValido->ValidarText($nom);
        $Valido3=$objValido->ValidarVacio($Cond);
        $Valido4=$objValido->ValidarVacio($Estat);

        if($Valido && $Valido2 && $Valido3 && $Valido4 ){  
            include '../Vista/Mensaje.html';
            $objControlInstitucion->guardar();
        }
        else{
            include '../Vista/MensajeError.html';
        }
		break;
	case 'Modificar':
		$objInstitucion=new Institucion($cod,$nom,$Cond,$Estat,$Pag);
		$objControlInstitucion=new ControlInstitucion($objInstitucion);
		
        $objValido=new Validar();
        $Valido=$objValido->ValidarInt($cod);
        $Valido2=$objValido->ValidarText($nom);
        $Valido3=$objValido->ValidarVacio($Cond);
        $Valido4=$objValido->ValidarVacio($Estat);

        if($Valido && $Valido2 && $Valido3 && $Valido4 ){  
            include '../Vista/Mensaje.html';
            $objControlInstitucion->modificar();
        }
        else{
            include '../Vista/MensajeError.html';
        }
		break;	
	case 'Borrar':
		$objInstitucion=new Institucion($cod,"","","","");
		$objControlInstitucion=new ControlInstitucion($objInstitucion);
		$objControlInstitucion->borrar();
		break;
	case 'Consultar':
		$objInstitucion=new Institucion($cod,"","","","");
		$objControlInstitucion=new ControlInstitucion($objInstitucion);
		$objInstitucion=$objControlInstitucion->consultar();
		$nom=$objInstitucion->getNombre();
		$Cond=$objInstitucion->getCondicion();
		$Estat=$objInstitucion->getEstatus();
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
            <form action="VsInstitucion.php" method="post">
                <h1 style="text-align: center;">Institución</h1>
                <label for="nit">Nit</label>
                <input type="text" name="txtNit" id="nit" value="'.$cod.'" required placeholder="Ingrese aqui el Nit">
                <label for="nombre">Nombre</label>
                <input type="text" name="txtNombre" id="nombre" value="'.$nom.'"   placeholder="Ingrese aqui su Nombre">
                <label for="condicion">Condicion</label>
                <input type="text" name="txtCond" id="condicion" value="'.$Cond.'" placeholder="Ingrese aqui la Condicion">
                <label for="estatus">Estatus</label>
                <input type="text" name="txtEstat" id="estatus"  value="'.$Estat.'" placeholder="Ingrese aqui su nivel Estatus">
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