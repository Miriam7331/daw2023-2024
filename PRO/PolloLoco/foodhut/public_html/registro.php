<?php 

include 'C:/xampp/htdocs/PolloLoco/foodhut/public_html/funciones.php';
$sql = conectarBaseDatos();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if ($_GET["opcion"] === "insertar") {
        $nombre = $_POST["nombre"];
        $apellidos = $_POST["apellidos"];
        $contrasena = $_POST["contrasena"];
        $email = $_POST["email"];
        $telefono = $_POST["telefono"];
        $ciudad = $_POST["ciudad"];
        $cp = $_POST["cp"];
        $calle = $_POST["calle"];
        $numero = $_POST["numero"];
        $piso = $_POST["piso"];
        $letra = $_POST["letra"];
        $cuenta = $_POST["cuenta"];
        // $rol = $_POST["rol"];
        $rol = "cliente";

      //  echo "-->".$Imagen;
        if ($rol === null || empty($rol)) {
            $Imagen = 'cliente';
        }
        $registro = $sql->query("INSERT INTO `usuario` (`cuenta`, `nombre`, `apellidos`, `contrasena`, `email`, `telefono`, `ciudad`, `cp`, `calle`, `numero`, `piso`, `letra`, `rol`) VALUES ('$cuenta', '$nombre', '$apellidos', '$contrasena', '$email', '$telefono', '$ciudad', '$cp', '$calle', '$numero', '$piso', '$letra', '$rol');"); //rol es cliente
    }
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="crear la web de restaurante">
    <meta name="description" content="Cliente Guille">
    <meta name="author" content="MiriamGuerra">
    <title>PolloLOCO</title>
   
    <!-- font icons -->
    <link rel="stylesheet" href="assets/vendors/themify-icons/css/themify-icons.css">

    <link rel="stylesheet" href="assets/vendors/animate/animate.css">

    <!-- Bootstrap + FoodHut main styles -->
	<link rel="stylesheet" href="assets/css/foodhut.css">
</head>
<body data-spy="scroll" data-target=".navbar" data-offset="40" id="home">
    
    <!-- Navbar -->
    <nav class="custom-navbar navbar navbar-expand-lg navbar-dark fixed-top" data-spy="affix" data-offset-top="10">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="inicio.php">Home</a>
                </li>
            </ul>
            <a class="navbar-brand m-auto" href="#">
                <img src="assets/imgs/logo.svg" class="brand-img" alt="">
                <span class="brand-txt">Pollo LOCO</span>
            </a>
            <ul class="navbar-nav">
       
   
                <li class="nav-item">
                    <a href="login.php" class="btn btn-primary ml-xl-4">Tengo cuenta</a>
                </li>
            </ul>
        </div>
    </nav>
    <div id="blog" class="container-fluid bg-dark text-light py-5 text-center wow fadeIn">
        <br><br>
        <h2 class="section-title py-5">Registro</h2>
        <div class="row justify-content-center">

            <div class="col-sm-7 col-md-4 mb-5">
            <div class="contact-form-card">
                <h4 class="contact-title">Nueva cuenta</h4>
                <form  method="POST" action="registro.php?opcion=insertar" enctype="multipart/form-data">
                    <div class="form-group">
                        <input type="text" placeholder="Escribe tu nombre aquí..." class="form-control" id="nombre" name="nombre">
                    </div>
                    <div class="form-group">
                        <input type="text" placeholder="Escribe tus apellidos aquí..." class="form-control" id="apellidos" name="apellidos">
                    </div>
                    <div class="form-group">
                        <input type="email" placeholder="Escribe tu email aquí..." class="form-control" id="email" name="email">
                    </div>
                    <div class="form-group">
                        <input type="text" placeholder="Escribe tu telefono aquí..." class="form-control" id="telefono" name="telefono">
                    </div>
                    <div class="form-group">
                        <input type="text" placeholder="Escribe tu ciudad aquí..." class="form-control" id="ciudad" name="ciudad">
                    </div>
                    <div class="form-group">
                        <input type="text" placeholder="Escribe tu CP aquí..." class="form-control" id="cp" name="cp">
                    </div>
                    <div class="form-group">
                        <input type="text" placeholder="Escribe tu calle aquí..." class="form-control" id="calle" name="calle">
                    </div>
                    <div class="form-group">
                        <input type="text" placeholder="Escribe tu numero de portal aquí..." class="form-control" id="numero" name="numero">
                    </div>
                    <div class="form-group">
                        <input type="text" placeholder="Escribe tu nº piso, puerta aquí..." class="form-control" id="piso" name="piso">
                    </div>
                    <div class="form-group">
                        <input type="text" placeholder="Escribe tu letra aquí..." class="form-control" id="letra" name="letra">
                    </div>
                    <div class="form-group">
                        <input type="text" placeholder="Escribe tu nombre de usuario aquí..." class="form-control" id="cuenta" name="cuenta" required>
                    </div>

                    <div class="form-group">
                        <input type="text" placeholder="Escribe tu contraseña aquí..." class="form-control" id="contrasena" name="contrasena" required>
                    </div>            
                    <div class="form-group ">
                        <button type="submit" class="form-control btn btn-primary" >Iniciar</button>
                    </div>
                </form>
            </div>
            </div>
        </div>
    </div>


    <div class="bg-dark text-light text-center border-top wow fadeIn">
        <p class="mb-0 py-3 text-muted small">&copy; Copyright <script>document.write(new Date().getFullYear())</script> Hecho con <i class="ti-heart text-danger"></i> por <a href="http://devcrud.com">PolloLOCO</a></p>
    </div>
    <!-- end of page footer -->

	<!-- core  -->
    <script src="assets/vendors/jquery/jquery-3.4.1.js"></script>
    <script src="assets/vendors/bootstrap/bootstrap.bundle.js"></script>

    <!-- bootstrap affix -->
    <script src="assets/vendors/bootstrap/bootstrap.affix.js"></script>

    <!-- wow.js -->
    <script src="assets/vendors/wow/wow.js"></script>
    
    <!-- google maps -->
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCtme10pzgKSPeJVJrG1O3tjR6lk98o4w8&callback=initMap"></script>

    <!-- FoodHut js -->
    <script src="assets/js/foodhut.js"></script>

</body>
</html>
