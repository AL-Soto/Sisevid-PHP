<?php
session_start();
if($_SESSION['Usu']==  null)header('Location: ../index.php');

include("../Control/configBd.php");
include("../Modelo/IngresoUsuario.php");
include("../Control/ControlIngresoUsuario.php");
include("../Control/ControlConexion.php");

// echo($_SESSION['Usu']);
// echo($_SESSION['Con']);

// echo($_SESSION['Niv']);
 

function ObtenerNiv($id)
{
    if ($id!=null)
    {
        $objConexion = new ControlConexion();
        $objConexion->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat']);
        $comandoSql ='SELECT * FROM tbl_ingresousuario  where NombreUsusario="'.$id.'" ';
        $recordSet=$objConexion->ejecutarSelect($comandoSql);
        $dp = $recordSet->fetch_array(MYSQLI_NUM);
        return ($dp[2]);
    }
}
$nivel=ObtenerNiv($_SESSION['Usu']);
$GLOBALS['Nivel']=$nivel;
// echo $nivel;
echo '
<!DOCTYPE html>
<html>
    <head>
        <title>Menu</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <script src="script.js"></script>
        <link rel="stylesheet" href="stylemenu.css">

        <script src="https://unpkg.com/ionicons@5.0.0/dist/ionicons.js"></script>
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <script type="text/javascript" src="script.js"></script>

    </head>
    <body onload="mostrarMenu('.$nivel.')">
    <img src="../SisevidA.png" alt="">

    
    <div class="btn-Redes">
        <!--<button type="button" onclick="mostrarSocial();"><span class="material-icons">menu</span></button>-->
        <span onclick="mostrarSocial(); "><span class="material-icons">menu</span></span>
    </div>
        <div class="social" id="Social">
            <a><span class="material-icons">person</span>'.$_SESSION['Usu'].'</a>
            <a href="#">
            <span class="material-icons">settings</span>Ajustes
            </a>
            <a href="cerrarSesion.php">
                <span class="material-icons">logout</span>Salir
            </a>
        </div>

        <!--<div class="Cerrar">
            <button ><a href="cerrarSesion.php"> Cerrar Sesión</a></button>
        </div>-->
            <div class="Administrador" id="Administrador">
                <nav>
                    <ul>
                    <h1>Administrador</h1>
                    
                    <li><a href="VsEstudiantes.php">Estudiantes</a></li>
                    <li><a href="VsProfesor.php">Profesores</a></li>
                    <li><a href="VsInstitucion.php">Institución</a></li>
                    <li><a href="VsPrograma.php">Programa</a></li>
                    <li><a href="VsUsuario.php">Usuario</a></li>
                    <li><a href="VsCursos.php">Cursos</a></li>
                    <li><a href="VsSedes.php">Sedes</a></li>
                    <li><a href="VsEvidencia.php">Evidencias</a></li>
                    <li><a href="cerrarSesion.php">Cerrar Sesion</a></li>
                </ul>
                </nav>
                
            </div>
            <div class="Estudiante" id="Estudiante">
                <ul>
                    <h1>Estudiantes</h1>
                    <li><a href="VsEstudiantes.php">Estudiantes</a></li>
                    <li><a href="VsEvidencia.php">Evidencias</a></li>
                </ul>
            </div>
            <div class="Profesor" id="Profesor">
                <ul>
                    <h1>Profesor</h1>
                    <li><a href="VsProfesor.php">Profesores</a></li>
                    <li><a href="VsEvidencia.php">Evidencias</a></li>
                </ul>
            </div>
            <div class="Invitado" id="Invitado">
                <ul>
                    <h1>Invitado</h1>
                    <li><a href="VsEvidencia.php">Evidencias</a></li>
                </ul>
            </div>
    </body>

</html>';


?>