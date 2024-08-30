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
      <!-- Barra de navegación personalizada -->
    <nav class="custom-navbar navbar navbar-expand-lg navbar-dark fixed-top" data-spy="affix" data-offset-top="10">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
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
                <li class="nav-item">
                    <a class="nav-link" href="ver_perfil.php">Ver perfil</a>
                </li>
            </ul>
                <!-- Marca del sitio web con el logo -->
            <a class="navbar-brand m-auto" href="#">
                <img src="../assets/imgs/logo.svg" class="brand-img" alt="PolloLOCO Logo">
                <span class="brand-txt">Pollo LOCO</span>
            </a>
            <ul class="navbar-nav">
                <li class="nav-item submenu">
                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
                        <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5M3.102 4l1.313 7h8.17l1.313-7zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4m7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4m-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2m7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2" />
                    </svg>
                    <!-- Carrito de compra -->
                    <div id="carrito" class="row border border-2 border-primary">
                        <div class="col-xs-12">
                            <!-- Tabla donde se agregan los productos -->
                            <table id="listaCarrito" class="table table-striped text-center">
                                <thead>
                                    <tr>
                                        <th class="h5">Código</th>
                                        <th class="h5">Nombre</th>
                                        <th class="h5">Precio</th>
                                        <th class="h5">Cantidad</th>
                                        <th class="h5">Total</th>
                                        <th class="h5">Quitar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Contenido dinámico del carrito -->
                                </tbody>
                            </table>
                            <a href="#" id="vaciarCarrito" class="col-12 mb-2 btn btn-danger btn-lg">Vaciar Carrito</a>
                            <a href="#" id="descargarCompra" class="col-12 mb-2 btn btn-secondary btn-lg">Descargar Compra</a>
                            <a href="#" id="cargarCompraLS" class="d-none col-12 mb-2 btn btn-primary btn-lg">Cargar Compra LS</a>
                            <a href="#" id="cargarCompraEQUIPO" class="col-12 mb-2 btn btn-primary btn-lg">Cargar Compra desde Equipo</a>
                            <div id="archivos">
                                <input type="file" id="fileInput" />
                                <pre id="fileContent"></pre>
                            </div>
                        </div> <!-- Fin col-xs-12 -->
                    </div>
                </li>
                <li class="nav-item">
                    <a href="#" class="btn btn-primary ml-xl-4">Hola, Cliente A</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="btn ml-xl-4">Log out</a>
                </li>
            </ul>
        </div>
    </nav>
    <!-- Sección principal de productos -->
    <div id="blog" class="container-fluid bg-dark text-light py-5 text-center wow fadeIn"><br><br>
        <h2 class="section-title py-5">¿Qué te apetece hoy?</h2>
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="foods" role="tabpanel" aria-labelledby="pills-home-tab">
                  <!-- Contenedor de los productos -->
                <div class="row" id="productos">
                     <!-- Producto individual -->
                    <div class="col-md-4">
                        <div class="card bg-transparent border my-3">
                            <div class="card-header">
                                <h4 class="my-0 font-weight-normal text-white">Hamburguesa clásica</h4>
                            </div>
                            <div class="card-body">
                                <h1 class="text-center mb-4"><a href="#" class="badge badge-primary">7.49 €</a></h1>
                                <h5 class="text-white">cod:<span class="h5 text-white"> 1000001</span></h5>
                                <ul class="list-unstyled mt-3 mb-4 text-white">
                                    <li>Jugosa hamburguesa con carne de res, lechuga, tomate, cebolla y mayonesa</li>
                                </ul>
                                <button type="button" class="btn btn-lg btn-block btn-primary" data-id="1">agregar</button>
                            </div>
                        </div>
                    </div>
 <!-- Producto individual -->
                    <div class="col-md-4">
                        <div class="card bg-transparent border my-3">
                            <div class="card-header">
                                <h4 class="my-0 font-weight-normal text-white">Hamburguesa BBQ</h4>
                            </div>
                            <div class="card-body">
                                <h1 class="text-center mb-4"><a href="#" class="badge badge-primary">8.99 €</a></h1>
                                <h5 class="text-white">cod:<span class="h5 text-white"> 1000002</span></h5>
                                <ul class="list-unstyled mt-3 mb-4 text-white">
                                    <li>Hamburguesa con carne de res, queso cheddar, cebolla caramelizada y salsa BBQ</li>
                                </ul>
                                <button type="button" class="btn btn-lg btn-block btn-primary" data-id="2">agregar</button>
                            </div>
                        </div>
                    </div>
 <!-- Producto individual -->
                    <div class="col-md-4">
                        <div class="card bg-transparent border my-3">
                            <div class="card-header">
                                <h4 class="my-0 font-weight-normal text-white">Hamburguesa Vegana</h4>
                            </div>
                            <div class="card-body">
                                <h1 class="text-center mb-4"><a href="#" class="badge badge-primary">10.99 €</a></h1>
                                <h5 class="text-white">cod:<span class="h5 text-white"> 1000003</span></h5>
                                <ul class="list-unstyled mt-3 mb-4 text-white">
                                    <li>Hamburguesa con patty de garbanzos, aguacate, lechuga y tomate</li>
                                </ul>
                                <button type="button" class="btn btn-lg btn-block btn-primary" data-id="3">agregar</button>
                            </div>
                        </div>
                    </div>
 <!-- Producto individual -->
                    <div class="col-md-4">
                        <div class="card bg-transparent border my-3">
                            <div class="card-header">
                                <h4 class="my-0 font-weight-normal text-white">Bocadillo de Jamón</h4>
                            </div>
                            <div class="card-body">
                                <h1 class="text-center mb-4"><a href="#" class="badge badge-primary">5.99 €</a></h1>
                                <h5 class="text-white">cod:<span class="h5 text-white"> 1000004</span></h5>
                                <ul class="list-unstyled mt-3 mb-4 text-white">
                                    <li>Bocadillo con jamón serrano, tomate y aceite de oliva</li>
                                </ul>
                                <button type="button" class="btn btn-lg btn-block btn-primary" data-id="4">agregar</button>
                            </div>
                        </div>
                    </div>
 <!-- Producto individual -->
                    <div class="col-md-4">
                        <div class="card bg-transparent border my-3">
                            <div class="card-header">
                                <h4 class="my-0 font-weight-normal text-white">Bocadillo Vegetal</h4>
                            </div>
                            <div class="card-body">
                                <h1 class="text-center mb-4"><a href="#" class="badge badge-primary">4.99 €</a></h1>
                                <h5 class="text-white">cod:<span class="h5 text-white"> 1000005</span></h5>
                                <ul class="list-unstyled mt-3 mb-4 text-white">
                                    <li>Bocadillo con lechuga, tomate, huevo cocido y mayonesa</li>
                                </ul>
                                <button type="button" class="btn btn-lg btn-block btn-primary" data-id="5">agregar</button>
                            </div>
                        </div>
                    </div>
 <!-- Producto individual -->
                    <div class="col-md-4">
                        <div class="card bg-transparent border my-3">
                            <div class="card-header">
                                <h4 class="my-0 font-weight-normal text-white">Pizza Pepperoni</h4>
                            </div>
                            <div class="card-body">
                                <h1 class="text-center mb-4"><a href="#" class="badge badge-primary">10.99 €</a></h1>
                                <h5 class="text-white">cod:<span class="h5 text-white"> 1000006</span></h5>
                                <ul class="list-unstyled mt-3 mb-4 text-white">
                                    <li>Pizza con salsa de tomate, mozzarella y pepperoni</li>
                                </ul>
                                <button type="button" class="btn btn-lg btn-block btn-primary" data-id="6">agregar</button>
                            </div>
                        </div>
                    </div>
 <!-- Producto individual -->
                    <div class="col-md-4">
                        <div class="card bg-transparent border my-3">
                            <div class="card-header">
                                <h4 class="my-0 font-weight-normal text-white">Pizza Cuatro Quesos</h4>
                            </div>
                            <div class="card-body">
                                <h1 class="text-center mb-4"><a href="#" class="badge badge-primary">11.99 €</a></h1>
                                <h5 class="text-white">cod:<span class="h5 text-white"> 1000007</span></h5>
                                <ul class="list-unstyled mt-3 mb-4 text-white">
                                    <li>Pizza con una mezcla de mozzarella, gorgonzola, parmesano y queso de cabra</li>
                                </ul>
                                <button type="button" class="btn btn-lg btn-block btn-primary" data-id="7">agregar</button>
                            </div>
                        </div>
                    </div>
 <!-- Producto individual -->
                    <div class="col-md-4">
                        <div class="card bg-transparent border my-3">
                            <div class="card-header">
                                <h4 class="my-0 font-weight-normal text-white">Coca Cola</h4>
                            </div>
                            <div class="card-body">
                                <h1 class="text-center mb-4"><a href="#" class="badge badge-primary">1.99 €</a></h1>
                                <h5 class="text-white">cod:<span class="h5 text-white"> 1000008</span></h5>
                                <ul class="list-unstyled mt-3 mb-4 text-white">
                                    <li>Refresco de cola</li>
                                </ul>
                                <button type="button" class="btn btn-lg btn-block btn-primary" data-id="8">agregar</button>
                            </div>
                        </div>
                    </div>
 <!-- Producto individual -->
                    <div class="col-md-4">
                        <div class="card bg-transparent border my-3">
                            <div class="card-header">
                                <h4 class="my-0 font-weight-normal text-white">Zumo de Naranja</h4>
                            </div>
                            <div class="card-body">
                                <h1 class="text-center mb-4"><a href="#" class="badge badge-primary">2.99 €</a></h1>
                                <h5 class="text-white">cod:<span class="h5 text-white"> 1000009</span></h5>
                                <ul class="list-unstyled mt-3 mb-4 text-white">
                                    <li>Zumo de naranja recién exprimido</li>
                                </ul>
                                <button type="button" class="btn btn-lg btn-block btn-primary" data-id="9">agregar</button>
                            </div>
                        </div>
                    </div>
 <!-- Producto individual -->
                    <div class="col-md-4">
                        <div class="card bg-transparent border my-3">
                            <div class="card-header">
                                <h4 class="my-0 font-weight-normal text-white">Agua Mineral</h4>
                            </div>
                            <div class="card-body">
                                <h1 class="text-center mb-4"><a href="#" class="badge badge-primary">1.49 €</a></h1>
                                <h5 class="text-white">cod:<span class="h5 text-white"> 1000010</span></h5>
                                <ul class="list-unstyled mt-3 mb-4 text-white">
                                    <li>Botella de agua mineral</li>
                                </ul>
                                <button type="button" class="btn btn-lg btn-block btn-primary" data-id="10">agregar</button>
                            </div>
                        </div>
                    </div>

                
                </div>
            </div>
        </div>
    </div>
    
    <script src="../assets/js/carrito.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <footer>
        <div class="bg-dark text-light text-center border-top wow fadeIn">
            <p class="mb-0 py-3 text-muted small">&copy; Copyright <script>document.write(new Date().getFullYear())</script> Hecho con <i class="ti-heart text-danger"></i> por <a href="http://devcrud.com">PolloLOCO</a></p>
        </div>
    </footer>
    <script src="../assets/vendors/jquery/jquery-3.4.1.js"></script>
    <script src="../assets/vendors/bootstrap/bootstrap.bundle.js"></script>
    <script src="../assets/vendors/wow/wow.js"></script>
    <script src="../assets/js/foodhut.js"></script>
</body>
</html>
