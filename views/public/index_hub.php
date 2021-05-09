<!-- Se manda a llamar el template del sitio publico-->
<?php
include("../../app/helpers/header_template.php");
?>

<H1 class="black-text text-lighten-3" align="center"> HUB</H1>
<nav class="#0d47a1 blue darken-4" role="navigation">
    <div class="nav-wrapper">
        <a href="#!" class="brand-logo">Categoria de HUB</a>
        <ul class="right hide-on-med-and-down">
            <li><a class="black-text waves-effect white btn" href="../../views/public/hub_pasivo.php">HUB pasivo</a></li>
            <li><a class="black-text waves-effect white btn" href="../../views/public/hub_activo.php">HUB activo</i></a></li>
            <li><a class="black-text waves-effect white btn" href="../../views/public/hub_inteligente.php">HUB inteligente</a></li>
        </ul>
    </div>
</nav>
<!-- Se elabora el slider -->
<section class="slider">
    <ul class="slides">
        <li>
            <img src="../../resources/img/slider/hub11.jpg"> <!-- random image -->
            <div class="caption center-align">
                <h1 class="grey-text text-lighten-3">Hub pasivo</h3>
                    <h5 class="grey-text text-lighten-3">Un hub pasivo sirve sólo como punto de conexión física.
                        No manipula o visualiza el tráfico que lo cruza. No amplifica o limpia la señal.</h5>
                    <a href="hub_pasivo.php" class="btn btn-large white black-text waves-effect waves-grey">Ver productos</a>
            </div>
        </li>
        <li>
            <img src="../../resources/img/slider/hub12.png"> <!-- random image -->
            <div class="caption left-align">
                <h1 class="grey-text text-lighten-3">Hub activo</h3>
                    <h5 class="grey-text text-lighten-3">Los hubs activos están conectados a una fuente de
                        alimentación eléctrica, ya que estos requieren de energía eléctrica para amplificar la
                        señal entrante.</h5>
                    <a href="hub_activo.php" class="btn btn-large white black-text waves-effect waves-grey">Ver productos</a>
            </div>
        </li>
        <li>
            <img src="../../resources/img/slider/hub13.jpg"> <!-- random image -->
            <div class="caption right-align">
                <h3 class="grey-text text-lighten-3">Hub inteligente</h3>
                <h5 class="grey-text text-lighten-3">Estos dispositivos básicamente funcionan como hubs activos,
                    pero también incluyen un chip microprocesador y capacidades diagnósticas.</h5>
                <a href="hub_inteligente.php" class="btn btn-large white black-text waves-effect waves-grey">Ver productos</a>
            </div>
        </li>

    </ul>
</section>


</main>
<!-- Se hace una seccion con información dentro de un contenedor -->
<div class="container">
    <div class="section">
        <div class="row">
            <div class center="col s12 m4">
                <div class="icon-block center">
                    <h2 class="center black-text"><i class="material-icons">settings_input_component</i></h2>
                    <h5 class="center black-text text-lighten-3">HUB/contredador</h5>
                    <h7 class="center black-text text-lighten-3">Un concentrador es el dispositivo que permite
                        centralizar el cableado de una red de computadoras, para luego poder ampliarla. Trabaja en
                        la capa física del modelo OSI o la capa de acceso al medio en el modelo TCP/IP.</h7>
                    </body>
                </div>
            </div>
        </div>
    </div>
    <br><br>
</div>


<!-- Se manda a llamar el footer -->
<?php
include("../../app/helpers/template_footer_public.php");
?>