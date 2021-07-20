<?php
require('../../helpers/report.php');
require('../../models/productos.php');

// Se instancia la clase para crear el reporte.
$pdf = new Report;
// Se inicia el reporte con el encabezado del documento.
$pdf->startReport('Productos por precio');

// Se instancia el módelo Categorías para obtener los datos.
$producto = new Productos;
// Se verifica si existen registros (categorías) para mostrar, de lo contrario se imprime un mensaje.
if ($dataProductos = $producto->readAll()) {
    // Se recorren los registros ($dataCategorias) fila por fila ($rowCategoria).
    foreach ($dataProductos as $rowProducto) {
        // Se establece un color de relleno para mostrar el nombre de la categoría.
        $pdf->SetFillColor(175);
        // Se establece la fuente para el nombre de la categoría.
        $pdf->SetFont('Times', 'B', 12);
        // Se imprime una celda con el nombre de la categoría.
        $pdf->Cell(0, 10, utf8_decode('Precio: '.$rowProducto['precio_producto']), 1, 1, 'C', 1);
        // Se establece la categoría para obtener sus productos, de lo contrario se imprime un mensaje de error.
        if ($producto->setId($rowProducto['id_producto'])) {
            // Se verifica si existen registros (productos) para mostrar, de lo contrario se imprime un mensaje.
            if ($dataProductoss = $producto->readPrecioProducto()) {
                // Se establece un color de relleno para los encabezados.
                $pdf->SetFillColor(225);
                // Se establece la fuente para los encabezados.
                $pdf->SetFont('Times', 'B', 11);
                // Se imprimen las celdas con los encabezados.
                $pdf->Cell(60, 10, utf8_decode('Nombre del producto'), 1, 0, 'C', 1);
                $pdf->Cell(80, 10, utf8_decode('Descripción del producto'), 1, 0, 'C', 1);
                $pdf->Cell(46, 10, utf8_decode('Categoría'), 1, 1, 'C', 1);
                // Se establece la fuente para los datos de los productos.
                $pdf->SetFont('Times', '', 11);
                // Se recorren los registros ($dataProductos) fila por fila ($rowProducto).
                foreach ($dataProductoss as $rowProductos) {
                    // Se imprimen las celdas con los datos de los productos.
                    $pdf->Cell(60, 10, utf8_decode($rowProductos['nombre_producto']), 1, 0);
                    $pdf->Cell(80, 10, utf8_decode($rowProductos['descripcion']), 1, 0);
                    $pdf->Cell(46, 10, utf8_decode($rowProductos['nombre_categoria']), 1, 1);
                }
            } else {
                $pdf->Cell(0, 10, utf8_decode('No hay productos registrados con este precio'), 1, 1);
            }
        } else {
            $pdf->Cell(0, 10, utf8_decode('Producto incorrect o inexistente'), 1, 1);
        }
    }
} else {
    $pdf->Cell(0, 10, utf8_decode('No hay productos para mostrar'), 1, 1);
}

// Se envía el documento al navegador y se llama al método Footer()
$pdf->Output();
?>