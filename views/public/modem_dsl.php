<!-- Se manda a llamar el template del sitio publico-->
 <!-- Se manda a llamar el helper del header -->
 <?php
// Se incluye la clase con las plantillas del documento.
require_once('../../app/helpers/header_template.php');
// Se imprime la plantilla del encabezado enviando el título de la página web.
Public_Page::headerTemplate('Modem dsl');
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
<H1 class="black-text text-lighten-3" align="center"> Modem DSL</H1>
<H4 class="black-text text-lighten-3" align="center"> Elija el producto que desea comprar</H2>

  <!-- Se elaboran las cards  -->
  <div class="container">
    <div class="row">
      <!-- Se dertermina el tamaño de la cards -->
      <div class="col s12 m6 l4">
        <div class="card">
          <div class="card-image waves-effect waves-block waves-light">
            <img class="activator" src="../../resources/img/cards/modem1_1.jpg" height="400">
          </div>
          <div class="card-content blue right">
            <span class="card-title activator grey-text text-darken-4">Actiontec GT701 1-Port 10/100 Wired Router<i class="material-icons right">more_vert</i></span>
            <p><a class="white-text" href="#">AGREGAR AL CARRITO</a></p>
            <h5 black-text text-lighten-3" align="center">130$</h5>
            <h5><a class="black-text text-lighten-3" href="#">Disponible</a>
              <h5>
          </div>
          <div class="card-reveal">
            <span class="card-title grey-text text-darken-4">Más información<i class="material-icons right">close</i></span>
            <p>Consta con RJ45 Ethernet, USB y RJ11 TEL.</p>
          </div>
        </div>
      </div>
      <div class="col s12 m6 l4">
        <div class="card">
          <div class="card-image waves-effect waves-block waves-light">
            <img class="activator" src="../../resources/img/cards/modem2_1.jpg" height="400">
          </div>
          <div class="card-content blue right">
            <span class="card-title activator grey-text text-darken-4">Actiontec T3260 en condiciones d VDSL 2<i class="material-icons right">more_vert</i></span>
            <p><a class="white-text" href="#">AGREGAR AL CARRITO</a></p>
            <h5 black-text text-lighten-3" align="center">210$</h5>
            <h5><a class="black-text text-lighten-3" href="#">Disponible</a>
              <h5>
          </div>
          <div class="card-reveal">
            <span class="card-title grey-text text-darken-4">Más información<i class="material-icons right">close</i></span>
            <p>Es un modem de puerta de enlace de corriente alterna, además de ser wireless.</p>
          </div>
        </div>
      </div>
      <div class="col s12 m6 l4">
        <div class="card">
          <div class="card-image waves-effect waves-block waves-light">
            <img class="activator" src="../../resources/img/cards/modem3_1.jpg" height="400">
          </div>
          <div class="card-content blue right">
            <span class="card-title activator grey-text text-darken-4">Windstream Wi-Fi Módem T3200 DSL<i class="material-icons right">more_vert</i></span>
            <p><a class="white-text" href="#">AGREGAR AL CARRITO</a></p>
            <h5 black-text text-lighten-3" align="center">149$</h5>
            <h5><a class="black-text text-lighten-3" href="#">Disponible</a>
              <h5>
          </div>
          <div class="card-reveal">
            <span class="card-title grey-text text-darken-4">Más información<i class="material-icons right">close</i></span>
            <p>Modem en condiciones de servidumbre VDSL 2</p>
          </div>
        </div>
      </div>
      <div class="col s12 m6 l4">
        <div class="card">
          <div class="card-image waves-effect waves-block waves-light">
            <img class="activator" src="../../resources/img/cards/modem4_1.jpg" height="400">
          </div>
          <div class="card-content blue right">
            <span class="card-title activator grey-text text-darken-4">Actiontec USB Ethernet módem DSL GT701R<i class="material-icons right">more_vert</i></span>
            <p><a class="white-text" href="#">AGREGAR AL CARRITO</a></p>
            <h5 black-text text-lighten-3" align="center">70$</h5>
            <h5><a class="black-text text-lighten-3" href="#">No disponible</a>
              <h5>
          </div>
          <div class="card-reveal">
            <span class="card-title grey-text text-darken-4">Más información<i class="material-icons right">close</i></span>
            <p>Este Modem es la forma más sencilla de conectar computadoras a una conexión de banda ancha de alta velocidad.</p>
          </div>
        </div>
      </div>

      <!-- Se manda a llamar el footer -->
      <?php
      include("../../app/helpers/template_footer_public.php");
      ?>