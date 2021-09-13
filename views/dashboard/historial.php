<!--Se manda a llamar al helper del header-->
<?php

// Se incluye la clase con las plantillas del documento.
require_once('../../app/helpers/dashboard_template.php');
// Se imprime la plantilla del encabezado enviando el título de la página web.
Dashboard_Page::headerTemplate('Actividad de inicio de sesión del usuario: '. $_SESSION['apodo_usuario']);
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
Dashboard_Page::footerTemplate('historial.js');
?>