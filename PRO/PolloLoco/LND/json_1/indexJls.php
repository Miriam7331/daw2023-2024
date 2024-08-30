<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="css/estilos.css" rel="stylesheet">
    <title>Carrito de compra - Comida de peces</title>
</head>

<body>

<h1>Factura</h1>
    <table border="1">
        <thead>
            <tr>
                <th>Código</th>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Cantidad</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody id="factura-body">
            <!-- Las filas de la tabla se generarán aquí -->
        </tbody>
    </table>
    <h2>Total de la factura: <span id="total-factura"></span></h2>

    <!-- JS de autor -->
    <script src="js/ejerc2_LS.js"></script>
   

    <!-- JS de Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>