<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel=stylesheet href="Vista/css/stilos.css">
    <title>Home</title>
</head>
<body>

<div class="navbar">
   <a href="#" id="btnHome" >Home</a><!--onclick="Home()" -->
   <a href="nosotros.php" id="btnQuienes" >Quienes Somos</a><!--onclick="Quienes()" -->
  <a href="#" id="btnServicios" >Servicios</a><!--onclick="Servicios()" -->
  <a href="#" id="btnProductos" >Productos</a><!--onclick="Productos()" -->
  <a href="Vista/VistaLogin.php">Iniciar Sesión</a>
</div>
<section>
        <div class="banner">
            <div class="banner_video">
                <video src="Vista/video/video1.mp4" autoplay muted loop></video>
            </div>
            <div class="banner_descripcion">
                <div>
                    <h2>EXPERTOS EN PROGRAMACIÓN, A SU SERVICIO</h2>
                </div>
            </div>

        </div>
    </section>
    <main>
        <section>
            <div id="boletin">
                <div class="contenedor">
                    <h2>Suscribete a Nuestro Boletin</h2>
                    <form>
                        <input type="email" name="email" placeholder="Ingrese el Email">
                        <input type="submit" class="boton1" value="Suscribete">
                    </form>
                </div>
            </div>
        </section>
        <section>
            <div class="caja">
                <div class="contenedor_grid">
                    <article>
                        <div class="grid">
                            <h3>HTML5</h3>
                            <div class="caja__columna">
                                <div class="caja1">
                                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Impedit tempore
                                        tempora,
                                        ratione sit, amet consectetur
                                    </p>
                                </div>
                                <div class="caja1">
                                    <img src="Vista/img/logo1.png">
                                </div>
                                <div class="caja1">
                                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Impedit tempore
                                        tempora,
                                        ratione sit, amet consectetur !</p>
                                </div>


                                <div class="caja1">
                                    <h3>CSS3</h3>
                                </div>


                                <div class="caja1">
                                    <img src="Vista/img/logo2_1.png">
                                </div>

                                <div class="caja1">
                                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Impedit tempore
                                        tempora,
                                        ratione
                                        repellendus commodi soluta! Ipsa laborum accusamus amet natus vero, quo sit,
                                        ullam
                                        nesciunt
                                        facilis quod in cupiditate inventore!</p>
                                </div>
                                <div class="caja1">
                                    <h3>Diseño Grafico</h3>
                                </div>
                                <div class="caja1">
                                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Impedit tempore
                                        tempora, ratione
                                        repellendus commodi soluta! Ipsa laborum accusamus amet natus vero, quo sit,
                                        ullam nesciunt
                                        facilis quod in cupiditate inventore!</p>
                                </div>
                                <div class="caja1">
                                    <img src="Vista/img/logo3.png">
                                </div>
                            </div>
                        </div>
                    </article>
                </div>
            </div>
        </section>

        <div class="container-footer">
            <footer>
                <div class="redes-footer">
                    <a href="#"><i class="fab fa-facebook-f icon-redes-footer"></i></a>
                    <a href="#"><i class="fab fa-google-plus-g icon-redes-footer"></i></a>
                    <a href="#"><i class="fab fa-instagram icon-redes-footer"></i></a>
                </div>
                <hr>
                <h4> Desarrollador | Miguel Hernández - Todos los Derechos Reservados 2021&copy;</h4>
            </footer>
        </div>
    </main>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script type="text/javascript" src="Vista/js/main.js"></script>
<script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script> 
</body>
</html>