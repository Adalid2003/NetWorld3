<!--Se manda a llamar al helper del header-->
<?php
// Se incluye la clase con las plantillas del documento.
require_once('../../app/helpers/dashboard_template.php');
// Se imprime la plantilla del encabezado enviando el título de la página web.
Dashboard_Page::headerTemplate('Administrar usuarios');
?>
<title>Control usuarios</title>
<!--Se crean las cartas de los formularios-->
<div class="container">
  <div class="container center">
    <h4>Usuarios</h4>


    <div class="row center-align">
      <form method="post" id="search-form">
        <div class="col s12">
          <div class="input-field col s4 m6 valing-wrapper">
            <i class="material-icons prefix ">search</i>
            <input type="text" id="search" name="search" required />
            <label for="search">Buscar usuario...</label>
          </div>
          <div class="input-field col s6 m4 right-align">
            <button type="submit" class="btn waves-effect  light-blue darken-4 waves-light btn-medium" data-tooltip="Buscar"><i class="material-icons"></i>Buscar</button>
          </div>
      </form>
    </div>
  </div>
</div>
<div class="input-field col s6 m4">
  <a href="#" onclick="openCreateDialog()" class="btn waves-effect cyan darken-1 tooltipped" data-tooltip="Crear"><i class="material-icons">add</i></a>
</div>


<!-- Se hace la tabla responsiva -->
<table class="responsive-table highlight">
  <thead>
    <tr>
      <th>Imagen</th>
      <th>Nombre</th>
      <th>Apellidos</th>
      <th>DUI</th>
      <th>Dirección</th>
      <th>Tipo de usuario</th>
      <th>Correo</th>
      <th>Usuario</th>
      <th class="actions-column">Acción</th>
    </tr>
  </thead>

  <tbody id="tbody-rows">
  </tbody>
</table>
<div id="save-modal" class="modal">
  <h4 id="modal-title" class="center-align"></h4>
  <form method="post" id="save-form" enctype="multipart/form-data">
    <input class="hide" type="number" id="id_usuario" name="id_usuario" />
    <div class="row">
      <div class="input-field col s12 m6">
        <i class="material-icons prefix">person</i>
        <input id="nombres" type="text" name="nombres" class="validate" required />
        <label for="nombres">Nombres</label>
      </div>
      <div class="input-field col s12 m6">
        <i class="material-icons prefix">person</i>
        <input id="apellidos" type="text" name="apellidos" class="validate" required />
        <label for="apellidos">Apellidos</label>
      </div>
      <div class="input-field col s12 m6">
        <i class="material-icons prefix">email</i>
        <input id="correo" type="email" name="correo" class="validate" required />
        <label for="correo">Correo</label>
      </div>
      <div class="input-field col s12 m6">
        <i class="material-icons prefix">person_pin</i>
        <input id="alias" type="text" name="alias" class="validate" required />
        <label for="alias">Usuario</label>
      </div>
      <div class="input-field col s12 m6">
        <i class="material-icons prefix">security</i>
        <input id="clave1" type="password" name="clave1" class="validate" required />
        <label for="clave1">Contrseña</label>
      </div>
      <div class="input-field col s12 m6">
        <i class="material-icons prefix">security</i>
        <input id="clave2" type="password" name="clave2" class="validate" required />
        <label for="clave2">Confirmar contraseña</label>
      </div>
      <div class="input-field col s6">
        <select id="tipo_usuario" name="tipo_usuario">
        </select>
        <label>Tipo de usuario</label>
      </div>
      <div class="input-field col s12 m6">
        <i class="material-icons prefix">perm_identity</i>
        <input id="dui_u" type="text" name="dui_u" placeholder="00000000-0" pattern="[0-9]{8}[-][0-9]{1}" class="validate" required />
        <label for="dui_u">DUI</label>
      </div>
      <div class="file-field input-field col s12 m6">
        <div class="btn waves-effect tooltipped blue">
          <span><i class="material-icons">image</i></span>
          <input id="foto_usuario" type="file" name="foto_usuario" accept=".jpg, .png" required />
        </div>
        <div class="file-path-wrapper">
          <input class="file-path validate" type="text" placeholder="Formatos aceptados: jpg y png"></input>
        </div>
      </div>
      <div class="input-field col s12 m6">
        <i class="material-icons prefix">map</i>
        <input id="direccion" type="text" name="direccion" class="validate" required />
        <label for="direccion">Dirección</label>
      </div>
      <div class="col s12 m6">
                        <p>
                        <div class="switch">
                            <span>Estado:</span>
                            <label>
                                <i class="material-icons">lock_outline</i>
                                <input id="estado_producto" type="checkbox" name="estado_producto" checked />
                                <span class="lever"></span>
                                <i class="material-icons">lock_open</i>
                            </label>
                        </div>
                        </p>
                    </div>
    </div>
    <div class="row center-align">
      <a href="#" class="btn waves-effect grey tooltipped modal-close" data-tooltip="Cancelar"><i class="material-icons">cancel</i></a>
      <button type="submit" class="btn waves-effect blue tooltipped" data-tooltip="Guardar"><i class="material-icons">save</i></button>
    </div>
</div>
</form>
</div>
</div>


<!--Se manda a llamar al helper del footer-->
<?php
// Se imprime la plantilla del pie enviando el nombre del controlador para la página web.
Dashboard_Page::footerTemplate('usuarios.js');
?>