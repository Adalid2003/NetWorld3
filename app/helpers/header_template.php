<?php

class Public_Page
{

    public static function headerTemplate($title)
    {

        session_start();
        print('<!DOCTYPE html>
    <html>
     <!--Se crea el helper del header privado-->
    <head>
        <!--Import Google Icon Font-->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
        <title>NetWorld - ' . $title . '</title>
        <!--Import materialize.css-->
        <link type="text/css" rel="stylesheet" href="../../resources/css/styles.css" media="screen,projection" />
        <!--Let browser know website is optimized for mobile-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        
        <link rel="shotcut icon" href="favicon.ico" type="image/x-icon">
    </head>
    
    <body>');

        // Se obtiene el nombre del archivo de la página web actual.
        $filename = basename($_SERVER['PHP_SELF']);
        // Se comprueba si existe una sesión de cliente para mostrar el menú de opciones, de lo contrario se muestra otro menú.
        if (isset($_SESSION['id_cliente'])) {
            // Se verifica si la página web actual es diferente a login.php y register.php, de lo contrario se direcciona a index.php
            if ($filename != 'login.php' && $filename != 'signin.php') {
                print('
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
        ');
            } else {
                header('location: index.php');
            }
        } else {
            // Se verifica si la página web actual es diferente a index.php (Iniciar sesión) y a register.php (Crear primer usuario) para direccionar a index.php, de lo contrario se muestra un menú vacío.
            if ($filename != 'cart.php') {
                print('
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
        ');
            } else {
                header('location: login.php');
            }
        }
        // Se llama al método que contiene el código de las cajas de dialogo (modals).
        self::modals();
    }

    /*
    *   Método para imprimir la plantilla del pie.
    *
    *   Parámetros: $controller (nombre del archivo que sirve como controlador de la página web).
    *
    *   Retorno: ninguno.
    */
    public static function footerTemplate($controller)
    {
        // Se imprime el código HTML para el pie del documento.
        if (isset($_SESSION['id_cliente'])) {
            $scripts = '<script type="text/javascript" src="../../resources/js/materialize.min.js"></script>
            <script type="text/javascript" src="../../resources/js/sweetalert.min.js"></script>
            <script type="text/javascript" src="../../app/helpers/components.js"></script>
            <script type="text/javascript" src="../../app/controllers/public/iniciar.js"></script>
            <script type="text/javascript" src="../../app/controllers/public/account.js"></script>
            <script type="text/javascript" src="../../app/controllers/public/'.$controller.'"></script>';
        } else {
            $scripts = '<script type="text/javascript" src="../../resources/js/materialize.min.js"></script>
            <script type="text/javascript" src="../../resources/js/sweetalert.min.js"></script>
            <script type="text/javascript" src="../../app/helpers/components.js"></script>
            <script type="text/javascript" src="../../app/controllers/public/iniciar.js"></script>
            <script type="text/javascript" src="../../app/controllers/public/account.js"></script>
            <script type="text/javascript" src="../../app/controllers/public/'.$controller.'"></script>';
        }
        print('</main>
      <!--Se crea el helper del footer publico-->
      <footer class="page-footer #2962ff blue accent-4">
          <div class="container">
              <div class="row">
                  <div class="col l6 s12">
                      <h5 class="white-text">Contactanos</h5>
                      <h5 id="logo-container" href="#" class="brand-logo">
                          <i class="material-icons">facebook</i>
                          NetWorldsv
                          </a>
                          <h5 id="logo-container" href="#" class="brand-logo"></h5>
                              <i class="material-icons">linked_camera</i>
                              NetWorldsv
                              </a>
                              <h5 id="logo-container" href="#" class="brand-logo"></h5>
                                  <i class="material-icons">mail</i>
                                  www.support@networld.com
                                  </a>
                  </div>
                  <div class="col l4 offset-l2 s12">
                      <h5 class="white-text">Otros</h5>
                      <h5 id="logo-container" href="#" class="brand-logo"></h5>
                          <i class="material-icons">landscape</i>
                          NetWorld
                          </a>
                          <h5 id="logo-container" href="" class="brand-logo"></h5>
                              <i class="material-icons">dashboard</i>
                              <a href="../../views/dashboard/dashboard.php">Dashboard(privado)</a>
                  </div>
              </div>
          </div>
          <div class="footer-copyright">
              <div class="container center">
                  © 2021 Copyright Text
              </div>
          </div>
      </footer>
      ' . $scripts . '
      </body>
      </html>');
    }

    /*
    *   Método para imprimir las cajas de dialogo (modals).
    */
    private static function modals()
    {
        // Se imprime el código HTML de las cajas de dialogo (modals).
        print('
            <!-- Componente Modal para mostrar los Términos y condiciones -->
            <div id="terminos" class="modal">
                <div class="modal-content">
                    <h4 class="center-align">TÉRMINOS Y CONDICIONES</h4>
                    <p>Nuestra empresa ofrece los mejores productos a nivel nacional con una calidad garantizada y...</p>
                </div>
                <div class="divider"></div>
                <div class="modal-footer">
                    <a href="#!" class="modal-action modal-close btn waves-effect"><i class="material-icons">done</i></a>
                </div>
            </div>

            <!-- Componente Modal para mostrar la Misión -->
            <div id="mision" class="modal">
                <div class="modal-content">
                    <h4 class="center-align">MISIÓN</h4>
                    <p>Ofrecer los mejores productos a nivel nacional para satisfacer a nuestros clientes y...</p>
                </div>
                <div class="divider"></div>
                <div class="modal-footer">
                    <a href="#!" class="modal-action modal-close btn waves-effect"><i class="material-icons">done</i></a>
                </div>
            </div>

            <!-- Componente Modal para mostrar la Visión -->
            <div id="vision" class="modal">
                <div class="modal-content">
                    <h4 class="center-align">VISIÓN</h4>
                    <p>Ser la empresa lider en la región ofreciendo productos de calidad a precios accesibles y...</p>
                </div>
                <div class="divider"></div>
                <div class="modal-footer">
                    <a href="#!" class="modal-action modal-close btn waves-effect"><i class="material-icons">done</i></a>
                </div>
            </div>

            <!-- Componente Modal para mostrar los Valores -->
            <div id="valores" class="modal">
                <div class="modal-content center-align">
                    <h4>VALORES</h4>
                    <p>Responsabilidad</p>
                    <p>Honestidad</p>
                    <p>Seguridad</p>
                    <p>Calidad</p>
                </div>
                <div class="divider"></div>
                <div class="modal-footer">
                    <a href="#!" class="modal-action modal-close btn waves-effect"><i class="material-icons">done</i></a>
                </div>
            </div>
        ');
    }
}
?>
}
}