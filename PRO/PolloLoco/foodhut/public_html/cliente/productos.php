<?php
session_start();


include '../funciones.php';
$sql = conectarBaseDatos();


$orden = "SELECT * FROM productos WHERE categoria = 'Hamburguesas' ORDER BY categoria";
if (isset($_GET["orderby"])) {
    $categoria = $sql->real_escape_string($_GET["orderby"]);
    switch ($categoria) {
        case "Hamburguesas":
        case "Pizzas":
        case "Bocadillos":
        case "Bebidas":
            $orden = "SELECT * FROM productos WHERE categoria = '$categoria' ORDER BY categoria";
            break;
    }
}
$registro = $sql->query($orden);
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
                    <a class="nav-link" href="productos.php">Productos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="carrito.php">Comprar</a>
                </li>
            </ul>
            <a class="navbar-brand m-auto" href="#">
                <img src="../assets/imgs/logo.svg" class="brand-img" alt="PolloLOCO Logo">
                <span class="brand-txt">Pollo LOCO</span>
            </a>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="productos.php" class="btn btn-primary ml-xl-4">Hola, <?php echo htmlspecialchars($_SESSION["cuenta"]); ?></a>
                </li>
                <li class="nav-item">
                    <a href="../sesion.php?session=logout" class="btn ml-xl-4">Log out</a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Sesión BLOG -->
    <div id="blog" class="container-fluid bg-dark text-light py-5 text-center wow fadeIn">
        <br><br>
        <h2 class="section-title py-5">Productos</h2>

        <div class="row justify-content-center">
            <div class="col-sm-7 col-md-4 mb-5">
                <ul class="nav nav-pills nav-justified mb-3" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link" id="pills-hamburguesas-tab" href="productos.php?orderby=Hamburguesas" role="tab" aria-controls="hamburguesas" aria-selected="true">Hamburguesas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-bocadillos-tab" href="productos.php?orderby=Bocadillos" role="tab" aria-controls="bocadillos" aria-selected="false">Bocadillos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-pizzas-tab" href="productos.php?orderby=Pizzas" role="tab" aria-controls="pizzas" aria-selected="false">Pizzas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-bebidas-tab" href="productos.php?orderby=Bebidas" role="tab" aria-controls="bebidas" aria-selected="false">Bebidas</a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="foods" role="tabpanel" aria-labelledby="pills-home-tab">
                <div class="row">

                <?php while ($organiza = $registro->fetch_assoc()) { ?>

                    <div class="col-md-4">
                        <div class="card bg-transparent border my-3 my-md-0">
                            <img src="<?php echo htmlspecialchars($organiza["imagen"]); ?>" alt="Producto" class="rounded-0 card-img-top img-responsive">
                            <div class="card-body">
                                <h1 class="text-center mb-4"><a href="#" class="badge badge-primary"><?php echo htmlspecialchars($organiza["precio"]); ?></a></h1>
                                <h4 class="pt20 pb20"><?php echo htmlspecialchars($organiza["nombre"]); ?></h4>
                                <p class="text-white"><?php echo htmlspecialchars($organiza["descripcion"]); ?></p>
                             
                                <ul class="navbar-nav">
                                <li class="nav-item">
                                        <a class="nav-link" href="ver_articulos.php?id=<?php echo $organiza["id"]; ?>">Ver</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                <?php } ?>

                </div>
            </div>
        </div>
    </div>

    <div class="bg-dark text-light text-center border-top wow fadeIn">
        <p class="mb-0 py-3 text-muted small">&copy; Copyright <script>document.write(new Date().getFullYear())</script> Hecho con <i class="ti-heart text-danger"></i> por <a href="http://devcrud.com">PolloLOCO</a></p>
    </div>
    <!-- end of page footer -->

    <!-- core -->
    <script src="../assets/vendors/jquery/jquery-3.4.1.js"></script>
    <script src="../assets/vendors/bootstrap/bootstrap.bundle.js"></script>

    <!-- bootstrap affix -->
    <script src="../assets/vendors/bootstrap/bootstrap.affix.js"></script>

    <!-- wow.js -->
    <script src="../assets/vendors/wow/wow.js"></script>
    
    <!-- google maps -->
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCtme10pzgKSPeJVJrG1O3tjR6lk98o4w8&callback=initMap"></script>

    <!-- FoodHut js -->
    <script src="../assets/js/foodhut.js"></script>
</body>
</html>

<?php
$registro->free_result();
$sql->close();
?>
