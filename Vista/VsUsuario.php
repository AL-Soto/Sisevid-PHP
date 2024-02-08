<?php 
session_start();
error_reporting(0);
if($_SESSION['Usu']==  null)header('Location: ../index.php');
include '../Modelo/Usuario.php';
include '../Control/ControlConexion.php';
include '../Control/ControlUsuario.php';
include("../Control/configBd.php");
$cod=$_POST['txtIdent'];
$nom=$_POST['txtNombre'];
$nomD=$_POST['txtNombreD'];
$Apell=$_POST['txtApell'];
$ApellD=$_POST['txtApellD'];
$Passwo=$_POST['txtPassw'];
$Tipo=$_POST['txtTipo'];
$Correo=$_POST['txtCorreo'];
$bot=$_POST['btn'];

switch ($bot) {
	case 'guardar':
		$objUsuario=new Usuario($cod,$nom,$nomD,$Apell,$ApellD,$Passwo,$Tipo,$Correo);
		$objControlUsuario=new ControlUsuario($objUsuario);
		$objControlUsuario->guardar();
		break;
		case 'Modificar':
			$objUsuario=new Usuario($cod,$nom,$nomD,$Apell,$ApellD,$Passwo,$Tipo,$Correo);
			$objControlUsuario=new ControlUsuario($objUsuario);
			$objControlUsuario->modificar();
			break;	
		case 'Borrar':
			$objUsuario=new Usuario($cod,"","","","","","","");
			$objControlUsuario=new ControlUsuario($objUsuario);
			$objControlUsuario->borrar();
			break;
		case 'Consultar':
			$objUsuario=new Usuario($cod,"","","","","","","");
			$objControlUsuario=new ControlUsuario($objUsuario);
			$objUsuario=$objControlUsuario->consultar();
			$nom=$objUsuario->getNombre1();
			$nomD=$objUsuario->getNombre2();
			$Apell=$objUsuario->getApellido1();
			$ApellD=$objUsuario->getApellido2();
			$Passwo=$objUsuario->getContrasena();
			$Tipo=$objUsuario->getTipoUsuario();
			$Correo=$objUsuario->getCorreo();
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
            <form action="VsUsuario.php" method="post">
                <h1 style="text-align: center;">Usuario</h1>
                <label for="Ident">Cedula</label>
                <input type="text" name="txtIdent" value="'.$cod.'" required placeholder="Ingrese aqui su Identificación">
                <label for="nombre1">Primer Nombre</label>
                <input type="text" name="txtNombre" value="'.$nom.'" placeholder="Ingrese aqui su nombre">
                <label for="nombre2">Segundo Nombre</label>
                <input type="text" name="txtNombreD"  placeholder="Ingrese aqui su nombre">
                <label for="apellido">Primer Apellido</label>
                <input type="text" name="txtApell"  placeholder="Ingrese aqui su Apellido">
                <label for="apellido2">Segundo Apellido</label>
                <input type="text" name="txtApellD"  placeholder="Ingrese aqui su Apellido">
                <label for="password">Contraseña</label>
                <input type="password" name="txtPassw"  placeholder="Contraseña">
                <label for="tipo">Tipo de Usuario</label>
                <input type="text" name="txtTipo" placeholder="Ingrese aqui su Tipo de usuario">
                <label for="Correo">Correo electronico</label>
                <input type="text" name="txtCorreo" placeholder="Ingrese aqui su Correo electrónico">
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