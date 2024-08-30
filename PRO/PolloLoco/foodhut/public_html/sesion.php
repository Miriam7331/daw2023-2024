<?php

// usuario boss: m
// contraseña boss: m

// usuario cliente: c
//contraseña cliente: c



session_start();

$cuenta = $_POST["cuenta"];
$contrasena = $_POST["contrasena"];

//cambie la contraseña de "majada" a la contraseña que se use en su aplicación o deje el campo vacío ""

$sql = new mysqli("localhost", "root", "majada", "restaurante");


$consulta = $sql->prepare("SELECT * FROM usuario WHERE cuenta='$cuenta' and contrasena='$contrasena'");
$consulta->execute();
$resultado = $consulta->get_result();

if ($resultado->num_rows > 0) {
    while ($fila = $resultado->fetch_assoc()) {
        if ($fila["rol"] == "boss") {
            // Iniciar sesión como boss
            $_SESSION["cuenta"] = $cuenta;
            $_SESSION["rol"] = "boss";
            header("Location: boss/articulos.php");
            exit; 
        } elseif ($fila["rol"] == "cliente") {
            // Iniciar sesión como cliente
            $_SESSION["cuenta"] = $cuenta;
            $_SESSION["rol"] = "cliente";
            header("Location: cliente/productos.php");
            exit; 
        }
    }
} else {
  
    header("Location: registro.php");
}

if ($_GET['session'] == 'logout') {
    session_unset();
    session_destroy();
    header('Location: inicio.php');
}

exit;

?>