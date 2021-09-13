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
        
        <link rel="shotcut icon" href="../../resources/img/logo.jpg" type="image/x-icon">
    </head>
    
    <body>');

        // Se obtiene el nombre del archivo de la página web actual.
        $filename = basename($_SERVER['PHP_SELF']);
        // Se comprueba si existe una sesión de cliente para mostrar el menú de opciones, de lo contrario se muestra otro menú.
        if (isset($_SESSION['id_cliente'])) {
            // Se verifica si la página web actual es diferente a login.php y register.php, de lo contrario se direcciona a index.php
            if ($filename != 'login.php' && $filename != 'Registrarse.php') {
                print('
                <header>
                <div class="navbar-fixed">
                    <nav class="#2962ff blue accent-4">
                        <div class="nav-wrapper">
                            <a href="index_publico.php" class="brand-logo"><img src="../../resources/img/logo.jpg" height="60"></a>
                            <a href="#" data-target="mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
                            <ul class="right hide-on-med-and-down">
                                <li><a href=".php"><i class="material-icons left">security</i>Cambiar contraseña</a></li>
                                <li><a href="index_publico.php"><i class="material-icons left">view_module</i>Catálogo</a></li>
                                <li><a href="carrito.php"><i class="material-icons left">shopping_cart</i>Carrito</a></li>
                                <li><a href="#" onclick="logOut()"><i class="material-icons left">close</i>Cerrar sesión</a></li>
                            </ul>
                        </div>
                    </nav>
                </div>
                <ul class="sidenav" id="mobile">
                    <li><a href=".php"><i class="material-icons left">security</i>Cambiar contraseña</a></li>
                    <li><a href="index_publico.php"><i class="material-icons left">view_module</i>Catálogo</a></li>
                    <li><a href="carrito.php"><i class="material-icons left">shopping_cart</i>Carrito</a></li>
                    <li><a href="#" onclick="logOut()"><i class="material-icons left">close</i>Cerrar sesión</a></li>
                </ul>
            </header>
            <main>
        ');
            } else {
                header('location: index.php');
            }
        } else {
            // Se verifica si la página web actual es diferente a index.php (Iniciar sesión) y a register.php (Crear primer usuario) para direccionar a index.php, de lo contrario se muestra un menú vacío.
            if ($filename != 'carrito.php') {
                print('
                <header>
                        <div class="navbar-fixed">
                            <nav class="#2962ff blue accent-4">
                                <div class="nav-wrapper">
                                    <a href="index_publico.php" class="brand-logo"><img src="../../resources/img/logo.jpg" height="60"></a>
                                    <a href="#" data-target="mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
                                    <ul class="right hide-on-med-and-down">
                                        <li><a href="index_publico.php"><i class="material-icons left">view_module</i>Catálogo</a></li>
                                        <li><a href="Registrarse.php"><i class="material-icons left">person</i>Crear cuenta</a></li>
                                        <li><a href="login.php"><i class="material-icons left">login</i>Iniciar sesión</a></li>
                                    </ul>
                                </div>
                            </nav>
                        </div>
                        <ul class="sidenav" id="mobile">
                            <li><a href="index.php"><i class="material-icons left">view_module</i>Catálogo</a></li>
                            <li><a href="signin.php"><i class="material-icons left">person</i>Crear cuenta</a></li>
                            <li><a href="login.php"><i class="material-icons left">login</i>Iniciar sesión</a></li>
                        </ul>
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
                      <h5 class="white-text">Contáctanos</h5>
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
                            <a href="mision">Misión</a>
                  </div>
                  <div class="col l4 offset-l2 s12">
                      <h5 class="white-text">Otros</h5>
                      <h5 id="logo-container" href="#" class="brand-logo"></h5>
                          <i class="material-icons">landscape</i>
                          NetWorld
                          </a>
                          <h5 id="logo-container" href="" class="brand-logo"></h5>
                              <i class="material-icons">dashboard</i>
                              <a href="../../views/dashboard/index.php">Dashboard</a>
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
                    <p>En NetWorld trabajamos para ofrecer mayoritariamente dispositivos de red, ayudando así a locales de computación, colegios, grandes y pequeñas empresas, a eficientar la conexión entre los dispositivos en cuestión.</p>
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
                    <p>Ser la compañía líder de habla hispana en proveer productos de red en Latinoamerica.</p>
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
