<?php
// error_reporting(0);
session_start();
if($_SESSION['Usu']==  null)header('Location: ../index.php');
include("../Control/configBd.php");
include '../Modelo/Estudiantes.php';
include '../Control/ControlConexion.php';
include '../Control/ControlEstudiantes.php';
include '../Vista/Validacion.php';

$cod=$_POST['txtIdent'];
$nom=$_POST['txtNombre'];
$Apell=$_POST['txtApell'];
$NivAcd=$_POST['txtNivAcd'];
$Prog=$_POST['txtPrograma'];
$Inst=$_POST['txtInst'];
$bot=$_POST['btn'];



switch ($bot) {
	case 'Guardar':
		$objEstudiantes=new Estudiantes($cod,$nom,$Apell,$NivAcd,$Prog,$Inst);
		$objControlEstudiantes=new ControlEstudiantes($objEstudiantes);
        $objValido=new Validar();
        $Valido=$objValido->ValidarInt($cod);
        $Valido2=$objValido->ValidarText($nom);
        $Valido3=$objValido->ValidarText($Apell);
        $Valido4=$objValido->ValidarVacio($NivAcd);
        $Valido5=$objValido->ValidarVacio($Prog);
        $Valido6=$objValido->ValidarVacio($Inst);

        if($Valido && $Valido2 && $Valido3 && $Valido4 && $Valido5 && $Valido6){  
            include '../Vista/Mensaje.html';
            $objControlEstudiantes->guardar();
        }
        else{
            include '../Vista/MensajeError.html';
        }
		break;
		case 'Modificar':
			$objEstudiantes=new Estudiantes($cod,$nom,$Apell,$NivAcd,$Prog,$Inst);
			$objControlEstudiantes=new ControlEstudiantes($objEstudiantes);
            $objValido=new Validar();
            $Valido=$objValido->ValidarInt($cod);
            $Valido2=$objValido->ValidarText($nom);
            $Valido3=$objValido->ValidarText($Apell);
            $Valido4=$objValido->ValidarVacio($NivAcd);
            $Valido5=$objValido->ValidarVacio($Prog);
            $Valido6=$objValido->ValidarVacio($Inst);
            if($Valido && $Valido2 && $Valido3 && $Valido4 && $Valido5 && $Valido6){  
                include '../Vista/Mensaje.html';
                $objControlEstudiantes->modificar();
            }
            else{
                include '../Vista/MensajeError.html';
            }
			
			break;	
		case 'Borrar':
			$objEstudiantes=new Estudiantes($cod,"","","","","");
			$objControlEstudiantes=new ControlEstudiantes($objEstudiantes);
			$objControlEstudiantes->borrar();
			break;
		case 'Consultar':
			$objEstudiantes=new Estudiantes($cod,"","","","","");
			$objControlEstudiantes=new ControlEstudiantes($objEstudiantes);
			$objEstudiantes=$objControlEstudiantes->consultar();
			$nom=$objEstudiantes->getNombre();
			$Apell=$objEstudiantes->getApellido();
			$NivAcd=$objEstudiantes->getNivelAcademico();
			$Prog=$objEstudiantes->getPrograma();
			$Inst=$objEstudiantes->getInstitucion();
			break;
		default:
			// code...
			break;
}
// echo ('El nivel es:');
// echo $GLOBALS['Nivel'];


echo $_SESSION['Niv'];
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
        <script type="text/javascript" src="Validaciones.js"></script>
    </head>
    <body>
        <div class="IngresoDT">
        <div class="btMenu">
            <a href="Menu.php" style="text-decoration: none;"><span class="material-icons">arrow_back</span></a>
        </div>
            <form action="VsEstudiantes.php" method="post">
                <h1 style="text-align: center;">Estudiante</h1>
                <label for="Ident">Identificación</label>
                <input type="text" name="txtIdent" id="Ident"  value="'.$cod.'" required placeholder="Ingrese aqui su Identificación">
                <label for="nombre">Nombre</label>
                <input type="text" name="txtNombre" id="Nombre" value="'.$nom.'" placeholder="Ingrese aqui su Nombre">
                <label for="apellido">Apellido</label>
                <input type="text" name="txtApell" value="'.$Apell.'" placeholder="Ingrese aqui su Apellido">
                <label for="academico">Nivel Academico</label>
                <input type="text" name="txtNivAcd" value="'.$NivAcd.'" placeholder="Ingrese aqui su Nivel Academico">
                <label for="programa">Programa</label>
                <input type="text" name="txtPrograma" value="'.$Prog.'" placeholder="Ingrese aqui tu Programa">
                <label for="institucion">Institución</label>
                <input type="text" name="txtInst" value="'.$Inst.'" placeholder="Ingrese aqui su Institución">
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