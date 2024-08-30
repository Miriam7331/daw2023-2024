<?php
 session_start();
include '../funciones.php';
$sql = conectarBaseDatos();

$organiza = null; // Inicializamos $organiza como null
$mensaje = ""; // Inicializamos la variable mensaje

if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $consulta = "SELECT * FROM productos WHERE id = ?";
    $stmt = $sql->prepare($consulta);

    if ($stmt) {
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $resultado = $stmt->get_result();

        if ($resultado->num_rows > 0) {
            $organiza = $resultado->fetch_assoc();
        } else {
            echo "Producto no encontrado.";
        }

        $stmt->close();
    } else {
        echo "Error en la preparación de la consulta: " . $sql->error;
    }
}

if (isset($_GET["confirmar"]) && $_GET["confirmar"] === "si") {
    if ($organiza) {
        $id = $organiza["id"];
        $consulta = "DELETE FROM productos WHERE id = ?";
        $stmt = $sql->prepare($consulta);

        if ($stmt) {
            $stmt->bind_param("i", $id);
            $resultado = $stmt->execute();

            if ($resultado) {
                $mensaje = "Producto eliminado con éxito.";
                echo "<script>alert('$mensaje'); window.location.href = 'articulos.php';</script>"; // Alerta de eliminación exitosa con botón de redirección
            } else {
                echo "Error en BORRADO SQL: " . $stmt->error; // Mostramos el mensaje de error
            }

            $stmt->close();
        } else {
            echo "Error en la preparación de la consulta: " . $sql->error;
        }
    } else {
        echo "No se ha especificado un producto válido para eliminar.";
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

    <!-- Sesión BLOG -->
    <div id="blog" class="container-fluid bg-dark text-light py-5 text-center wow fadeIn">
        <br><br>
        <?php if ($organiza) { ?>
            <h2 class="section-title py-5"><?php echo $organiza["nombre"]; ?></h2>
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="foods" role="tabpanel" aria-labelledby="pills-home-tab">
                    <div class="row">
                        <div class="col-md-11">
                            <div class="card bg-transparent border my-3 my-md-0">
                            <form method="GET" action="borrar_articulos.php">
                                <div class="overlay text-white text-center">
                                    <h3 class="display-6 font-weight-bold my-3">¿Desea eliminar <?php echo $organiza["nombre"]; ?>?</h3>
                                </div>
                                <ul class="navbar-nav">
                                    <li class="nav-item">
                                        <a class="nav-link" href="borrar_articulos.php?id=<?php echo $organiza["id"]; ?>&confirmar=si">si</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="articulos.php">no</a>
                                    </li>
                                </ul>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
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