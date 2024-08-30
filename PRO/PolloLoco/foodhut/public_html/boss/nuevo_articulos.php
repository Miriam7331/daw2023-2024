<?php
 session_start();
include '../funciones.php';
$sql = conectarBaseDatos();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if ($_GET["opcion"] === "insertar") {
        $nombre = $_POST["nombre"];
        $descripcion = $_POST["descripcion"];
        $precio = $_POST["precio"];
        $imagen = $_POST["imagen"];
        $categoria = $_POST["categoria"];
        $alergenos = $_POST["alergenos"];
        $proveedor = $_POST["proveedor"];
        $tiempoPreparacion = $_POST["tiempoPreparacion"];
   
        if ($imagen === null || empty($imagen)) {
            $imagen = 'https://img.freepik.com/vector-premium/no-hay-foto-disponible-icono-vector-simbolo-imagen-predeterminado-imagen-proximamente-sitio-web-o-aplicacion-movil_87543-10615.jpg';
        }

        ///////////////////

        if (isset($_FILES["imagen"]) && $_FILES["imagen"]["error"] === 0) {
            $allowed = ["jpeg", "png", "jpg"];
            $fileName = $_FILES["imagen"]["name"];
            $fileSize = $_FILES["imagen"]["size"];
            $fileTmp = $_FILES["imagen"]["tmp_name"];
            $fileType = $_FILES["imagen"]["type"];
            $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

            if (in_array($fileExt, $allowed)) {
                $uploadDir = "../assets/imgs";
                $newFileName = uniqid("", true) . "." . $fileExt;
                $uploadFile = $uploadDir . $newFileName;

                if (move_uploaded_file($fileTmp, $uploadFile)) {
                    $imagen = $uploadFile;
                } else {
                    echo "Error al subir el archivo.";
                }
            } else {
                echo "Formato de archivo no permitido. Solo se permiten archivos JPEG, PNG y JPG.";
            }
        }



///////////////////////////







        $registro = $sql->query("INSERT INTO `productos` (`nombre`, `descripcion`, `precio`, `imagen`, `categoria`, `alergenos`, `proveedor`, `tiempoPreparacion`) VALUES ('$nombre', '$descripcion', '$precio', '$imagen', '$categoria', '$alergenos', '$proveedor', '$tiempoPreparacion');");
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
    <link rel="stylesheet" href="../assets/vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="../assets/vendors/animate/animate.css">

    <!-- Bootstrap + Pollo Loco titulos de menú -->
	<link rel="stylesheet" href="../assets/css/foodhut.css">
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
                    <a class="nav-link" href="../inicio.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="articulos.php">Productos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="clientes/clientes.php">Clientes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="servicio/profesional.php">Personal de servicio</a>
                </li>
            </ul>
            <a class="navbar-brand m-auto" href="#">
                <img src="../assets/imgs/logo.svg" class="brand-img" alt="PolloLOCO Logo">
                <span class="brand-txt">Pollo LOCO</span>
            </a>
            <ul class="navbar-nav">
                <li class="nav-item">
                <a href="#" class="btn btn-primary ml-xl-4">Hola, <?php echo htmlspecialchars($_SESSION["cuenta"]); ?></a>
                </li>
                <li class="nav-item">
                    <a href="../sesion.php?session=logout" class="btn ml-xl-4">Log out</a>
                </li>
            </ul>
        </div>
    </nav>
    <div id="blog" class="container-fluid bg-dark text-light py-5 text-center wow fadeIn">
        <br><br>
        <h2 class="section-title py-5">Añadir producto</h2>
        <div class="row justify-content-center">
            <div class="col-sm-7 col-md-4 mb-5">
                <form  method="POST" action="nuevo_articulos.php?opcion=insertar" enctype="multipart/form-data">
                    <div class="form-group">
                    <label for="nombre" class="form-label">Nombre del producto:</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" required>
                    </div>
                    <div class="form-group">
                    <label for="descripcion" class="form-label">Descripción del producto:</label>
                        <input type="text" class="form-control" id="descripcion" name="descripcion" required>
                    </div>
                    <div class="form-group">
                    <label for="precio" class="form-label">Precio del producto:</label>
                        <input type="text" class="form-control" id="precio" name="precio" required>
                    </div>


                    <div class="form-group">
                    <label for="imagen" class="form-label">Imagen del producto:</label>
                        <input type="text" class="form-control" id="imagen" name="imagen">
                        <!-- AÑADE AQUI EL COD HTML PARA SUBIR UN ARCHIVO DE IMAGEN DESDE EL PC -->
                        <input type="file" class="form-control" id="imagen" name="imagen" accept="image/jpeg, image/png, image/jpg">
                    </div>
                    <div class="form-group">
                    <label for="categoria" class="form-label">Categoria del producto:</label>
                        <input type="text" class="form-control" id="categoria" name="categoria">
                    </div>
                    <div class="form-group">
                    <label for="alergenos" class="form-label">Alergenos del producto:</label>
                        <input type="text" class="form-control" id="alergenos" name="alergenos">
                    </div>
                    <div class="form-group">
                    <label for="proveedor" class="form-label">Proveedor del producto:</label>
                        <input type="text" class="form-control" id="proveedor" name="proveedor">
                    </div>
                    <div class="form-group">
                    <label for="tiempoPreparacion" class="form-label">Tiempo de preparacion del producto:</label>
                        <input type="text" class="form-control" id="tiempoPreparacion" name="tiempoPreparacion" >
                    </div>
                   
                    <div class="form-group ">
                        <button type="submit" class="form-control btn btn-primary" >Añadir nuevo producto</button>
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
