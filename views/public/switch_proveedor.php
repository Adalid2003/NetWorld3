 <!-- Se manda a llamar el helper del header -->
 <?php
// Se incluye la clase con las plantillas del documento.
require_once('../../app/helpers/header_template.php');
// Se imprime la plantilla del encabezado enviando el título de la página web.
Public_Page::headerTemplate('Switch Proveedor');
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
<H1 class="black-text text-lighten-3" align="center">Switches para proveedores</H1>
<H4 class="black-text text-lighten-3" align="center">Elija el producto que desea comprar</H2>

  <!-- Se elaboran las cards  -->
  <div class="container">
    <div class="row">
      <!-- Se dertermina el tamaño de la cards -->
      <div class="col s12 m6 l4">
        <div class="card">
          <div class="card-image waves-effect waves-block waves-light">
            <img class="activator" src="../../resources/img/cards/switch_pro1.jpg" height="400">
          </div>
          <div class="card-content blue right">
            <span class="card-title activator grey-text text-darken-4">Cisco Switch Catalyst 3560-X Series (Capada de cifrado 2 + TrustSec)<i class="material-icons right">more_vert</i></span>
            <p><a class="white-text" href="#">AGREGAR AL CARRITO</a></p>
            <h5 black-text text-lighten-3" align="center">60$</h5>
            <h5><a class="black-text text-lighten-3" href="#">Disponible</a>
              <h5>
          </div>
          <div class="card-reveal">
            <span class="card-title grey-text text-darken-4">Más información<i class="material-icons right">close</i></span>
            <p>Se reducen los gastos operativos y aumentan la sostenibilidad corporativa con la gestión de energia de Cisco "EnergyWise" además de simplificar la implementación, configuración y control de operaciones inteligentes con Cisco Catalyst Smart Operations.</p>
          </div>
        </div>
      </div>
      <div class="col s12 m6 l4">
        <div class="card">
          <div class="card-image waves-effect waves-block waves-light">
            <img class="activator" src="../../resources/img/cards/switch_pro2.jpg" height="400">
          </div>
          <div class="card-content blue right">
            <span class="card-title activator grey-text text-darken-4">Switches Cisco Catalyst de la serie 6500 (Con dos módulos LAN/WAN)<i class="material-icons right">more_vert</i></span>
            <p><a class="white-text" href="#">AGREGAR AL CARRITO</a></p>
            <h5 black-text text-lighten-3" align="center">100$</h5>
            <h5><a class="black-text text-lighten-3" href="#">Disponible</a>
              <h5>
          </div>
          <div class="card-reveal">
            <span class="card-title grey-text text-darken-4">Más información<i class="material-icons right">close</i></span>
            <p>Brinda servicios de seguridad integrados protegen recursos críticos y a los usuarios conectados</p>
          </div>
        </div>
      </div>
      <div class="col s12 m6 l4">
        <div class="card">
          <div class="card-image waves-effect waves-block waves-light">
            <img class="activator" src="../../resources/img/cards/switch_pro3.jpg" height="400">
          </div>
          <div class="card-content blue right">
            <span class="card-title activator grey-text text-darken-4">Switches Cisco Catalyst de la serie 4500E (Conectividad inalámbrica 802.11ac)<i class="material-icons right">more_vert</i></span>
            <p><a class="white-text" href="#">AGREGAR AL CARRITO</a></p>
            <h5 black-text text-lighten-3" align="center">70$</h5>
            <h5><a class="black-text text-lighten-3" href="#">Disponible</a>
              <h5>
          </div>
          <div class="card-reveal">
            <span class="card-title grey-text text-darken-4">Más información<i class="material-icons right">close</i></span>
            <p>Acceso fijo e inalámbrico convergente mediante extensión de las características deconectividad fija, la capacidad de recuperación, la calidad de servicio (QoS) granular y la escalabilidad a la conectividad inalámbrica.</p>
          </div>
        </div>
      </div>
      <div class="col s12 m6 l4">
        <div class="card">
          <div class="card-image waves-effect waves-block waves-light">
            <img class="activator" src="../../resources/img/cards/switch_pro4.jpg" height="400">
          </div>
          <div class="card-content blue right">
            <span class="card-title activator grey-text text-darken-4">Switches Cisco Catalyst de la serie 3650 (Cisco StackWise-160)<i class="material-icons right">more_vert</i></span>
            <p><a class="white-text" href="#">AGREGAR AL CARRITO</a></p>
            <h5 black-text text-lighten-3" align="center">50$</h5>
            <h5><a class="black-text text-lighten-3" href="#">Disponible</a>
              <h5>
          </div>
          <div class="card-reveal">
            <span class="card-title grey-text text-darken-4">Más información<i class="material-icons right">close</i></span>
            <p>La compatibilidad con la arquitectura de redes empresariales Cisco ONE con ASIC UADP ofrece apertura, programabilidad y protección de la inversión.</p>
          </div>
        </div>
      </div>

      <!-- Se manda a llamar el footer -->
      <?php
      include("../../app/helpers/template_footer_public.php");
      ?>