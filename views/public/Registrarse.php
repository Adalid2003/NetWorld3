<?php
// Se incluye la clase con las plantillas del documento.
require_once('../../app/helpers/header_template.php');
// Se imprime la plantilla del encabezado enviando el título de la página web.
Public_Page::headerTemplate('Registrar Cliente');
?>

<h4 class="center-align indigo-text">Regístrate como cliente</h4>
<!-- Formulario para registrar al primer usuario del dashboard -->
<form method="post" id="register-form">
 <!-- Campo oculto para asignar el token del reCAPTCHA -->
 <input type="hidden" id="g-recaptcha-response" name="g-recaptcha-response"/>
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
            <input id="correo_cliente" type="email" name="correo_cliente" class="validate" autocomplete="off" required/>
            <label for="correo">Correo</label>
        </div>
        <div class="input-field col s12 m6">
            <i class="material-icons prefix">person_pin</i>
            <input id="alias" type="text" name="alias" class="validate" autocomplete="off" required/>
            <label for="alias">Usuario</label>
        </div>
        <div class="input-field col s12 m6">
            <i class="material-icons prefix">security</i>
            <input id="clave1" type="password" name="clave1" class="validate" autocomplete="off"  required/>
            <label for="clave1">Contraseña</label>
        </div>
        <div class="input-field col s12 m6">
            <i class="material-icons prefix">security</i>
            <input id="clave2" type="password" name="clave2" class="validate"  autocomplete="off" required/>
            <label for="clave2">Confirmar contraseña</label>
        </div>
        <div class="input-field col s12 m6">
            <i class="material-icons prefix">perm_identity</i>
            <input id="dui_c" type="text" name="dui_c" placeholder="00000000-0" pattern="[0-9]{8}[-][0-9]{1}" class="validate" autocomplete="off"  required/>
            <label for="dui_c">DUI</label>
        </div>
        <div class="input-field col s12 m6">
            <i class="material-icons prefix">map</i>
            <input id="direccion" type="text" name="direccion" class="validate" required/>
            <label for="direccion">Dirección</label>
        </div>
        <div class="input-field col s12 m6">
            <i class="material-icons prefix">cake</i>
            <input id="fecha_nacimiento" type="date" name="fecha_nacimiento" class="validate" required/>
            <label for="fecha_nacimiento">Fecha de nacimiento</label>
        </div>
        <div class="input-field col s12 m6">
            <i class="material-icons prefix">phone</i>
            <input id="telefono" type="text" name="telefono" class="validate" required/>
            <label for="telefono">Telefono</label>
        </div>
        <label class="center-align col s12">
                <input type="checkbox" id="condicion" name="condicion" required/>
                <span>Acepto <a href="#terminos" class="modal-trigger">términos y condiciones</a></span>
            </label>
      </div>
    </div>
    <div class="row center-align">
 	    <button type="submit" class="btn waves-effect blue tooltipped" data-tooltip="Registrar"><i class="material-icons">send</i></button>
    </div>
</form>

<!-- Importación del archivo para que funcione el reCAPTCHA. Para más información https://developers.google.com/recaptcha/docs/v3 -->
    <script type="text/javascript" src="https://www.google.com/recaptcha/api.js?render=6LfPolscAAAAAJhhr_ZSPtMJBcZuJMRUbI_uUa_r"></script>


<?php
// Se imprime la plantilla del pie enviando el nombre del controlador para la página web.
Public_Page::footerTemplate('signin.js');
?>