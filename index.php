<?php
error_reporting(0);
session_start();
include("Control/configBd.php");
include("Modelo/IngresoUsuario.php");
include("Control/ControlIngresoUsuario.php");
include("Control/ControlConexion.php");
// $niv=ObtenerNiv($_SESSION['Usu']);

// function ObtenerNiv($id)
// {
//     if ($id!=null)
//     {
//         $objConexion = new ControlConexion();
//         $objConexion->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat']);
//         $comandoSql ='SELECT * FROM tbl_ingresousuario  where NombreUsusario="'.$id.'" ';
//         $recordSet=$objConexion->ejecutarSelect($comandoSql);
//         $dp = $recordSet->fetch_array(MYSQLI_NUM);
//         return ($dp[2]);
//     }
// }

try{
    $usu=$_POST["txtUsuario"];
    $con=$_POST["txtContrasena"];
    $bot=$_POST["btnEnviar"];
 
    if($bot=="Enviar"){
    $objIngresoUsuario=new IngresoUsuario($usu,$con,$niv);
    $objControlIngresoUsuario =new ControlIngresoUsuario($objIngresoUsuario);
        if($objControlIngresoUsuario->validarIngreso()){
			$_SESSION['Usu']=  $usu;
            $_SESSION['Con']=  $con;
            $_SESSION['Niv']=  $niv;
            header('Location: Vista/Menu.php');
        }
        else{
            echo "<script>alert('Usuario y/o contraseña incorrectos');</script>";
        }
    }
}
catch (Exception $objExp) {
    echo 'Se presentó una excepción: ',  $objExp->getMessage(), "\n";
}


echo'
<!DOCTYPE html>
<html>
    <head>
        <title>Sisevid</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="stylelogin.css">

    </head>

    <body>
        <div class="Title">
            <h2>Sisevid</h2>
        </div>
        <div class="container right-panel-active">
        <!-- Sign Up -->
        <div class="container__form container--signup">
            <form action="#" class="form" id="form1">
                <h2 class="form__title">Registrarse</h2>
                <input type="text" placeholder="User" class="input" />
                <input type="email" placeholder="Email" class="input" />
                <input type="password" placeholder="Password" class="input" />
                <button class="btn">Registrarse</button>
            </form>
        </div>

        <!-- Sign In -->
        <div class="container__form container--signin">
            <form action="index.php" method="POST" class="form" id="form2">
                <h2 class="form__title">Iniciar Sesión</h2>
                <input type="text" name="txtUsuario"  placeholder="Usuario" class="input" />
                <input type="password" name="txtContrasena" placeholder="Contraseña" class="input" />
                <a href="#" class="link">¿Olvidaste tu contraseña?</a>

                <button class="btn" name="btnEnviar" value="Enviar" >Iniciar Sesión</button>
            </form>
        </div>

        <!-- Overlay -->
        <div class="container__overlay">
            <div class="overlay">
                <div class="overlay__panel overlay--left">
                    <button class="btn" id="signIn">Iniciar Sesión</button>
                </div>
                <div class="overlay__panel overlay--right">
                    <button class="btn" id="signUp">Registrarse</button>
                </div>
            </div>
        </div>
        </div>
        

<script>
const signInBtn = document.getElementById("signIn");
const signUpBtn = document.getElementById("signUp");
/*const fistForm = document.getElementById("form1");
const secondForm = document.getElementById("form2");*/
const container = document.querySelector(".container");

signInBtn.addEventListener("click", () => {
	container.classList.remove("right-panel-active");
});

signUpBtn.addEventListener("click", () => {
	container.classList.add("right-panel-active");
});

fistForm.addEventListener("submit", (e) => e.preventDefault());
secondForm.addEventListener("submit", (e) => e.preventDefault());

</script>



    </body>
</html>
';
?>