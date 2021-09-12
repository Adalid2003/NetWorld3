 <!-- Se manda a llamar el helper del header -->
<?php
// Se incluye la clase con las plantillas del documento.
require_once('../../app/helpers/header_template.php');
// Se imprime la plantilla del encabezado enviando el título de la página web.
Public_Page::headerTemplate('Inicio');
?>

<body>
 <!-- Se elabora el slider del index  -->
  <title>NetWorld | Inicio</title>
  <H1 class="black-text text-lighten-3 center-align">NetWorld | Eleva tu nivel</H1>
  <h5 class="black-text text-lighten-3 center-align">Nuestras ultimas ofertas!!!!</h5>
  <div class="slider">
    <ul class="slides">
      <li>
        <img src="../../resources/img/slider/index1.jpg"> <!-- random image -->
        <div class="caption center-align">
          <h1 class="blue-text text-lighten-3">Router ASUS GAMING RT-AX82U</h3>
            <h5 class="blue-text text-lighten-3">ASUS presenta su nuevo ROUTER GAMING, ya disponible en nuestra tienda.</h5>
            <a href="#" class="btn btn-large white black-text waves-effect waves-grey">Más información</a>
        </div>
      </li>
      <li>
        <img src="../../resources/img/slider/index2.jpg"> <!-- random image -->
        <div class="caption left-align">
          <h1 class="grey-text text-lighten-3">Switch D-link DES 105</h3>
            <h5 class="grey-text text-lighten-3">El switch más demandado por nuestro clientes esta de regreso.</h5>
            <a href="#" class="btn btn-large white black-text waves-effect waves-grey">Más información</a>
        </div>
      </li>
      <li>
        <img src="../../resources/img/slider/index3.jpg"> <!-- random image -->
        <div class="caption right-align">
          <h3 class="grey-text text-lighten-3">Hub NetGear</h3>
          <h5 class="grey-text text-lighten-3">YA disponible el nuevo HUB para expandir tu red en tu hogar.</h5>
          <a href="../views/public/hub_pasivo.php" class="btn btn-large white black-text waves-effect waves-grey">Más información</a>
        </div>
      </li>

    </ul>
    </section>



 <!-- Contenedor para mostrar el catálogo de tipos de producto -->
<div class="container">
    <!-- Título del contenido principal -->
    <h4 class="center indigo-text" id="title">Nuestro catálogo</h4>
    <!-- Fila para mostrar las categorías disponibles -->
    <div class="row" id="categorias"></div>
</div>


<?php
// Se imprime la plantilla del pie enviando el nombre del controlador para la página web.
Public_Page::footerTemplate('index.js');
?>