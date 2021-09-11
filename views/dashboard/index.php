<?php
require_once("../../app/helpers/dashboard_template.php");
// Se imprime la plantilla del encabezado enviando el título de la página web.
Dashboard_Page::headerTemplate('Iniciar sesión');
$TimeOutMinutes = 5; // This is your TimeOut period in minutes
$LogOff_URL = "inactividad.php"; // If timed out, it will be redirected to this page

$TimeOutSeconds = $TimeOutMinutes * 60; // TimeOut in Seconds
if (isset($_SESSION['SessionStartTime'])) {
$InActiveTime = time() - $_SESSION['SessionStartTime'];
if ($InActiveTime >= $TimeOutSeconds) {

    session_destroy();
    //header("Location: $LogOff_URL");

}
}
     $_SESSION['SessionStartTime'] = time();
?>
<div class="container">
    <div class="row">
        <!-- Formulario para iniciar sesión -->
        <form method="post" id="session-form">
            <div class="input-field col s12 m6 offset-m3">
                <i class="material-icons prefix">person_pin</i>
                <input id="usuario1" type="text" name="usuario1" class="validate" required/>
                <label for="usuario">Usuario</label>
            </div>
            <div class="input-field col s12 m6 offset-m3">
                <i class="material-icons prefix">security</i>
                <input id="clave" type="password" name="clave" class="validate" required/>
                <label for="contra">Contraseña</label>
            </div>
            <div class="col s12 center-align">
                <button type="submit" class="btn waves-effect blue tooltipped" data-tooltip="Ingresar"><i class="material-icons">send</i></button>
            </div>
        </form>
    </div>
</div>
<?php
// Se imprime la plantilla del pie enviando el nombre del controlador para la página web.
Dashboard_Page::footerTemplate('index.js');
?>