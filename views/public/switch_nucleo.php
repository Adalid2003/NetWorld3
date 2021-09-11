 <!-- Se manda a llamar el helper del header -->
 <?php
// Se incluye la clase con las plantillas del documento.
require_once('../../app/helpers/header_template.php');
// Se imprime la plantilla del encabezado enviando el título de la página web.
Public_Page::headerTemplate('Switch Nucleo');
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
<H1 class="black-text text-lighten-3" align="center"> Switch de núcleo y distribución</H1>
<H4 class="black-text text-lighten-3" align="center"> Elija el producto que desea comprar</H2>

  <!-- Se elaboran las cards  -->
  <div class="container">
    <div class="row">
      <!-- Se dertermina el tamaño de la cards -->
      <div class="col s12 m6 l4">
        <div class="card">
          <div class="card-image waves-effect waves-block waves-light">
            <img class="activator" src="../../resources/img/cards/modem1.jpg" height="400">
          </div>
          <div class="card-content blue right">
            <span class="card-title activator grey-text text-darken-4">D-Link DGS-3130-30TS (8 puertos 10GBASE-T y SFP+ para uplinks)<i class="material-icons right">more_vert</i></span>
            <p><a class="white-text" href="#">AGREGAR AL CARRITO</a></p>
            <h5 black-text text-lighten-3" align="center">40$</h5>
            <h5><a class="black-text text-lighten-3" href="#">Disponible</a>
              <h5>
          </div>
          <div class="card-reveal">
            <span class="card-title grey-text text-darken-4">Más información<i class="material-icons right">close</i></span>
            <p>Tiene todas las opciones de configuración L2 y L3 que se puede necesitar en entornos de pequeñas y medianas empresas, ya que también disponen también de enrutamiento dinámico y VRRP en L3.</p>
          </div>
        </div>
      </div>
      <div class="col s12 m6 l4">
        <div class="card">
          <div class="card-image waves-effect waves-block waves-light">
            <img class="activator" src="../../resources/img/cards/modem2.jpg" height="400">
          </div>
          <div class="card-content blue right">
            <span class="card-title activator grey-text text-darken-4">D-Link DGS-1250-28X con puertos SFP+ a 10Gbps para uplinks<i class="material-icons right">more_vert</i></span>
            <p><a class="white-text" href="#">AGREGAR AL CARRITO</a></p>
            <h5 black-text text-lighten-3" align="center">50$</h5>
            <h5><a class="black-text text-lighten-3" href="#">Disponible</a>
              <h5>
          </div>
          <div class="card-reveal">
            <span class="card-title grey-text text-darken-4">Más información<i class="material-icons right">close</i></span>
            <p>Dispone de ciertas funcionalidades L3 como routing estático, inter-vlan routing, y compatibilidad con IPv6, </p>
          </div>
        </div>
      </div>
      <div class="col s12 m6 l4">
        <div class="card">
          <div class="card-image waves-effect waves-block waves-light">
            <img class="activator" src="../../resources/img/cards/modem3.jpg" height="400">
          </div>
          <div class="card-content blue right">
            <span class="card-title activator grey-text text-darken-4">D-Link DXS-1210-10TS con características avanzadas L2 y L3<i class="material-icons right">more_vert</i></span>
            <p><a class="white-text" href="#">AGREGAR AL CARRITO</a></p>
            <h5 black-text text-lighten-3" align="center">100$</h5>
            <h5><a class="black-text text-lighten-3" href="#">Disponible</a>
              <h5>
          </div>
          <div class="card-reveal">
            <span class="card-title grey-text text-darken-4">Más información<i class="material-icons right">close</i></span>
            <p>Dispone de todas las opciones de configuración L2, y también incorpora funcionalidades L3-Lite como routing estático o inter-vlan routing. </p>
          </div>
        </div>
      </div>
      <div class="col s12 m6 l4">
        <div class="card">
          <div class="card-image waves-effect waves-block waves-light">
            <img class="activator" src="../../resources/img/cards/modem4.jpg" height="400">
          </div>
          <div class="card-content blue right">
            <span class="card-title activator grey-text text-darken-4">QNAP Guardian QGD-1600P con sistema operativo QTS<i class="material-icons right">more_vert</i></span>
            <p><a class="white-text" href="#">AGREGAR AL CARRITO</a></p>
            <h5 black-text text-lighten-3" align="center">130$</h5>
            <h5><a class="black-text text-lighten-3" href="#">Disponible</a>
              <h5>
          </div>
          <div class="card-reveal">
            <span class="card-title grey-text text-darken-4">Más información<i class="material-icons right">close</i></span>
            <p>Permitirá virtualizar sistemas operativos fácilmente, incluso podremos utilizar pfSense o router OS y convertir este switch en un verdadero router.</p>
          </div>
        </div>
      </div>

      <!-- Se manda a llamar el footer -->
      <?php
      include("../../app/helpers/template_footer_public.php");
      ?>