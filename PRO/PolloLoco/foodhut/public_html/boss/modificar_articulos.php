<?php
/*
 session_start();
include '../funciones.php';
$sql = conectarBaseDatos();

$organiza = array(); 

if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $registro = $sql->query("SELECT * FROM productos WHERE id=$id");

    if ($registro) { 
        while ($fila = $registro->fetch_assoc()) {
            $organiza = $fila; 
        }
    } else {
        echo "Error en la consulta SQL: " . $sql->error; 
    }
}

if (isset($_POST['modificar'])) {
    $id = $sql->real_escape_string($_POST['id']);
    $nombre = $sql->real_escape_string($_POST['nombre']);
    $descripcion = $sql->real_escape_string($_POST['descripcion']);
    $precio = $sql->real_escape_string($_POST['precio']);
    $imagen = $sql->real_escape_string($_POST['imagen']);
    $categoria = $sql->real_escape_string($_POST['categoria']);
    $alergenos = $sql->real_escape_string($_POST['alergenos']);
    $proveedor = $sql->real_escape_string($_POST['proveedor']);
    $tiempoPreparacion = $sql->real_escape_string($_POST['tiempoPreparacion']);
    
    $updateQuery = "UPDATE productos SET 
        nombre = '$nombre', 
        descripcion = '$descripcion', 
        precio = '$precio', 
        imagen = '$imagen', 
        categoria = '$categoria', 
        alergenos = '$alergenos', 
        proveedor = '$proveedor', 
        tiempoPreparacion = '$tiempoPreparacion' 
        WHERE id = '$id'";

if ($sql->query($updateQuery) === TRUE) {
   // echo "Producto actualizado exitosamente.";
    $registro = $sql->query("SELECT * FROM productos WHERE id=$id");
    if ($registro) {
        while ($fila = $registro->fetch_assoc()) {
            $organiza = $fila; 
        }
    } else {
        echo "Error en la consulta SQL: " . $sql->error; 
    }
} else {
    echo "Error actualizando el producto: " . $sql->error;
}
}

$sql->close();
*/

session_start();
include '../funciones.php';
$sql = conectarBaseDatos();

$organiza = array();

// Obtener datos del producto a modificar si existe el ID en GET
if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $registro = $sql->query("SELECT * FROM productos WHERE id=$id");

    if ($registro) {
        $organiza = $registro->fetch_assoc();
    } else {
        echo "Error en la consulta SQL: " . $sql->error;
    }
}

// Procesar el formulario de modificación
if (isset($_POST['modificar'])) {
    $id = $sql->real_escape_string($_POST['id']);
    $updateQuery = "UPDATE productos SET ";

    // Construir la consulta de actualización dinámicamente según los campos enviados
    $updates = array();
    if (!empty($_POST['nombre'])) {
        $nombre = $sql->real_escape_string($_POST['nombre']);
        $updates[] = "nombre = '$nombre'";
    }
    if (!empty($_POST['descripcion'])) {
        $descripcion = $sql->real_escape_string($_POST['descripcion']);
        $updates[] = "descripcion = '$descripcion'";
    }
    if (!empty($_POST['precio'])) {
        $precio = $sql->real_escape_string($_POST['precio']);
        $updates[] = "precio = '$precio'";
    }
    if (!empty($_POST['imagen'])) {
        $imagen = $sql->real_escape_string($_POST['imagen']);
        $updates[] = "imagen = '$imagen'";
    }
    if (!empty($_POST['categoria'])) {
        $categoria = $sql->real_escape_string($_POST['categoria']);
        $updates[] = "categoria = '$categoria'";
    }
    if (!empty($_POST['alergenos'])) {
        $alergenos = $sql->real_escape_string($_POST['alergenos']);
        $updates[] = "alergenos = '$alergenos'";
    }
    if (!empty($_POST['proveedor'])) {
        $proveedor = $sql->real_escape_string($_POST['proveedor']);
        $updates[] = "proveedor = '$proveedor'";
    }
    if (!empty($_POST['tiempoPreparacion'])) {
        $tiempoPreparacion = $sql->real_escape_string($_POST['tiempoPreparacion']);
        $updates[] = "tiempoPreparacion = '$tiempoPreparacion'";
    }

    // Unir los campos actualizados en la consulta final
    $updateQuery .= implode(", ", $updates);
    $updateQuery .= " WHERE id = '$id'";

    // Ejecutar la consulta de actualización
    if ($sql->query($updateQuery) === TRUE) {
        // Obtener los datos actualizados del producto
        $registro = $sql->query("SELECT * FROM productos WHERE id=$id");
        if ($registro) {
            $organiza = $registro->fetch_assoc();
        } else {
            echo "Error en la consulta SQL: " . $sql->error;
        }
    } else {
        echo "Error actualizando el producto: " . $sql->error;
    }
}

$sql->close();




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
                    <a class="nav-link" href="servicio/profesional.phpe">Personal de servicio</a>
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
        <h2 class="section-title py-5">Cambiar producto</h2>
        <div class="row justify-content-center">
            <div class="col-sm-7 col-md-4 mb-5">

            <form method="POST" action="modificar_articulos.php" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="nombre" class="form-label">Nombre del producto: <?php echo htmlspecialchars($organiza['nombre']); ?></label>
                    <input type="text" class="form-control" name="nombre" value="<?php //echo htmlspecialchars($organiza['nombre']); ?>">
                </div>
                <div class="form-group">
                    <label for="descripcion" class="form-label">Descripción del producto: <?php echo htmlspecialchars($organiza['descripcion']); ?></label>
                    <input type="text" class="form-control" name="descripcion" value="<?php //echo htmlspecialchars($organiza['descripcion']); ?>">
                </div>
                <div class="form-group">
                    <label for="precio" class="form-label">Precio del producto: <?php echo htmlspecialchars($organiza['precio']); ?> €</label>
                    <input type="text" class="form-control" name="precio" value="<?php //echo htmlspecialchars($organiza['precio']); ?>">
                </div>
                <div class="form-group">
                    <label for="imagen" class="form-label">Imagen del producto: <?php echo htmlspecialchars($organiza['imagen']); ?></label>
                    <input type="text" class="form-control" name="imagen" value="<?php //echo htmlspecialchars($organiza['imagen']); ?>">
                </div>
                <div class="form-group">
                    <label for="categoria" class="form-label">Categoría del producto: <?php echo htmlspecialchars($organiza['categoria']); ?></label>
                    <input type="text" class="form-control" name="categoria" value="<?php //echo htmlspecialchars($organiza['categoria']); ?>">
                </div>
                <div class="form-group">
                    <label for="alergenos" class="form-label">Alergenos del producto: <?php echo htmlspecialchars($organiza['alergenos']); ?></label>
                    <input type="text" class="form-control" name="alergenos" value="<?php //echo htmlspecialchars($organiza['alergenos']); ?>">
                </div>
                <div class="form-group">
                    <label for="proveedor" class="form-label">Proveedor del producto: <?php echo htmlspecialchars($organiza['proveedor']); ?></label>
                    <input type="text" class="form-control" name="proveedor" value="<?php //echo htmlspecialchars($organiza['proveedor']); ?>">
                </div>
                <div class="form-group">
                    <label for="tiempoPreparacion" class="form-label">Tiempo de preparación del producto: <?php echo htmlspecialchars($organiza['tiempoPreparacion']); ?></label>
                    <input type="text" class="form-control" name="tiempoPreparacion" value="<?php //echo htmlspecialchars($organiza['tiempoPreparacion']); ?>">
                </div>
                <input type="hidden" name="id" value="<?php echo htmlspecialchars($organiza['id']); ?>">
                <div class="form-group">
                    <button type="submit" name="modificar" class="form-control btn btn-primary">Modificar producto</button><br><br>
                    <a href="ver_articulos.php?id=<?php echo $organiza["id"]; ?>" class="btn btn-outline-secondary">Volver</a>
                </div>
            </form>
            </div>
        </div>
    </div>

    <div class="bg-dark text-light text-center border-top wow fadeIn">
        <p class="mb-0 py-3 text-muted small">&copy; Copyright <script>document.write(new Date().getFullYear())</script> Hecho con <i class="ti-heart text-danger"></i> por <a href="http://devcrud.com">PolloLOCO</a></p>
    </div>

    <!-- core  -->
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
