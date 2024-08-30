<?php
// session_start();
// if (!isset($_SESSION['rol'])) {
//     header("Location: ../login.php");
//     exit();
// }

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
  
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
 
    <!-- fuente de iconos -->
    <link rel="stylesheet" href="../assets/vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="../assets/vendors/animate/animate.css">

    <!-- Bootstrap + Pollo Loco titulos de menú -->
	<link rel="stylesheet" href="../assets/css/foodhut.css">

    <link href="../assets/css/estilos.css" rel="stylesheet">
  
</head>

<body data-spy="scroll" data-target=".navbar" data-offset="40" id="home">
<nav class="custom-navbar navbar navbar-expand-lg navbar-dark fixed-top" data-spy="affix" data-offset-top="10">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="index.html">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="productos.php">Productos</a>
                </li>
            </ul>
            <a class="navbar-brand m-auto" href="#">
                <img src="../assets/imgs/logo.svg" class="brand-img" alt="PolloLOCO Logo">
                <span class="brand-txt">Pollo LOCO</span>
            </a>
            <ul class="navbar-nav">

<!--  -->

<li class="submenu">
                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
                    <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5M3.102 4l1.313 7h8.17l1.313-7zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4m7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4m-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2m7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2" />
                </svg>
                <!-- Carrito de compra -->
                <div id="carrito" class="row border border-2 border-primary">
                    <div class="col-xs-12">
                        <!-- Tabla donde se agregan los arreglos -->
                        <table id="listaCarrito" class="table table-striped text-center">
                            <thead>
                                <tr>
                                    <th class="h5">Código</th>
                                    <th class="h5">Nombre</th>
                                    <th class="h5">Precio</th>
                                    <th class="h5">Cantidad</th>
                                    <th class="h5">Total</th>
                                    <th class="h5">Quitar</th> <!-- Se utilizará paa borrar cursos   -->
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                        <a href="#" id="vaciarCarrito" class="col-12 mb-2 btn btn-danger btn-lg">Vaciar Carrito</a>
                        <a href="#" id="descargarCompra" class="col-12  mb-2 btn btn-secondary btn-lg">Descargar Compra</a>
                        <a href="#" id="cargarCompraLS" class="d-none col-12  mb-2 btn btn-primary btn-lg">Cargar Compra LS</a>
                        <a href="#" id="cargarCompraEQUIPO" class=" col-12  mb-2 btn btn-primary btn-lg">Cargar Compra desde Equipo</a>
                        <div class="" id="archivos">
                            <input type="file" id="fileInput" />
                            <pre id="fileContent"></pre>
                        </div>
                    </div> <!-- Fin col-xs-12 -->
                </div>
            </li>


<!--  -->


                <li class="nav-item">
                    <a href="#" class="btn btn-primary ml-xl-4">Hola, <?php// echo htmlspecialchars($_SESSION["cuenta"]); ?></a>
                </li>
                <li class="nav-item">
                    <a href="../sesion.php?session=logout" class="btn ml-xl-4">Log out</a>
                </li>
            </ul>
        </div>
    </nav>

    <div id="blog" class="container-fluid bg-dark text-light py-5 text-center wow fadeIn">
        <br><br>
        <h2 class="section-title py-5">¿Qué te apetece hoy?</h2>




        <!-- QUITAR PARA EL EJ CARRITO 1 -->

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

    <!-- Bloque de encabezado -->
    <!-- <div class="d-flex flex-column flex-md-row  justify-content-around align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm text-center text-center">
        <h5 class="my-0 mr-md-auto font-weight-normal">Servicios</h5>
        <nav class="my-2 my-md-0 mr-md-3">
            <a class="p-2 text-dark" href="#">Features</a>
            <a class="p-2 text-dark" href="#">Enterprise</a>
            <a class="p-2 text-dark" href="#">Support</a>
            <a class="p-2 text-dark" href="#">Precios</a>
        </nav> -->
        <!-- Bloque donde comienza el menú donde se encuentra el carrito de compra -->
        <!-- <ul>
            <li class="submenu">
                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
                    <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5M3.102 4l1.313 7h8.17l1.313-7zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4m7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4m-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2m7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2" />
                </svg> -->
                <!-- Carrito de compra -->
                <!-- <div id="carrito" class="row border border-2 border-primary">
                    <div class="col-xs-12"> -->
                        <!-- Tabla donde se agregan los arreglos -->
                        <!-- <table id="listaCarrito" class="table table-striped text-center">
                            <thead>
                                <tr>
                                    <th class="h5">Código</th>
                                    <th class="h5">Nombre</th>
                                    <th class="h5">Precio</th>
                                    <th class="h5">Cantidad</th>
                                    <th class="h5">TotLinea</th>
                                    <th class="h5">X</th> 
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                        <a href="#" id="vaciarCarrito" class="col-12 mb-2 btn btn-danger btn-lg">Vaciar Carrito</a>
                        <a href="#" id="descargarCompra" class="col-12  mb-2 btn btn-secondary btn-lg">Descargar Compra</a>
                        <a href="#" id="cargarCompraLS" class="d-none col-12  mb-2 btn btn-primary btn-lg">Cargar Compra LS</a>
                        <a href="#" id="cargarCompraEQUIPO" class=" col-12  mb-2 btn btn-primary btn-lg">Cargar Compra desde Equipo</a>
                        <div class="" id="archivos">
                            <input type="file" id="fileInput" />
                            <pre id="fileContent"></pre>
                        </div>
                    </div> Fin col-xs-12 -->
                <!-- </div>
            </li>
        </ul>
        <a class="btn btn-outline-primary" href="#">Sign up</a>
    </div> -->
    <!-- Bloque Para colocar alguna publicidad de la empresa -->
    <!-- <div class=" bg-secondary-subtle pricing-header p-3 mb-3 pt-md-5 pb-md-4 mx-auto text-center"> -->
        <!-- <h1 class="display-4 ">Pricing</h1> -->
        <!-- <p class="lead">Elija el precio ideal de la oferta para ser nuestro cliente</p> -->
    <!-- </div> -->
    <!-- Contenedor MAIN del sitio donde están las cards de los precios -->



    <!-- <div class="container"> -->
    <!-- <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="foods" role="tabpanel" aria-labelledby="pills-home-tab">
                <div class="row" >

                <?php //while ($organiza = $registro->fetch_assoc()) { ?>

                    <div class="col-md-4">
                        <div class="card bg-transparent border my-3 my-md-0">
                        <h4 class="my-0 font-weight-normal text-white">Hamburguesa clásica</h4>
                            <img src="<?php //echo htmlspecialchars($organiza["imagen"]); ?>" alt="Producto" class="rounded-0 card-img-top img-responsive"> -->
                            <!-- <div class="card-body">
                                <h1 class="text-center mb-4"><a href="#" class="badge badge-primary"> 7 €<?php// echo htmlspecialchars($organiza["precio"]); ?></a></h1>
                                <h4 class="pt20 pb20"><?php //echo htmlspecialchars($organiza["nombre"]); ?></h4>
                                <p class="text-white"><?php //echo htmlspecialchars($organiza["descripcion"]); ?></p>
                             
                                <ul class="navbar-nav">
                                <li class="nav-item"> -->
                                        <!-- <a class="nav-link" href="ver_articulos.php?id=<?php// echo $organiza["id"]; ?>">Ver</a> -->
                                        <!-- <button type="button" class="btn btn-lg btn-block btn-primary" data-id="6">agregar</button>

                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                <?php// } ?>

                </div>
            </div>
        </div>  -->

        <!-- Fila única que contiene los CARDS -->
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="foods" role="tabpanel" aria-labelledby="pills-home-tab">
                <div class="row">
                <div class="col-md-4">
               
        <div id="productos">
            <!-- <div class="col-3 mx-2 card mb-4 shadow-sm text-center"> -->
            <div class="card bg-transparent border my-3 my-md-0">
                <div class="card-header">
                    <h4 class="my-0 font-weight-normal text-white">Hamburguesa clásica</h4>
                </div>
                <div class="card-body">
                    <!-- <h1 class="card-title pricing-card-title">7.49€ </h1> -->
                    <h1 class="text-center mb-4"><a href="#" class="badge badge-primary"> 7.49 €<?php// echo htmlspecialchars($organiza["precio"]); ?></a></h1>
                    <!-- <h3>/months</h3> -->
                    <h5 class="text-white">cod:<span class="h5 text-white"> 1000001</span></h5>
                    <ul class="list-unstyled mt-3 mb-4 text-white">
                        <li>Jugosa hamburguesa con carne de res, lechuga, tomate, cebolla y mayonesa</li>
                        <!-- <li>2 GB of storage</li>
                        <li>Email support</li>
                        <li>Help center access</li> -->
                    </ul>
                    <button type="button" class="btn btn-lg btn-block btn-primary" data-id="1">agregar</button>
                </div>
            </div>

            <div class="card bg-transparent border my-3 my-md-0">
                <div class="card-header">
                    <h4 class="my-0 font-weight-normal text-white">Hamburguesa BBQ</h4>
                </div>
                <div class="card-body">
                    <!-- <h1 class="card-title pricing-card-title">7.49€ </h1> -->
                    <h1 class="text-center mb-4"><a href="#" class="badge badge-primary"> 8.99 €<?php// echo htmlspecialchars($organiza["precio"]); ?></a></h1>
                    <!-- <h3>/months</h3> -->
                    <h5 class="text-white">cod:<span class="h5 text-white"> 1000002</span></h5>
                    <ul class="list-unstyled mt-3 mb-4 text-white">
                        <li>Hamburguesa con carne de res, queso cheddar, cebolla caramelizada y salsa BBQ</li>
                        <!-- <li>2 GB of storage</li>
                        <li>Email support</li>
                        <li>Help center access</li> -->
                    </ul>
                    <button type="button" class="btn btn-lg btn-block btn-primary" data-id="2">agregar</button>
                </div>
            </div>










<!-- 

            <div class="col-3 mx-2 card mb-4 shadow-sm text-center">
                <div class="card-header">
                    <h4 class="my-0 font-weight-normal">Pro</h4>
                </div>
                <div class="card-body">
                    <h1 class="card-title pricing-card-title">15€ </h1>
                    <h3>/months</h3>
                    <h5>cod:<span class="h5"> 1000002</span></h5>
                    <ul class="list-unstyled mt-3 mb-4">
                        <li>20 users included</li>
                        <li>10 GB of storage</li>
                        <li>Priority email support</li>
                        <li>Help center access</li>
                    </ul>
                    <button type="button" class="btn btn-lg btn-primary" data-id="2">agregar</button>
                </div>
            </div>
            <div class="col-3 mx-2 card mb-4 shadow-sm text-center">
                <div class="card-header">
                    <h4 class="my-0 font-weight-normal">Enterprise</h4>
                </div>
                <div class="card-body">
                    <h1 class="card-title pricing-card-title">30€ </h1>
                    <h3>/months</h3>
                    <h5>cod:<span class="h5"> 1000003</span></h5>
                    <ul class="list-unstyled mt-3 mb-4">
                        <li>30 users included</li>
                        <li>15 GB of storage</li>
                        <li>Phone and email support</li>
                        <li>Help center access</li>
                    </ul>
                    <button type="button" class="btn btn-lg btn-block btn-primary" data-id="3">agregar</button>
                </div>
            </div>
            <div class="col-3 mx-2 card mb-4 shadow-sm text-center">
                <div class="card-header">
                    <h4 class="my-0 font-weight-normal">Pro - Special</h4>
                </div>
                <div class="card-body">
                    <h1 class="card-title pricing-card-title">45€ </h1>
                    <h3>/months</h3>
                    <h5>cod:<span class="h5"> 1000004</span></h5>
                    <ul class="list-unstyled mt-3 mb-4">
                        <li>50 users included</li>
                        <li>25 GB of storage</li>
                        <li>Priority email support</li>
                        <li>Help center access</li>
                    </ul>
                    <button type="button" class="btn btn-lg btn-block btn-primary" data-id="4">agregar</button>
                </div>
            </div>
            <div class="col-3 mx-2 card mb-4 shadow-sm text-center text-center text-center">
                <div class="card-header">
                    <h4 class="my-0 font-weight-normal">Master</h4>
                </div>
                <div class="card-body">
                    <h1 class="card-title pricing-card-title">65€ </h1>
                    <h3>/months</h3>
                    <h5>cod:<span class="h5"> 1000005</span></h5>
                    <ul class="list-unstyled mt-3 mb-4">
                        <li>80 users included</li>
                        <li>50 GB of storage</li>
                        <li>Phone / Whatsapp and email support</li>
                        <li>Help center access & more</li>
                    </ul>
                    <button type="button" class="btn btn-lg btn-block btn-primary" data-id="5">agregar</button>
                </div>
            </div> -->
        </div> <!-- Fin del ROW -->
    </div>

    </div>
            </div>
        </div>
        </div>
        </div>

    <!-- Inicio del FOOTER con enlaces a los datos más relevantes de la empresa -->
    <!-- <footer class=" bg-secondary-subtle my-md-5 pt-md-5 border-top">
        <div class="row d-flex justify-content-evenly">
            <div class="col-3">
                <h5>Features</h5>
                <ul class="list-unstyled text-small">
                    <li><a class="text-muted" href="#">Cool stuff</a></li>
                    <li><a class="text-muted" href="#">Random feature</a></li>
                    <li><a class="text-muted" href="#">Team feature</a></li>
                    <li><a class="text-muted" href="#">Stuff for developers</a></li>
                    <li><a class="text-muted" href="#">Another one</a></li>
                    <li><a class="text-muted" href="#">Last time</a></li>
                </ul>
            </div>
            <div class="col-3">
                <h5>Resources</h5>
                <ul class="list-unstyled text-small">
                    <li><a class="text-muted" href="#">Resource</a></li>
                    <li><a class="text-muted" href="#">Resource name</a></li>
                    <li><a class="text-muted" href="#">Another resource</a></li>
                    <li><a class="text-muted" href="#">Final resource</a></li>
                </ul>
            </div>
            <div class="col-3">
                <h5>About</h5>
                <ul class="list-unstyled text-small">
                    <li><a class="text-muted" href="#">Team</a></li>
                    <li><a class="text-muted" href="#">Locations</a></li>
                    <li><a class="text-muted" href="#">Privacy</a></li>
                    <li><a class="text-muted" href="#">Terms</a></li>
                </ul>
            </div>
        </div>
    </footer> -->





    <!-- JS de autor -->
    <!-- <script src="js/script_v2.js"></script> -->
    <!-- <script src="js/script_v3_JsonCt.js"></script> -->
    <script src="../assets/js/carrito.js"></script>
    <!-- <script src="js/ejerc1_LS.js"></script> -->

    <!-- JS de Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

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
