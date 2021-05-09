<!-- Se manda a llamar el template del sitio publico -->
<?php
include("../../app/helpers/header_template.php");
?>

<H1 class="black-text text-lighten-3" align="center"> Modems</H1>

<nav class="#0d47a1 blue darken-4" role="navigation">
    <div class="nav-wrapper">
        <a href="#!" class="brand-logo">Categoria de Modems</a>
        <ul class="right hide-on-med-and-down">
            <li><a class="black-text waves-effect white btn" href="../../views/public/modem_cable.php">Modem por cable</a></li>
            <li><a class="black-text waves-effect white btn" href="../../views/public/modem_dsl.php">Modem DSL</i></a></li>
            <li><a class="black-text waves-effect white btn" href="../../views/public/modem_fibra.php">Modem de fibra opctica</a></li>
        </ul>
    </div>
</nav>
<!-- Se elaboran los sliders -->
<section class="slider">
    <ul class="slides">
        <li>
            <img src="../../resources/img/slider/modem1.jpg"> <!-- random image -->
            <div class="caption center-align">
                <h1 class="grey-text text-lighten-3">Modem de cable</h3>
                    <h5 class="grey-text text-lighten-3">Diseñado para modular y demodular la señal de datos sobre una infraestructura de televisión por cable (CATV).</h5>
                    <a href="#" class="btn btn-large white black-text waves-effect waves-grey">Ver productos</a>
            </div>
        </li>
        <li>
            <img src="../../resources/img/slider/modem2.jpg"> <!-- random image -->
            <div class="caption left-align">
                <h1 class="grey-text text-lighten-3">Modem DSL</h3>
                    <h5 class="grey-text text-lighten-3">Consta de una banda base (MOdulador / DEModulador) que ofrece comunicaciones de alta velocidad para distancias cortas.</h5>
                    <a href="#" class="btn btn-large white black-text waves-effect waves-grey">Ver productos</a>
            </div>
        </li>
        <li>
            <img src="../../resources/img/slider/modem3.jpg"> <!-- random image -->
            <div class="caption right-align">
                <h3 class="black-text text-lighten-3">Modem de fibra</h3>
                <h5 class="black-text text-lighten-3">El módem recibe la información proveniente del ISP a través de la línea de teléfono, fibra óptica o un cable coaxial (dependiendo del ISP) y la convierte en una señal digital.</h5>
                <a href="#" class="btn btn-large white black-text waves-effect waves-grey">Ver productos</a>
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
                    <h2 class="center black-text"><i class="material-icons">network_check</i></h2>
                    <h5 class="center black-text text-lighten-3">Modem</h5>
                    <h7 class="center black-text text-lighten-3">Es un dispositivo que convierte señales digitales en analógicas, o viceversa, para poder ser transmitidas a través de líneas de teléfono, cables coaxiales, fibras ópticas y microondas; conectado a una computadora, permite la comunicación con otra computadora por vía telefónica.</h7>
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