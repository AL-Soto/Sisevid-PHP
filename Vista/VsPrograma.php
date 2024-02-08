<?php 
session_start();
error_reporting(0);
if($_SESSION['Usu']==  null)header('Location: ../index.php');
include '../Modelo/Programa.php';
include '../Control/ControlConexion.php';
include '../Control/ControlPrograma.php';
include("../Control/configBd.php");
include '../Vista/Validacion.php';

$cod=$_POST['txtId'];
$nom=$_POST['txtNombre'];
$tit=$_POST['txtTit'];
$Tip=$_POST['txtTipo'];
$Inst=$_POST['txtInstitucion'];
$Modal=$_POST['txtModalidad'];

$bot=$_POST['btn'];

switch ($bot) {
	case 'Guardar':
		$objPrograma=new Programa($cod,$nom,$tit,$Tip,$Inst,$Modal);
		$objControlPrograma=new ControlPrograma($objPrograma);
		
        $objValido=new Validar();
        $Valido=$objValido->ValidarInt($cod);
        $Valido2=$objValido->ValidarText($nom);
        $Valido3=$objValido->ValidarText($tit);
        $Valido4=$objValido->ValidarVacio($Tip);
        $Valido5=$objValido->ValidarVacio($Inst);
        $Valido6=$objValido->ValidarVacio($Modal);

        if($Valido && $Valido2 && $Valido3 && $Valido4 && $Valido5 && $Valido6){  
            include '../Vista/Mensaje.html';
            $objControlPrograma->guardar();
        }
        else{
            include '../Vista/MensajeError.html';
        }
		break;
		case 'Modificar':
			$objPrograma=new Programa($cod,$nom,$tit,$Tip,$Inst,$Modal);
			$objControlPrograma=new ControlPrograma($objPrograma);
			
            $objValido=new Validar();
            $Valido=$objValido->ValidarInt($cod);
            $Valido2=$objValido->ValidarText($nom);
            $Valido3=$objValido->ValidarText($tit);
            $Valido4=$objValido->ValidarVacio($Tip);
            $Valido5=$objValido->ValidarVacio($Inst);
            $Valido6=$objValido->ValidarVacio($Modal);

            if($Valido && $Valido2 && $Valido3 && $Valido4 && $Valido5 && $Valido6){  
                include '../Vista/Mensaje.html';
                $objControlPrograma->modificar();
            }
            else{
                include '../Vista/MensajeError.html';
            }
			break;	
		case 'Borrar':
			$objPrograma=new Programa($cod,"","","","","");
			$objControlPrograma=new ControlPrograma($objPrograma);
			$objControlPrograma->borrar();
			break;
		case 'Consultar':
			$objPrograma=new Programa($cod,"","","","","");
			$objControlPrograma=new ControlPrograma($objPrograma);
			$objPrograma=$objControlPrograma->consultar();
			$nom=$objPrograma->getNombre();
			$tit=$objPrograma->getTitulo();
			$Tip=$objPrograma->getTipo();
			$Inst=$objPrograma->getInstitucion();
			$Modal=$objPrograma->getModalidad();
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
            <form action="VsPrograma.php" method="post">
                <h1 style="text-align: center;">Programa</h1>
                <label for="Ident">Id</label>
                <input type="text" name="txtId" id="Identificacion" value="'.$cod.'" required placeholder="Ingrese aqui el ID de programa"><br/><br/>
                <label for="nombre">Nombre</label>
                <input type="text" name="txtNombre" id="nombre" value="'.$nom.'" placeholder="Ingrese aqui el nombre de programa"><br/><br/>
                <label for="titulo">Titulo</label>
                <input type="text" name="txtTit" id="titulo" value="'.$tit.'" placeholder="Ingrese aqui su Titulo"><br/><br/>
                <label for="tipo">Tipo</label>
                <input type="text" name="txtTipo" id="tipo" value="'.$Tip.'" placeholder="Ingrese aqui su tipo"><br/><br/>
                <label for="Institucion">Institución</label>
                <input type="text" name="txtInstitucion" id="Institucion" value="'.$Inst.'" placeholder="Ingrese su Institución"><br/><br/>
                <label for="Modalidad">Modalidad</label>
                <input type="text" name="txtModalidad" id="Modalidad" value="'.$Modal.'" placeholder="Ingrese aqui su Modalidad"><br/><br/>
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