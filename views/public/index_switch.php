<!-- Se manda a llamar el template del sitio publico-->
<?php
include("../../app/helpers/header_template.php");
?>

<H1 class="black-text text-lighten-3" align="center"> Switches</H1>
<nav class="#0d47a1 blue darken-4">
    <div class="nav-wrapper">
        <a href="#!" class="brand-logo">Categorias:</a>
        <ul class="right hide-on-med-and-down">
            <li><a class="black-text waves-effect white btn" href="../../views/public/switch_lan.php">Switch LAN</a></li>
            <li><a class="black-text waves-effect white btn" href="../../views/public/switch_compacto.php">Switch compacto</a></li>
            <li><a class="black-text waves-effect white btn" href="../../views/public/switch_nucleo.php">Switch de núcleo y distribución</a></li>
            <li><a class="black-text waves-effect white btn" href="../../views/public/switch_centro_datos.php">Switch para centros de datos</a></li>
            <li><a class="black-text waves-effect white btn" href="../../views/public/switch_proveedor.php">Switch para proveedores</a></li>
            <li><a class="black-text waves-effect white btn" href="../../views/public/switch_ethernet.php">Switch de acceso a Ethernet</a></li>

        </ul>
    </div>
</nav>
<!-- Se elabora el slider -->
<section class="slider">
    <ul class="slides">
        <li>
            <img src="../../resources/img/slider/switch1.jpg"> <!-- random image -->
            <div class="caption center-align">
                <h1 class="grey-text text-lighten-3">Switch LAN</h3>
                    <h5 class="grey-text text-lighten-3">Es un switch de red que interconecta dos o más redes LAN y reenvía los paquetes entre estas redes.</h5>
                    <a href="../../views/public/switch_lan.php" class="btn btn-large white black-text waves-effect waves-grey">Ver productos</a>
            </div>
        </li>
        <li>
            <img src="../../resources/img/slider/switch2.png"> <!-- random image -->
            <div class="caption left-align">
                <h1 class="grey-text text-lighten-3">Switches compactos</h3>
                    <h5 class="grey-text text-lighten-3">especialmente diseñado para uso residencial, para la oficina en el hogar y para pequeñas empresas.</h5>
                    <a href="../../views/public/switch_compacto.php" class="btn btn-large white black-text waves-effect waves-grey">Ver productos</a>
            </div>
        </li>
        <li>
            <img src="../../resources/img/slider/switch3.png"> <!-- random image -->
            <div class="caption right-align">
                <h3 class="white-text text-lighten-3">Switches de núcleo y distribución</h3>
                <h5 class="white-text text-lighten-3">ofrecen un balance de rendimiento en la red excepcional con una gran simplicidad operacional.</h5>
                <a href="../../views/public/switch_nucleo.php" class="btn btn-large white black-text waves-effect waves-grey">Ver productos</a>
            </div>
        </li>
        <li>
            <img src="../../resources/img/slider/switch4.png"> <!-- random image -->
            <div class="caption right-align">
                <h3 class="black-text text-lighten-3">Switches para Centros de Datos</h3>
                <h5 class="black-text text-lighten-3">Proporcionan la base de switching para la Infraestructura centrada en aplicaciones (ACI) de Cisco.</h5>
                <a href="../../views/public/switch_centro_datos.php" class="btn btn-large white black-text waves-effect waves-grey">Ver productos</a>
            </div>
        </li>
        <li>
            <img src="../../resources/img/slider/switch5.png"> <!-- random image -->
            <div class="caption right-align">
                <h3 class="white-text text-lighten-3">Switches para proveedores</h3>
                <h5 class="white-text text-lighten-3">Estos switches se orientan a soluciones de red más económicas y enfocada a la distribución.</h5>
                <a href="../../views/public/switch_proveedor.php" class="btn btn-large white black-text waves-effect waves-grey">Ver productos</a>
            </div>
        </li>
        <li>
            <img src="../../resources/img/slider/switch6.png"> <!-- random image -->
            <div class="caption right-align">
                <h3 class="white-text text-lighten-3">Switches de acceso a Ethernet</h3>
                <h5 class="white-text text-lighten-3">Diseñado para aplicaciones de acceso a la red como videovigilancia IP, gestión integral de edificios, conectividad de oficinas y telefonía IP.</h5>
                <a href="../../views/public/switch_ethernet.php" class="btn btn-large white black-text waves-effect waves-grey">Ver productos</a>
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
                    <h2 class="center black-text"><i class="material-icons">network_cell</i></h2>
                    <h5 class="center black-text text-lighten-3">Switch</h5>
                    <h7 class="center black-text text-lighten-3">Son los encargados de la interconexión de equipos dentro de una misma red, o lo que es lo mismo, son los dispositivos que, junto al cableado, constituyen las redes de área local o LAN.</h7>
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