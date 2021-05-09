<!--Se manda a llamar al helper del header-->
<?php
include("../../app/helpers/dashboard_template.php");
?>
<title>Control usuarios</title>
<!--Se crean las cartas de los formularios-->
<div class="container">
  <div class="container center">
    <h4>Usuarios</h4>


    <div class="row">
      <div class="col s12">
        <div class="row">
          <div class="input-field col s12">
            <i class="material-icons prefix">find_replace</i>
            <input type="text" id="autocomplete-input" class="autocomplete">
            <label for="autocomplete-input">Buscar usuario...</label>
          </div>
        </div>
      </div>
    </div>
  </div>
  <table class="striped responsive-table">
    <thead>
      <tr>
        <th>Imagen</th>
        <th>Nombre</th>
        <th>Tipo usuario</th>
        <th>Estado</th>
        <th>Acción</th>
      </tr>
    </thead>

    <tbody>
      <a id="scale-demo" href="#modal1" class="green btn-floating btn-large scale-transition modal-trigger">
        <i class="material-icons">add</i>
      </a>
      <h5>Agregar usuario</h5>
      <tr>
        <td><a class="brand-logo"> <img src="../../resources/img/users/user.png" height="85"></a></td>
        <td>José Jiménez</td>
        <td>Root</td>
        <td>Activo</td>
        <td>
          <a id="scale-demo" href="../dashboard/usuarios.php" class="blue btn-floating btn-large scale-transition">
            <i class="material-icons">autorenew</i>
          </a>
          <a id="scale-demo" href="../dashboard/usuarios.php" class="red btn-floating btn-large scale-transition">
            <i class="material-icons">close</i>
          </a>
        </td>
      </tr>
      <tr>
        <td><a class="brand-logo"> <img src="../../resources/img/users/user.png" height="85"></a></td>
        <td>Rene Meza</td>
        <td>Administrador</td>
        <td>Activo</td>
        <td>
          <a id="scale-demo" href="../dashboard/usuarios.php" class="blue btn-floating btn-large scale-transition">
            <i class="material-icons">autorenew</i>
          </a>
          <a id="scale-demo" href="../dashboard/usuarios.php" class="red btn-floating btn-large scale-transition">
            <i class="material-icons">close</i>
          </a>
        </td>
      </tr>
      <tr>
        <td><a class="brand-logo"> <img src="../../resources/img/users/user.png" height="85"></a></td>
        <td>Wiliiam Amaya</td>
        <td>Cliente</td>
        <td>Activo</td>
        <td>
          <a id="scale-demo" href="../dashboard/usuarios.php" class="blue btn-floating btn-large scale-transition">
            <i class="material-icons">autorenew</i>
          </a>
          <a id="scale-demo" href="../dashboard/usuarios.php" class="red btn-floating btn-large scale-transition">
            <i class="material-icons">close</i>
          </a>
        </td>
      </tr>

    </tbody>
  </table>
</div>
<div id="modal1" class="modal">
  <div class="row">
    <h4 class="center">Gestionar usuarios</h4>
    <form class="col s12">
      <div class="row">
        <div class="input-field col s6">
          <input id="first_name" type="text" class="validate" required>
          <label for="first_name">Nombre</label>
        </div>
        <div class="input-field col s6">
          <input id="last_name" type="text" class="validate" required>
          <label for="last_name">Apellido</label>
        </div>
        <div class="input-field col s6">
          <input id="dui" type="text" class="validate" required>
          <label for="dui_user">DUI</label>
        </div>
        <div class="input-field col s6">
          <input id="direccion" type="text" class="validate" required>
          <label for="direccion_user">Dirección</label>
        </div>
        <div class="input-field col s6">
          <input id="password" type="password" class="validate" required>
          <label for="password">Contraseña</label>
        </div>
        <div class="input-field col s6">
          <input id="email" type="email" class="validate" required>
          <label for="email">Email</label>
        </div>
        <div class="input-field col s6">
          <input id="user" type="text" class="validate" required>
          <label for="user">Usuario</label>
        </div>
        <div class="input-field col s12 m6">
          <select>
            <option value="" disabled selected>Tipo de usuario</option>
            <option value="1">Option 1</option>
            <option value="2">Option 2</option>
            <option value="3">Option 3</option>
          </select>
          <label>Seleccione el tipo de usuario</label>
        </div>
        <div class="file-field input-field col s12 m6">
                    <div class="btn waves-effect tooltipped blue">
                        <span><i class="material-icons">image</i></span>
                        <input id="foto_usuario" type="file" name="foto_usuario" accept=".jpg, .png"/>
                    </div>
                    <div class="file-path-wrapper">
                        <input class="file-path validate" type="text" placeholder="Formatos aceptados: jpg y png"/>
                    </div>
                </div>
      </div>
      <div class="row center-align">
        <a href="#!" class="modal-close waves-effect grey btn-flat white-text">Cancelar</a>
        <button type="submit" class="btn waves-effect blue tooltipped" data-tooltip="Guardar">Guardar</button>
      </div>
  </div>
</div>

  <!--Se manda a llamar al helper del footer-->
  <?php
  include("../../app/helpers/template_footer_private.php");
  ?>