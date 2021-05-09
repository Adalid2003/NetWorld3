 <!-- Se manda a llamar el helper del header -->
<?php
include("../../app/helpers/header_template.php");
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



 <!-- Se elaboran las cards  -->
    <div class="container">
      <div class="row">
        <div class="col s12 m6 l4">
          <div class="card">
            <div class="card-image waves-effect waves-block waves-light">
              <img class="activator" src="../../resources/img/cards/modem.jpg">
            </div>
            <div class="card-content blue right">
              <span class="card-title activator grey-text text-darken-4">NETGEAR Nighthawk Combo cable módem y enrutador WiFi<i class="material-icons right">more_vert</i></span>
              <p><a class="white-text" href="#">AGREGAR AL CARRITO</a></p>
            </div>
            <div class="card-reveal">
              <span class="card-title grey-text text-darken-4">Más información<i class="material-icons right">close</i></span>
              <p>Creado para alta velocidad: lo mejor para proveedores de cable de hasta 400 Mbps de velocidad -Tecnología del módem: diseñado con canales de 24x8 y DOCSIS 3.0 -Rápido desempeño del WiFi: obtén hasta 1800 pies cuadrados de cobertura inalámbrica y 30 dispositivos conectados con velocidad AC1900 (hasta 1900 Mbps) -Seguro: incluye controles parentales, y admite protocolos de seguridad inalámbrica WEP y WPA/WPA2</p>
            </div>
          </div>
        </div>
        <div class="col s12 m6 l4">
          <div class="card">
            <div class="card-image waves-effect waves-block waves-light">
              <img class="activator" src="../../resources/img/cards/cable.jpg">
            </div>
            <div class="card-content blue right">
              <span class="card-title activator grey-text text-darken-4">Monoprice - Cable de red de cobre desnudo<i class="material-icons right">more_vert</i></span>
              <p><a class="white-text" href="#">AGREGAR AL CARRITO</a></p>
            </div>
            <div class="card-reveal">
              <span class="card-title grey-text text-darken-4">Más información<i class="material-icons right">close</i></span>
              <p>Los cables de interconexiones Categoría 6 (CAT6) de alta calidad son la solución a tus necesidades de trabajo en Internet -Hecho de hilo de cobre puro de 24 AWG en vez de hilo de aluminio revestido de cobre (CCA). -Viene con una velocidad de hasta 550 MHz que puedes conectar a tus segmentos LAN/WAN</p>
            </div>
          </div>
        </div>
        <div class="col s12 m6 l4">
          <div class="card">
            <div class="card-image waves-effect waves-block waves-light">
              <img class="activator" src="../../resources/img/cards/switch.jpg">
            </div>
            <div class="card-content blue right">
              <span class="card-title activator grey-text text-darken-4">Cisco Business CBS110-24T-D Switch no administrado <i class="material-icons right">more_vert</i></span>
              <p><a class="white-text" href="#">AGREGAR AL CARRITO</a></p>
            </div>
            <div class="card-reveal">
              <span class="card-title grey-text text-darken-4">Más información<i class="material-icons right">close</i></span>
              <p>Puertos de interruptor: 24 puertos 10/100/1000 + 2 x 1GE SFP (compartido). -Simple: enchufar y usar sin necesidad de conocimientos técnicos o soporte. -Flexible: amplia cartera proporciona la máxima flexibilidad de 5 a 24 puertos y combinaciones PoE. -Rendimiento: Gigabit Ethernet y la inteligencia de calidad de servicio integrado (QoS) optimizan los servicios sensibles al retardo y mejoran el rendimiento general de la red. -Diseño innovador: diseño elegante y compacto, ideal para la instalación fuera del armario de cableado como tiendas minoristas, oficinas de plan abierto y aulas.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
</body>

 <!-- Se manda a llamar al helper del footer  -->
<?php
include("../../app/helpers/template_footer_public.php");
?>