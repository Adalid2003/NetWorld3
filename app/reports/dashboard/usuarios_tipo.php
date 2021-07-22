<?php
require('../../helpers/report.php');
require('../../models/usuarios.php');

// Se instancia la clase para crear el reporte.
$pdf = new Report;
// Se inicia el reporte con el encabezado del documento.
$pdf->startReport('Usuarios por Tipo');

// Se instancia el módelo Categorías para obtener los datos.
$usuario = new Usuarios;
// Se verifica si existen registros (categorías) para mostrar, de lo contrario se imprime un mensaje.
if ($dataUsuarios = $usuario->readAll3()) {
    // Se recorren los registros ($dataCategorias) fila por fila ($rowCategoria).
    foreach ($dataUsuarios as $rowUsuario) {
        // Se establece un color de relleno para mostrar el nombre de la categoría.
        $pdf->SetFillColor(175);
        // Se establece la fuente para el nombre de la categoría.
        $pdf->SetFont('Times', 'B', 12);
        // Se imprime una celda con el nombre de la categoría.
        $pdf->Cell(0, 10, utf8_decode('Tipo de Usuario:  '.$rowUsuario['tipo_usuario']), 1, 1, 'C', 1);
        // Se establece la categoría para obtener sus productos, de lo contrario se imprime un mensaje de error.
        if ($usuario->setId($rowUsuario['id_tipo_usuario'])) {
            // Se verifica si existen registros (productos) para mostrar, de lo contrario se imprime un mensaje.
            if ($dataUsuarioss = $usuario->readUsuariotipo()) {
                // Se establece un color de relleno para los encabezados.
                $pdf->SetFillColor(225);
                // Se establece la fuente para los encabezados.
                $pdf->SetFont('Times', 'B', 11);
                // Se imprimen las celdas con los encabezados.
                $pdf->Cell(80, 10, utf8_decode('Nombre del Usuario'), 1, 0, 'C', 1);
                // Se establece la fuente para los datos de los productos.
                $pdf->SetFont('Times', '', 11);
                // Se recorren los registros ($dataProductos) fila por fila ($rowProducto).
                foreach ($dataUsuarioss as $rowUsuario) {
                    // Se imprimen las celdas con los datos de los productos.
                    $pdf->Cell(106, 10, utf8_decode($rowUsuario['apodo_usuario']), 1, 1);
                }
            } else {
                $pdf->Cell(0, 10, utf8_decode('No Usuarios con este tipo de usuarios'), 1, 1);
            }
        } else {
            $pdf->Cell(0, 10, utf8_decode('Usuario incorrecto o Inexistente'), 1, 1);
        }
    }
} else {
    $pdf->Cell(0, 10, utf8_decode('No hay Usuarios para mostrar'), 1, 1);
}

// Se envía el documento al navegador y se llama al método Footer()
$pdf->Output();
?>