<?php
require('../../helpers/report.php');
require('../../models/categorias.php');

// Se instancia la clase para crear el reporte.
$pdf = new Report;
// Se inicia el reporte con el encabezado del documento.
$pdf->startReport('Productos por categoria');

// Se instancia el módelo Categorías para obtener los datos.
$categoria = new Categorias;
// Se verifica si existen registros (categorías) para mostrar, de lo contrario se imprime un mensaje.
if ($dataCategorias = $categoria->readAll()) {
    // Se recorren los registros ($dataCategorias) fila por fila ($rowCategoria).
    foreach ($dataCategorias as $rowCategoria) {
        // Se establece un color de relleno para mostrar el nombre de la categoría.
        $pdf->SetFillColor(175);
        // Se establece la fuente para el nombre de la categoría.
        $pdf->SetFont('Times', 'B', 12);
        // Se imprime una celda con el nombre de la categoría.
        $pdf->Cell(186, 10, utf8_decode('Cantidad de productos por categoria'), 1, 1, 'C', 1);
            // Se verifica si existen registros (productos) para mostrar, de lo contrario se imprime un mensaje.
            if ($dataCategorias = $categoria->readCategoriarpt()) {
                // Se establece un color de relleno para los encabezados.
                $pdf->SetFillColor(225);
                // Se establece la fuente para los encabezados.
                $pdf->SetFont('Times', 'B', 11);
                // Se imprimen las celdas con los encabezados.
                $pdf->Cell(140, 10, utf8_decode('Nombre de la categoria'), 1, 0, 'C', 1);
                $pdf->Cell(46, 10, utf8_decode('cantidad de productos'), 1, 1, 'C', 1);
                // Se establece la fuente para los datos de los productos.
                $pdf->SetFont('Times', '', 11);
                // Se recorren los registros ($dataProductos) fila por fila ($rowProducto).
                foreach ($dataCategorias as $rowCategoria) {
                    // Se imprimen las celdas con los datos de los productos.
                    $pdf->Cell(140, 10, utf8_decode($rowCategoria['nombre_categoria']), 1, 0);
                    $pdf->Cell(46, 10, utf8_decode($rowCategoria['cantidad']), 1, 1);
                }
            } else {
                $pdf->Cell(0, 10, utf8_decode('No hay compras realizadas en esta fecha'), 1, 1);
            }
    }
} else {
    $pdf->Cell(0, 10, utf8_decode('No hay compras para mostrar'), 1, 1);
}

// Se envía el documento al navegador y se llama al método Footer()
            $pdf->Output();
?>