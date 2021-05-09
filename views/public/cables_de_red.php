 <!-- Se manda a llamar al helper del header  -->
<?php
include("../../app/helpers/header_template.php");
?>
 <!-- Se elabora el navbar de cables de red  -->
<nav>
    <div class="nav-wrapper #0d47a1 blue darken-4">
        <a href="#!" class="brand-logo">Categorias de Cables de red</a>
        <ul class="right hide-on-med-and-down">
            <li><a href="../../views/public/cable_coaxial.php" class="waves-effect waves-light btn white black-text">Cable Coaxial</a></li>
            <li><a href="../../views/public/cable_utp.php" class="waves-effect waves-light btn white black-text">Cable UTP</a></li>
            <li><a href="../../views/public/cable_fibra.php" class="waves-effect waves-light btn white black-text">Cable de Fibra Optica</a></li>
        </ul>
    </div>
</nav>
</nav>
<title>Cables de red</title>
 <!-- Se elabora el slider  -->
<H1 class="black-text text-lighten-3 center-align">Cables de red</H1>
<div class="slider">
    <ul class="slides">
        <li>
            <img src="../../resources/img/slider/coaxial.png"> <!-- random image -->
            <div class="caption center-align">
                <h1 class="grey-text text-lighten-3">Cable coaxial</h3>
                    <h5 class="grey-text text-lighten-3">El cable coaxial, coaxil, coaxcable o coax, ​ es un cable utilizado para transportar señales eléctricas de alta frecuencia que posee dos conductores concéntricos.</h5>
                    <a href="#" class="btn btn-large white black-text waves-effect waves-grey">Más información</a>
            </div>
        </li>
        <li>
            <img src="../../resources/img/slider/cableutp.jpg"> <!-- random image -->
            <div class="caption left-align">
                <h1 class="grey-text text-lighten-3">Cable UTP</h3>
                    <h5 class="black-text text-lighten-3">En telecomunicaciones, el cable de par trenzado es un tipo de cable que tiene dos conductores eléctricos aislados y entrelazados para anular las interferencias de fuentes externas y diafonía de los cables adyacentes.</h5>
                    <a href="#" class="btn btn-large white black-text waves-effect waves-grey">Más información</a>
            </div>
        </li>
        <li>
            <img src="../../resources/img/slider/optica.jpg"> <!-- random image -->
            <div class="caption right-align">
                <h3 class="grey-text text-lighten-3">Cable de fibra optica</h3>
                <h5 class="grey-text text-lighten-3">La fibra óptica es la tecnología usada para transmitir información en forma de pulsos de luz mediante hilos de fibra de vidrio o plástico, a través de largas distancias.</h5>
                <a href="../views/public/hub_pasivo.php" class="btn btn-large white black-text waves-effect waves-grey">Más información</a>
            </div>
        </li>

    </ul>

    </main>
    <div class="container">
        <div class="section">
            <div class="row">
                <div class center="col s12 m4">
                    <div class="icon-block center">
                        <h2 class="center black-text"><i class="material-icons">network_cell</i></h2>
                        <h5 class="center black-text text-lighten-3">Cables de red</h5>
                        <h7 class="center black-text text-lighten-3">Son los encargados de la interconexión de equipos dentro de una misma red, o lo que es lo mismo, son los dispositivos que, junto al cableado, constituyen las redes de área local o LAN.</h7>
                    </div>
                </div>
            </div>
        </div>
    </div>

 <!-- Se manda a llamar al helper del footer  -->
    <?php
    include("../../app/helpers/template_footer_public.php");
    ?>