 <!-- Se manda a llamar el helper del header -->
 <?php
// Se incluye la clase con las plantillas del documento.
require_once('../../app/helpers/header_template.php');
// Se imprime la plantilla del encabezado enviando el título de la página web.
Public_Page::headerTemplate('Modem de fibra');
$TimeOutMinutes = 5; // This is your TimeOut period in minutes
$LogOff_URL = "inactividad.php"; // If timed out, it will be redirected to this page

$TimeOutSeconds = $TimeOutMinutes * 60; // TimeOut in Seconds
if (isset($_SESSION['SessionStartTime'])) {
$InActiveTime = time() - $_SESSION['SessionStartTime'];
if ($InActiveTime >= $TimeOutSeconds) {

    session_destroy();
    //header("Location: $LogOff_URL");

}
}
     $_SESSION['SessionStartTime'] = time();
?>
<H1 class="black-text text-lighten-3" align="center"> Modem Fribra Óptica</H1>
<H4 class="black-text text-lighten-3" align="center"> Elija el producto que desea comprar</H2>

  <!-- Se elaboran las cards  -->
  <div class="container">
    <div class="row">
      <!-- Se dertermina el tamaño de la cards -->
      <div class="col s12 m6 l4">
        <div class="card">
          <div class="card-image waves-effect waves-block waves-light">
            <img class="activator" src="../../resources/img/cards/modem_fibra1.jpg" height="400">
          </div>
          <div class="card-content blue right">
            <span class="card-title activator grey-text text-darken-4">EPON ONU módem con Fibra Óptica <i class="material-icons right">more_vert</i></span>
            <p><a class="white-text" href="#">AGREGAR AL CARRITO</a></p>
            <h5 black-text text-lighten-3" align="center">139$</h5>
            <h5><a class="black-text text-lighten-3" href="#">Disponible</a>
              <h5>
          </div>
          <div class="card-reveal">
            <span class="card-title grey-text text-darken-4">Más información<i class="material-icons right">close</i></span>
            <p>Es bosible tener hasta 1 GB de internet</p>
          </div>
        </div>
      </div>
      <div class="col s12 m6 l4">
        <div class="card">
          <div class="card-image waves-effect waves-block waves-light">
            <img class="activator" src="../../resources/img/cards/modem_fibra2.jpg" height="400">
          </div>
          <div class="card-content blue right">
            <span class="card-title activator grey-text text-darken-4">AVM FRITZ optical fiber Box Modem<i class="material-icons right">more_vert</i></span>
            <p><a class="white-text" href="#">AGREGAR AL CARRITO</a></p>
            <h5 black-text text-lighten-3" align="center">39$</h5>
            <h5><a class="black-text text-lighten-3" href="#">Disponible</a>
              <h5>
          </div>
          <div class="card-reveal">
            <span class="card-title grey-text text-darken-4">Más información<i class="material-icons right">close</i></span>
            <p>La velocidad máxima que permite alcanzar es de 1.733 mbps y también dispone de dos USB de tipo C.</p>
          </div>
        </div>
      </div>
      <div class="col s12 m6 l4">
        <div class="card">
          <div class="card-image waves-effect waves-block waves-light">
            <img class="activator" src="../../resources/img/cards/modem_fibra3.jpg" height="400">
          </div>
          <div class="card-content blue right">
            <span class="card-title activator grey-text text-darken-4"> NETGEAR Nightwark X10 R9000 (fibra óptica)<i class="material-icons right">more_vert</i></span>
            <p><a class="white-text" href="#">AGREGAR AL CARRITO</a></p>
            <h5 black-text text-lighten-3" align="center">110$</h5>
            <h5><a class="black-text text-lighten-3" href="#">Disponible</a>
              <h5>
          </div>
          <div class="card-reveal">
            <span class="card-title grey-text text-darken-4">Más información<i class="material-icons right">close</i></span>
            <p>Dispone de hasta 6 tomas Ethernet, cuenta con dos USB de tipo C y garantiza unas frecuencias que van entre los 1.700 Mbps hasta los 4.600.</p>
          </div>
        </div>
      </div>
      <div class="col s12 m6 l4">
        <div class="card">
          <div class="card-image waves-effect waves-block waves-light">
            <img class="activator" src="../../resources/img/cards/modem_fibra4.jpg" height="400">
          </div>
          <div class="card-content blue right">
            <span class="card-title activator grey-text text-darken-4"> TP-Link Archer C9 Modem (fibra óptica)<i class="material-icons right">more_vert</i></span>
            <p><a class="white-text" href="#">AGREGAR AL CARRITO</a></p>
            <h5 black-text text-lighten-3" align="center">230$</h5>
            <h5><a class="black-text text-lighten-3" href="#">No disponible</a>
              <h5>
          </div>
          <div class="card-reveal">
            <span class="card-title grey-text text-darken-4">Más información<i class="material-icons right">close</i></span>
            <p>Destaca por ser muy estable y también, por tener un puerto USB 3.0. Es compatible con las redes de operadoras como Jazztel y Movistar y llega a velocidades de hasta 1900 mbps.</p>
          </div>
        </div>
      </div>

      <!-- Se manda a llamar el footer -->
      <?php
      include("../../app/helpers/template_footer_public.php");
      ?>