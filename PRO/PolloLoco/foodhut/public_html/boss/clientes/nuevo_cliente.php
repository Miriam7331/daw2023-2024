<?php
 session_start();
include '../../funciones.php';
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
                $rol = "cliente";
        
            //   //  echo "-->".$Imagen;
            //     if ($rol === null || empty($rol)) {
            //         $Imagen = 'cliente';
            //     }
                $registro = $sql->query("INSERT INTO `usuario` (`cuenta`, `nombre`, `apellidos`, `contrasena`, `email`, `telefono`, `ciudad`, `cp`, `calle`, `numero`, `piso`, `letra`, `rol`) VALUES ('$cuenta', '$nombre', '$apellidos', '$contrasena', '$email', '$telefono', '$ciudad', '$cp', '$calle', '$numero', '$piso', '$letra', '$rol');"); //rol es cliente
            }
        }

?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Cliente Guille">
    <meta name="author" content="Miriam Guerra">
    <title>PolloLOCO</title>
   
    <!-- fuente de iconos -->
    <link rel="stylesheet" href="../../assets/vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="../../assets/vendors/animate/animate.css">

    <!-- Bootstrap + Pollo Loco titulos de menú -->
	<link rel="stylesheet" href="../../assets/css/foodhut.css">
</head>
<body data-spy="scroll" data-target=".navbar" data-offset="40" id="home">
    
    <!-- Menú navegación -->
    <nav class="custom-navbar navbar navbar-expand-lg navbar-dark fixed-top" data-spy="affix" data-offset-top="10">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav">
            <li class="nav-item">
                    <a class="nav-link" href="../../inicio.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="articulos.php">Productos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="clientes.php">Clientes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../servicio/profesional.php">Personal de servicio</a>
                </li>
            </ul>
            <a class="navbar-brand m-auto" href="#">
                <img src="../../assets/imgs/logo.svg" class="brand-img" alt="PolloLOCO Logo">
                <span class="brand-txt">Pollo LOCO</span>
            </a>
            <ul class="navbar-nav">
                <li class="nav-item">
                <a href="#" class="btn btn-primary ml-xl-4">Hola, <?php echo htmlspecialchars($_SESSION["cuenta"]); ?></a>
                </li>
                <li class="nav-item">
                    <a href="../../sesion.php?session=logout" class="btn ml-xl-4">Log out</a>
                </li>
            </ul>
        </div>
    </nav>
    <div id="blog" class="container-fluid bg-dark text-light py-5 text-center wow fadeIn">
        <br><br>
        <h2 class="section-title py-5">Nuevo Cliente</h2>
        <div class="row justify-content-center">
            <div class="col-sm-7 col-md-4 mb-5">
                <form  method="POST" action="nuevo_cliente.php?opcion=insertar" enctype="multipart/form-data">
                    <div class="form-group">
                    <label for="nombre" class="form-label">Nombre del cliente:</label>
                        <input type="text" class="form-control" id="nombre" name="nombre">
                    </div>
                    <div class="form-group">
                    <label for="nombre" class="form-label">Apellidos del cliente:</label>
                        <input type="text" class="form-control" id="apellidos" name="apellidos">
                    </div>
                    <div class="form-group">
                    <label for="nombre" class="form-label">Email del cliente:</label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>
                    <div class="form-group">
                    <label for="nombre" class="form-label">Teléfono del cliente:</label>
                        <input type="text" class="form-control" id="telefono" name="telefono">
                    </div>
                    <div class="form-group">
                    <label for="nombre" class="form-label">Ciudad del cliente:</label>
                        <input type="text" class="form-control" id="ciudad" name="ciudad">
                    </div>
                    <div class="form-group">
                    <label for="nombre" class="form-label">Código postal del cliente:</label>
                        <input type="text" class="form-control" id="cp" name="cp">
                    </div>
                    <div class="form-group">
                    <label for="nombre" class="form-label">Calle del cliente:</label>
                        <input type="text" class="form-control" id="calle" name="calle">
                    </div>
                    <div class="form-group">
                    <label for="nombre" class="form-label">Número portal del cliente:</label>
                        <input type="text" class="form-control" id="numero" name="numero">
                    </div>
                    <div class="form-group">
                    <label for="nombre" class="form-label">Nº piso, puerta... del cliente:</label>
                        <input type="text" class="form-control" id="piso" name="piso">
                    </div>
                    <div class="form-group">
                    <label for="nombre" class="form-label">Letra puerta del cliente:</label>
                        <input type="text" class="form-control" id="letra" name="letra">
                    </div>
                    <div class="form-group">
                    <label for="nombre" class="form-label">Nombre usuario del cliente:</label>
                        <input type="text" class="form-control" id="cuenta" name="cuenta" required>
                    </div>

                    <div class="form-group">
                    <label for="nombre" class="form-label">Contraseña del cliente:</label>
                        <input type="text" class="form-control" id="contrasena" name="contrasena" required>
                    </div>                              
                    <div class="form-group ">
                        <button type="submit" class="form-control btn btn-primary" >Añadir nuevo cliente</button>
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
    <script src="../../assets/vendors/jquery/jquery-3.4.1.js"></script>
    <script src="../../assets/vendors/bootstrap/bootstrap.bundle.js"></script>

    <!-- bootstrap affix -->
    <script src="../../assets/vendors/bootstrap/bootstrap.affix.js"></script>

    <!-- wow.js -->
    <script src="../../assets/vendors/wow/wow.js"></script>
    
    <!-- google maps -->
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCtme10pzgKSPeJVJrG1O3tjR6lk98o4w8&callback=initMap"></script>

    <!-- FoodHut js -->
    <script src="../../assets/js/foodhut.js"></script>

</body>
</html>
