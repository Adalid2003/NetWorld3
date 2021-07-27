<?php
require('../../helpers/report.php');
require('../../models/compras.php');

// Se instancia la clase para crear el reporte.
$pdf = new Report;
// Se inicia el reporte con el encabezado del documento.
$pdf->startReport('Compras finalizadas por fecha');

// Se instancia el módelo Categorías para obtener los datos.
$compra = new Compras;
// Se verifica si existen registros (categorías) para mostrar, de lo contrario se imprime un mensaje.
if ($dataCompras = $compra->readAll()) {
    // Se recorren los registros ($dataCategorias) fila por fila ($rowCategoria).
    foreach ($dataCompras as $rowCompra) {
        // Se establece un color de relleno para mostrar el nombre de la categoría.
        $pdf->SetFillColor(175);
        // Se establece la fuente para el nombre de la categoría.
        $pdf->SetFont('Times', 'B', 12);
        // Se imprime una celda con el nombre de la categoría.
        $pdf->Cell(0, 10, utf8_decode('Fecha: '.$rowCompra['fecha_compra']), 1, 1, 'C', 1);
        // Se establece la categoría para obtener sus productos, de lo contrario se imprime un mensaje de error.
        if ($compra->setId($rowCompra['id_compra'])) {
            // Se verifica si existen registros (productos) para mostrar, de lo contrario se imprime un mensaje.
            if ($dataComprass = $compra->readCompraFecha()) {
                // Se establece un color de relleno para los encabezados.
                $pdf->SetFillColor(225);
                // Se establece la fuente para los encabezados.
                $pdf->SetFont('Times', 'B', 11);
                // Se imprimen las celdas con los encabezados.
                $pdf->Cell(46, 10, utf8_decode('Código de compra'), 1, 0, 'C', 1);
                $pdf->Cell(140, 10, utf8_decode('Nombre del cliente'), 1, 1, 'C', 1);
                // Se establece la fuente para los datos de los productos.
                $pdf->SetFont('Times', '', 11);
                // Se recorren los registros ($dataProductos) fila por fila ($rowProducto).
                foreach ($dataComprass as $rowCompras) {
                    // Se imprimen las celdas con los datos de los productos.
                    $pdf->Cell(46, 10, $rowCompras['id_compra'], 1, 0);
                    $pdf->Cell(140, 10, utf8_decode($rowCompras['nombre_cliente']), 1, 1);
                }
                // Se imprimen los mensajes de errores
            } else {
                $pdf->Cell(0, 10, utf8_decode('No hay compras realizadas en esta fecha'), 1, 1);
            }
        } else {
            $pdf->Cell(0, 10, utf8_decode('Compra incorrecta o inexistente'), 1, 1);
        }
    }
} else {
    $pdf->Cell(0, 10, utf8_decode('No hay compras para mostrar'), 1, 1);
}

// Se envía el documento al navegador y se llama al método Footer()
$pdf->Output();
?>