<!--Se manda a llamar al helper del header-->
<?php

// Se incluye la clase con las plantillas del documento.
require_once('../../app/helpers/header_template.php');
// Se imprime la plantilla del encabezado enviando el título de la página web.
Public_Page::headerTemplate('Actividad de inicio de sesión de su cuenta');
?>
<!-- Se hace la tabla responsiva -->
<table class="responsive-table highlight">
  <thead>
    <tr>
      <th>Ordenador</th>
      <th>Fecha y hora de ingreso</th>
    </tr>
  </thead>
  <tbody id="tbody-rows">
  </tbody>
</table>

  <!--Se manda a llamar al helper del footer-->
<?php
// Se imprime la plantilla del pie enviando el nombre del controlador para la página web.
Public_Page::footerTemplate('historial.js');
?>