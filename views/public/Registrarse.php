<?php
// Se incluye la clase con las plantillas del documento.
require_once('../../app/helpers/header_template.php');
// Se imprime la plantilla del encabezado enviando el título de la página web.
Public_Page::headerTemplate('Registrar Cliente');
?>

<!-- Formulario para registrar al primer usuario del dashboard -->
<form method="post" id="register-form" enctype="multipart/form-data">
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
        <div class="input-field col s12 m6">
            <i class="material-icons prefix">perm_identity</i>
            <input id="dui_u" type="text" name="dui_u" placeholder="00000000-0" pattern="[0-9]{8}[-][0-9]{1}" class="validate" required/>
            <label for="dui_u">DUI</label>
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

<?php
// Se imprime la plantilla del pie enviando el nombre del controlador para la página web.
Public_Page::footerTemplate('signin.js');
?>