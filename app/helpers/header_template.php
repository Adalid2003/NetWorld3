<!DOCTYPE html>
<html>
 <!--Se crea el helper del header publico-->
<head>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="../../resources/css/styles.css" media="screen,projection" />
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    
    <link rel="shotcut icon" href="favicon.ico" type="image/x-icon">
</head>
 <!--Se crea el navbar-->
<body>
    <header>
        <nav class="#0d47a1 blue darken-4" role="navigation">
            <div class="nav-wrapper">
                <a href="../../views/public/index_publico.php" class="brand-logo"> <img src="../../resources/img/logo.jpg" height="65"></a>
                <a id="logo-container" href="../../views/public/index_publico.php" class="brand-logo container center">
                
                    NetWorld
                </a>
                <a href="#" data-target="mobile-sidenav" class="sidenav-trigger"><i class="material-icons">menu</i></a>

                <ul class="right hide-on-med-and-down">
                    <li><a href="../../views/public/index_publico.php">Inicio</a></li>
                    <li><a href="../../views/public/login.php">Iniciar sesión</a></li>
                    <li><a href="../../views/public/carrito.php">Tu carrito</a></li>
                </ul>

                <ul id="nav-mobile" class="sidenav">
                    <li><a href="../../views/public/index_publico.php">Inicio</a></li>
                    <li><a href="#">Iniciar sesión</a></li>
                    <li><a href="#">Tu carrito</a></li>
                </ul>

            </div>
        </nav>
        <nav class="#0d47a1 blue darken-4" role="navigation">
            <div class="nav-wrapper">
               
                <a href="#" data-target="mobile-sidenav" class="sidenav-trigger"><i class="material-icons">menu</i></a>

                <ul class="hide-on-med-and-down">
                    <li><a href="../../views/public/RouterPrincipal.php">Routers</a></li>
                    <li><a href="../../views/public/index_modem.php">Modems</a></li>
                    <li><a href="../../views/public/cables_de_red.php">Cables de red</a></li>
                    <li><a href="../../views/public/index_hub.php">HUB</a></li>
                    <li><a href="../../views/public/index_switch.php">Switch</a></li>
                    <li><a href="../../views/public/Valoraciones.php">Valoraciones</a></li>
                </ul>

                <ul id="nav-mobile" class="sidenav">
                    <li><a href="#">Inicio</a></li>
                    <li><a href="#">Iniciar sesión</a></li>
                    <li><a href="#">Tu carrito</a></li>
                </ul>

            </div>
        </nav>
    </header>
    <main>
