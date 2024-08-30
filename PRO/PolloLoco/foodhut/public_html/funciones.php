<?php
function conectarBaseDatos() {


    //cambie la contraseña de "majada" a la contraseña que se use en su aplicación o deje el campo vacío ""

    $sql = new mysqli("localhost", "root", "majada", "restaurante");

    if ($sql->connect_error) {
        die("Conexión fallida: " . $sql->connect_error);
    }

    return $sql;
}


?>
