<?php

class Dashboard_page
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
        <title>Dashboard - '.$title.'</title>
        <!--Import materialize.css-->
        <link type="text/css" rel="stylesheet" href="../../resources/css/styles.css" media="screen,projection" />
        <!--Let browser know website is optimized for mobile-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        
        <link rel="shotcut icon" href="favicon.ico" type="image/x-icon">
    </head>
    
    <body>');
    $filename = basename($_SERVER['PHP_SELF']);
    if (isset($_SESSION['id_usuario'])) {
      if ($filename != 'index.php' && $filename != 'register.php') {
        self::modals();
        print('    <header>
        <nav class="#0d47a1 blue darken-4" role="navigation">
            <div class="nav-wrapper">
                <li class="material-icons">dashboard</li> <a href="">Dashboard</a>
                <a id="logo-container" href="../../views/dashboard/dashboard.php" class="brand-logo container center">
                
                    NetWorld
                </a>
            </div>
        </nav>
        <ul id="slide-out" class="sidenav">
    <li><div class="user-view">
      <div class="background">
        <img src="../../resources/img/dash.jpg">
      </div>
      <a href="#user"><img class="circle" src="../../resources/img/users/user.png"></a>
      <a href="#name"><span class="white-text name">José</span></a>
      <a href="#email"><span class="white-text email">jose@gmail.com</span></a>
    </div></li>
    <li><a href="../dashboard/usuario.php">Usuarios</a></li>
    <li><a href="../dashboard/productos.php">Productos</a></li>
    <li><a href="../dashboard/Proveedores.php">Proveedores</a></li>
    <li><a href="../dashboard/Reportes.php">Reportes</a></li>
    <li><a href="../dashboard/Compras.php">Compras</a></li>
  </ul>
  <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>
    </header>
    <h3 class="center-align">' . $title . '</h3>
    <main>');
      } else {
        header('location: main.php');
      }
    } else {
      if ($filename != 'index.php' && $filename != 'register.php') {
        header('location: index.php');
      } else {
        print('    <header>
      <nav class="#0d47a1 blue darken-4" role="navigation">
          <div class="nav-wrapper">
              <li class="material-icons">dashboard</li> <a href="">Dashboard</a>
              <a id="logo-container" href="../../views/dashboard/dashboard.php" class="brand-logo container center">
              
                  NetWorld
              </a>
          </div>
      </nav>
      <ul id="slide-out" class="sidenav">
  <li><div class="user-view">
    <div class="background">
      <img src="../../resources/img/dash.jpg">
    </div>
    <a href="#user"><img class="circle" src="../../resources/img/users/user.png"></a>
    <a href="#name"><span class="white-text name">José</span></a>
    <a href="#email"><span class="white-text email">jose@gmail.com</span></a>
  </div></li>
  <li><a href="../dashboard/usuario.php">Usuarios</a></li>
  <li><a href="../dashboard/productos.php">Productos</a></li>
  <li><a href="../dashboard/Proveedores.php">Proveedores</a></li>
  <li><a href="../dashboard/Reportes.php">Reportes</a></li>
  <li><a href="../dashboard/Compras.php">Compras</a></li>
</ul>
<a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>
  </header>
  <main>');
      }
    }
  }
  public static function footerTemplate($controller)
  {
    if (isset($_SESSION['id_usuario'])) {
      $scripts = '<script type="text/javascript" src="../../resources/js/materialize.min.js"></script>
      <script type="text/javascript" src="../../app/controllers/iniciar.js"></script>
      <script type="text/javascript" src="../../resources/js/sweetalert.min.js"></script>
      <script type="text/javascript" src="../../app/helpers/components.js"></script>
      
      <script type="text/javascript" src="../../app/controllers/' . $controller . '"></script>';
    } else {
      $scripts = '<script type="text/javascript" src="../../resources/js/materialize.min.js"></script>
        <script type="text/javascript" src="../../resources/js/sweetalert.min.js"></script>
        <script type="text/javascript" src="../../app/helpers/components.js"></script>
        <script type="text/javascript" src="../../app/controllers/iniciar.js"></script>
        <script type="text/javascript" src="../../app/controllers/' . $controller . '"></script>';
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
  private static function modals()
  {
    // Se imprime el código HTML de las cajas de dialogo (modals).
    print('
          <!-- Componente Modal para mostrar el formulario de editar perfil -->
          <div id="profile-modal" class="modal">
              <div class="modal-content">
                  <h4 class="center-align">Editar perfil</h4>
                  <form method="post" id="profile-form">
                      <div class="row">
                          <div class="input-field col s12 m6">
                              <i class="material-icons prefix">person</i>
                              <input id="nombres_perfil" type="text" name="nombres_perfil" class="validate" required/>
                              <label for="nombres_perfil">Nombres</label>
                          </div>
                          <div class="input-field col s12 m6">
                              <i class="material-icons prefix">person</i>
                              <input id="apellidos_perfil" type="text" name="apellidos_perfil" class="validate" required/>
                              <label for="apellidos_perfil">Apellidos</label>
                          </div>
                          <div class="input-field col s12 m6">
                              <i class="material-icons prefix">email</i>
                              <input id="correo_perfil" type="email" name="correo_perfil" class="validate" required/>
                              <label for="correo_perfil">Correo</label>
                          </div>
                          <div class="input-field col s12 m6">
                              <i class="material-icons prefix">person_pin</i>
                              <input id="alias_perfil" type="text" name="alias_perfil" class="validate" required/>
                              <label for="alias_perfil">Alias</label>
                          </div>
                      </div>
                      <div class="row center-align">
                          <a href="#" class="btn waves-effect grey tooltipped modal-close" data-tooltip="Cancelar"><i class="material-icons">cancel</i></a>
                          <button type="submit" class="btn waves-effect blue tooltipped" data-tooltip="Guardar"><i class="material-icons">save</i></button>
                      </div>
                  </form>
              </div>
          </div>

          <!-- Componente Modal para mostrar el formulario de cambiar contraseña -->
          <div id="password-modal" class="modal">
              <div class="modal-content">
                  <h4 class="center-align">Cambiar contraseña</h4>
                  <form method="post" id="password-form">
                      <div class="row">
                          <div class="input-field col s12 m6 offset-m3">
                              <i class="material-icons prefix">security</i>
                              <input id="clave_actual" type="password" name="clave_actual" class="validate" required/>
                              <label for="clave_actual">Clave actual</label>
                          </div>
                      </div>
                      <div class="row center-align">
                          <label>CLAVE NUEVA</label>
                      </div>
                      <div class="row">
                          <div class="input-field col s12 m6">
                              <i class="material-icons prefix">security</i>
                              <input id="clave_nueva_1" type="password" name="clave_nueva_1" class="validate" required/>
                              <label for="clave_nueva_1">Clave</label>
                          </div>
                          <div class="input-field col s12 m6">
                              <i class="material-icons prefix">security</i>
                              <input id="clave_nueva_2" type="password" name="clave_nueva_2" class="validate" required/>
                              <label for="clave_nueva_2">Confirmar clave</label>
                          </div>
                      </div>
                      <div class="row center-align">
                          <a href="#" class="btn waves-effect grey tooltipped modal-close" data-tooltip="Cancelar"><i class="material-icons">cancel</i></a>
                          <button type="submit" class="btn waves-effect blue tooltipped" data-tooltip="Guardar"><i class="material-icons">save</i></button>
                      </div>
                  </form>
              </div>
          </div>
      ');
  }
}
/*

*/