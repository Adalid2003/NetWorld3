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
  <div class="input-field col s6 m4">
    <a href="#" onclick="openCreateDialog()" class="btn waves-effect cyan darken-1 tooltipped" data-tooltip="Crear"><i class="material-icons">add</i></a>
</div>


<!-- Se hace la tabla responsiva -->
<table class="striped responsive-table">
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
<div class="row">
        <div class="input-field col s12 m6">
          	<i class="material-icons prefix">person</i>
          	<input id="nombres" type="text" name="nombres" class="validate" required/>
          	<label for="nombres">Nombres</label>
        </div>
        <div class="input-field col s12 m6">
            <i class="material-icons prefix">person</i>
            <input id="apellidos" type="text" name="apellidos" class="validate" required/>
            <label for="apellidos">Apellidos</label>
        </div>
        <div class="input-field col s12 m6">
            <i class="material-icons prefix">email</i>
            <input id="correo" type="email" name="correo" class="validate" required/>
            <label for="correo">Correo</label>
        </div>
        <div class="input-field col s12 m6">
            <i class="material-icons prefix">person_pin</i>
            <input id="alias" type="text" name="alias" class="validate" required/>
            <label for="alias">Usuario</label>
        </div>
        <div class="input-field col s12 m6">
            <i class="material-icons prefix">security</i>
            <input id="clave1" type="password" name="clave1" class="validate" required/>
            <label for="clave1">Contrseña</label>
        </div>
        <div class="input-field col s12 m6">
            <i class="material-icons prefix">security</i>
            <input id="clave2" type="password" name="clave2" class="validate" required/>
            <label for="clave2">Confirmar contraseña</label>
        </div>
        <div class="input-field col s6">
                        <select id="tipo_usuario" name="tipo_usuario">
                        </select>
                        <label>Tipo de usuario</label>
                    </div>
        <div class="input-field col s12 m6">
            <i class="material-icons prefix">perm_identity</i>
            <input id="dui" type="text" name="dui" class="validate" required/>
            <label for="dui">DUI</label>
        </div>
        <div class="file-field input-field col s12 m6">
                    <div class="btn waves-effect tooltipped blue">
                        <span><i class="material-icons">image</i></span>
                        <input id="foto_usuario" type="file" name="foto_usuario" accept=".jpg, .png"/>
                    </div>
                    <div class="file-path-wrapper">
                        <input class="file-path validate" type="text" placeholder="Formatos aceptados: jpg y png" required/>
                    </div>
        </div>
        <div class="input-field col s12 m6">
            <i class="material-icons prefix">map</i>
            <input id="direccion" type="text" name="direccion" class="validate" required/>
            <label for="direccion">Dirección</label>
        </div>
      </div>
    </div>
    <div class="row center-align">
 	    <button type="submit" class="btn waves-effect blue tooltipped" data-tooltip="Registrar"><i class="material-icons">send</i></button>
    </div>
            </form>
    </div>
</div>


  <!--Se manda a llamar al helper del footer-->
  <?php
// Se imprime la plantilla del pie enviando el nombre del controlador para la página web.
Dashboard_Page::footerTemplate('usuarios.js');
?>