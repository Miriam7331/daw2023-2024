<?php
// ini_set('memory_limit', '1G'); // Incrementa el límite de memoria a 1GB

// require('../fpdf/pdf.php'); // Asegúrate de poner la ruta correcta a fpdf.php
// include '../funciones.php';
// $sql = conectarBaseDatos();

// class PDF extends FPDF
// {
//     function AddProduct($nombre, $precio)
//     {
//         $this->SetFont('Arial', '', 12);
//         $this->Cell(0, 10, "$nombre - $precio €", 0, 1, 'L');
//     }
// }

// $pdf = new PDF();
// $pdf->AddPage();

// $categorias = ['Hamburguesas', 'Pizzas', 'Bocadillos', 'Bebidas'];

// foreach ($categorias as $categoria) {
//     $limit = 100; // Número de productos a recuperar por vez
//     $offset = 0;

//     while (true) {
//         $orden = "SELECT nombre, precio FROM productos WHERE categoria = '$categoria' ORDER BY categoria LIMIT $limit OFFSET $offset";
//         $registro = $sql->query($orden);

//         if ($registro->num_rows == 0) {
//             break; // No más productos en esta categoría
//         }

//         // Añadir título de categoría solo si hay productos
//         if ($offset == 0) {
//             $pdf->SetFont('Arial', 'B', 12);
//             $pdf->Cell(0, 10, $categoria, 0, 1, 'L');
//             $pdf->Ln(4);
//         }

//         while ($row = $registro->fetch_assoc()) {
//             $pdf->AddProduct($row['nombre'], $row['precio']);
//         }

//         // Liberar memoria utilizada por los resultados de la consulta
//         $registro->free_result();

//         $offset += $limit;
//     }

//     $pdf->Ln(10);
// }

// $pdf->Output('D', 'menu.pdf');

// // Cerrar la conexión a la base de datos
// $sql->close();
?>
