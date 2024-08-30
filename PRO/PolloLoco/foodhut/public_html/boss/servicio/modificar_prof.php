<?php
/*
 session_start();
include '../../funciones.php';
$sql = conectarBaseDatos();

$organiza = array(); 

if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $registro = $sql->query("SELECT * FROM usuario WHERE id=$id");

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
    $cuenta = $sql->real_escape_string($_POST['cuenta']);
    $nombre = $sql->real_escape_string($_POST['nombre']);
    $apellidos = $sql->real_escape_string($_POST['apellidos']);
    $contrasena = $sql->real_escape_string($_POST['contrasena']);
    $email = $sql->real_escape_string($_POST['email']);
    $telefono = $sql->real_escape_string($_POST['telefono']);
    $ciudad = $sql->real_escape_string($_POST['ciudad']);
    $cp = $sql->real_escape_string($_POST['cp']);
    $calle = $sql->real_escape_string($_POST['calle']);
    $numero = $sql->real_escape_string($_POST['numero']);
    $piso = $sql->real_escape_string($_POST['piso']);
    $letra = $sql->real_escape_string($_POST['letra']);
    $rol = $sql->real_escape_string($_POST['rol']);

    
    $updateQuery = "UPDATE usuario SET 
        cuenta = '$cuenta', 
        nombre = '$nombre', 
        apellidos = '$apellidos', 
        contrasena = '$contrasena', 
        email = '$email', 
        telefono = '$telefono', 
        ciudad = '$ciudad', 
        cp = '$cp', 
        calle = '$calle', 
        numero = '$numero', 
        piso = '$piso', 
        letra = '$letra', 
        rol = '$rol' 
        WHERE id = '$id'";

    if ($sql->query($updateQuery) === TRUE) {
        $registro = $sql->query("SELECT * FROM usuario WHERE id=$id");
        if ($registro) {
            $organiza = $registro->fetch_assoc();
        } else {
            echo "Error en la consulta SQL: " . $sql->error; 
        }
    } else {
        echo "Error actualizando el empleado: " . $sql->error;
    }
}

$sql->close();

*/

session_start();
include '../../funciones.php';
$sql = conectarBaseDatos();

$organiza = array();

// Obtener datos del empleado a modificar si existe el ID en GET
if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $registro = $sql->query("SELECT * FROM usuario WHERE id=$id");

    if ($registro) {
        $organiza = $registro->fetch_assoc();
    } else {
        echo "Error en la consulta SQL: " . $sql->error;
    }
}

// Procesar el formulario de modificación
if (isset($_POST['modificar'])) {
    $id = $sql->real_escape_string($_POST['id']);
    $updateQuery = "UPDATE usuario SET ";

    // Construir la consulta de actualización dinámicamente según los campos enviados
    $updates = array();
    if (!empty($_POST['cuenta'])) {
        $cuenta = $sql->real_escape_string($_POST['cuenta']);
        $updates[] = "cuenta = '$cuenta'";
    }
    if (!empty($_POST['nombre'])) {
        $nombre = $sql->real_escape_string($_POST['nombre']);
        $updates[] = "nombre = '$nombre'";
    }
    if (!empty($_POST['apellidos'])) {
        $apellidos = $sql->real_escape_string($_POST['apellidos']);
        $updates[] = "apellidos = '$apellidos'";
    }
    if (!empty($_POST['contrasena'])) {
        $contrasena = $sql->real_escape_string($_POST['contrasena']);
        $updates[] = "contrasena = '$contrasena'";
    }
    if (!empty($_POST['email'])) {
        $email = $sql->real_escape_string($_POST['email']);
        $updates[] = "email = '$email'";
    }
    if (!empty($_POST['telefono'])) {
        $telefono = $sql->real_escape_string($_POST['telefono']);
        $updates[] = "telefono = '$telefono'";
    }
    if (!empty($_POST['ciudad'])) {
        $ciudad = $sql->real_escape_string($_POST['ciudad']);
        $updates[] = "ciudad = '$ciudad'";
    }
    if (!empty($_POST['cp'])) {
        $cp = $sql->real_escape_string($_POST['cp']);
        $updates[] = "cp = '$cp'";
    }
    if (!empty($_POST['calle'])) {
        $calle = $sql->real_escape_string($_POST['calle']);
        $updates[] = "calle = '$calle'";
    }
    if (!empty($_POST['numero'])) {
        $numero = $sql->real_escape_string($_POST['numero']);
        $updates[] = "numero = '$numero'";
    }
    if (!empty($_POST['piso'])) {
        $piso = $sql->real_escape_string($_POST['piso']);
        $updates[] = "piso = '$piso'";
    }
    if (!empty($_POST['letra'])) {
        $letra = $sql->real_escape_string($_POST['letra']);
        $updates[] = "letra = '$letra'";
    }
    if (!empty($_POST['rol'])) {
        $rol = $sql->real_escape_string($_POST['rol']);
        $updates[] = "rol = '$rol'";
    }

    // Unir los campos actualizados en la consulta final
    $updateQuery .= implode(", ", $updates);
    $updateQuery .= " WHERE id = '$id'";

    // Ejecutar la consulta de actualización
    if ($sql->query($updateQuery) === TRUE) {
        // Obtener los datos actualizados del empleado
        $registro = $sql->query("SELECT * FROM usuario WHERE id=$id");
        if ($registro) {
            $organiza = $registro->fetch_assoc();
        } else {
            echo "Error en la consulta SQL: " . $sql->error;
        }
    } else {
        echo "Error actualizando el empleado: " . $sql->error;
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
                    <a class="nav-link" href="profesional.php">Personal de servicio</a>
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
        <h2 class="section-title py-5">Cambiar datos del empleado</h2>
        <div class="row justify-content-center">
            <div class="col-sm-7 col-md-4 mb-5">

            <form method="POST" action="modificar_prof.php" enctype="multipart/form-data">
            <div class="form-group">
                    <label for="nombre" class="form-label">Cuenta del empleado: <?php echo htmlspecialchars($organiza['cuenta']); ?></label>
                    <input type="text" class="form-control" name="cuenta" value="<?php //echo htmlspecialchars($organiza['cuenta']); ?>">
                </div>
                <div class="form-group">
                    <label for="nombre" class="form-label">Nueva contraseña del empleado: <?php //echo htmlspecialchars($organiza['contrasena']); ?></label>
                    <input type="text" class="form-control" name="contrasena" value="<?php //echo htmlspecialchars($organiza['contrasena']); ?>">
                </div>
                <div class="form-group">
                    <label for="nombre" class="form-label">Nombre del empleado: <?php echo htmlspecialchars($organiza['nombre']); ?></label>
                    <input type="text" class="form-control" name="nombre" value="<?php //echo htmlspecialchars($organiza['nombre']); ?>">
                </div>
                <div class="form-group">
                    <label for="descripcion" class="form-label">Apellidos del empleado: <?php echo htmlspecialchars($organiza['apellidos']); ?></label>
                    <input type="text" class="form-control" name="apellidos" value="<?php //echo htmlspecialchars($organiza['apellidos']); ?>">
                </div>
                <div class="form-group">
                    <label for="precio" class="form-label">Email del empleado: <?php echo htmlspecialchars($organiza['email']); ?></label>
                    <input type="text" class="form-control" name="email" value="<?php //echo htmlspecialchars($organiza['precio']); ?>">
                </div>
                <div class="form-group">
                    <label for="imagen" class="form-label">Teléfono del empleado: <?php echo htmlspecialchars($organiza['telefono']); ?></label>
                    <input type="text" class="form-control" name="telefono" value="<?php //echo htmlspecialchars($organiza['imagen']); ?>">
                </div>
                <div class="form-group">
                    <label for="categoria" class="form-label">Ciudad del empleado: <?php echo htmlspecialchars($organiza['ciudad']); ?></label>
                    <input type="text" class="form-control" name="ciudad" value="<?php //echo htmlspecialchars($organiza['categoria']); ?>">
                </div>
                <div class="form-group">
                    <label for="alergenos" class="form-label">Código postal del empleado: <?php echo htmlspecialchars($organiza['cp']); ?></label>
                    <input type="text" class="form-control" name="cp" value="<?php //echo htmlspecialchars($organiza['alergenos']); ?>">
                </div>
                <div class="form-group">
                    <label for="proveedor" class="form-label">Calle del empleado: <?php echo htmlspecialchars($organiza['calle']); ?></label>
                    <input type="text" class="form-control" name="calle" value="<?php //echo htmlspecialchars($organiza['calle']); ?>">
                </div>
                <div class="form-group">
                    <label for="tiempoPreparacion" class="form-label">Número calle del empleado: <?php echo htmlspecialchars($organiza['numero']); ?></label>
                    <input type="text" class="form-control" name="numero" value="<?php //echo htmlspecialchars($organiza['numero']); ?>">
                </div>
                <div class="form-group">
                    <label for="tiempoPreparacion" class="form-label">Piso del empleado: <?php echo htmlspecialchars($organiza['piso']); ?></label>
                    <input type="text" class="form-control" name="piso" value="<?php //echo htmlspecialchars($organiza['numero']); ?>">
                </div>
                <div class="form-group">
                    <label for="tiempoPreparacion" class="form-label">Letra del empleado: <?php echo htmlspecialchars($organiza['letra']); ?></label>
                    <input type="text" class="form-control" name="letra" value="<?php //echo htmlspecialchars($organiza['numero']); ?>">
                </div>
                <!-- <div class="form-group">
                    <label for="tiempoPreparacion" class="form-label">Rol del empleado: <?php //echo htmlspecialchars($organiza['rol']); ?></label>
                    <input type="text" class="form-control" name="rol" value="<?php //echo htmlspecialchars($organiza['numero']); ?>">
                </div> -->
                <div class="form-group">
                    <label for="rol" class="form-label">Rol del empleado:</label>
                    <select class="form-control" name="rol" id="rol">
                        <option value="cocina" <?php echo ($organiza['rol'] == 'cocina') ? 'selected' : ''; ?>>Cocina</option>
                        <option value="reparto" <?php echo ($organiza['rol'] == 'reparto') ? 'selected' : ''; ?>>Reparto</option>
                    </select>
                </div>










                <input type="hidden" name="id" value="<?php echo htmlspecialchars($organiza['id']); ?>">
                <div class="form-group">
                    <button type="submit" name="modificar" class="form-control btn btn-primary">Modificar datos del empleado</button><br><br>
                    <a href="ver_prof.php?id=<?php echo $organiza["id"]; ?>" class="btn btn-outline-secondary">Volver</a>
                </div>
            </form>
            </div>
        </div>
    </div>

    <div class="bg-dark text-light text-center border-top wow fadeIn">
        <p class="mb-0 py-3 text-muted small">&copy; Copyright <script>document.write(new Date().getFullYear())</script> Hecho con <i class="ti-heart text-danger"></i> por <a href="http://devcrud.com">PolloLOCO</a></p>
    </div>

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
