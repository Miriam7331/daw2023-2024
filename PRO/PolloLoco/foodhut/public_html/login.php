<?php 

 //include '../funciones.php';
session_start();
 include 'C:/xampp/htdocs/PolloLoco/foodhut/public_html/funciones.php';
 $sql = conectarBaseDatos();

 if (isset($_SESSION['rol'])) {
    if ($_SESSION['rol'] == 'boss') {
        header("Location: boss/articulos.php");
    } elseif ($_SESSION['rol'] == 'cliente') {
        header("Location: cliente/productos.php");
    } 
    exit();
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
                <!-- <li class="nav-item">
                    <a class="nav-link" href="#about">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#gallary">Gallary</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#book-table">Book-Table</a>
                </li> -->
            </ul>
            <a class="navbar-brand m-auto" href="#">
                <img src="assets/imgs/logo.svg" class="brand-img" alt="">
                <span class="brand-txt">Pollo LOCO</span>
            </a>
            <ul class="navbar-nav">
       
    
                <li class="nav-item">
                    <a href="registro.php" class="btn btn-primary ml-xl-4">No tengo cuenta</a>
                </li>
            </ul>
        </div>
    </nav>
    <div id="blog" class="container-fluid bg-dark text-light py-5 text-center wow fadeIn">
        <br><br>
        <h2 class="section-title py-5">Log in</h2>
        <div class="row justify-content-center">

            <div class="col-sm-7 col-md-4 mb-5">
            <div class="contact-form-card">
                <h4 class="contact-title">Iniciar sesión</h4>
                <form action="sesion.php" method="POST">
                    <div class="form-group">
                        <!-- <input  class="form-control" type="text" placeholder="Name *" required> -->
                        <input class="form-control" type="text" name="cuenta" placeholder="Nombre usuario" required>
                    </div>
                    <div class="form-group">
                    <input class="form-control" type="text" name="contrasena" placeholder="Contraseña" required>
                        <!-- <input class="form-control" type="email" placeholder="Email *" required> -->
                    </div>
                    <!-- <div class="form-group"> 
                        <textarea class="form-control" id=" placeholder="Message *" rows="7" required></textarea>
                    </div> -->
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
