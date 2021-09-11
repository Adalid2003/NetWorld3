<!--Se manda a llamar al helper del header-->
<?php
require_once("../../app/helpers/dashboard_template.php");
Dashboard_Page::headerTemplate('Administrar compras');
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
    <div class="container center">

        <!-- Se agrega el buscador -->
        <div class="row center-align">
            <form method="post" id="search-form">
                <div class="col s12">
                    <div class="input-field col s4 m6 valing-wrapper">
                        <i class="material-icons prefix ">search</i>
                        <input type="text" id="search" name="search" required />
                        <label for="search">Buscar compra...</label>
                    </div>
                    <div class="input-field col s6 m4 right-align">
                        <button type="submit" class="btn waves-effect   light-blue darken-4 waves-light btn-medium" data-tooltip="Buscar"><i class="material-icons"></i>Buscar</button>
                        <a href="../../app/reports/dashboard/compras.php" target="_blank" class="btn waves-effect amber tooltipped" data-tooltip="Reporte de productos por categoría"><i class="material-icons">assignment</i></a>
                    </div>
            </form>
        </div>
    </div>
</div>

<div class="input-field col s6 m4">
    <a href="#" onclick="openCreateDialog()" class="btn waves-effect cyan darken-1  tooltipped" data-tooltip="Agregar"><i class="material-icons">add</i></a>
</div>
<table class="striped responsive-table">
    <thead>
        <tr>
            <th>Cliente</th>
            <th>Fecha compra</th>
            <th>Estado compra</th>
            <th class="actions-column">Acción</th>
        </tr>
    </thead>

    <tbody id="tbody-rows">

    </tbody>
</table>
</div>
<div id="save-modal" class="modal">
    <div class="modal-content">
        <!-- Título para la caja de dialogo -->
        <h4 id="modal-title" class="center-align"></h4>
        <!-- Formulario para crear o actualizar un registro -->
        <form method="post" id="save-form" enctype="multipart/form-data">
            <!-- Campo oculto para asignar el id del registro al momento de modificar -->
            <input class="hide" type="number" id="id_compra" name="id_compra" />
            <div class="row">
                <div class="input-field col s6">
                    <select id="cliente_compra" name="cliente_compra">
                    </select>
                    <label>Cliente</label>
                </div>
                <div class="input-field col s12 m6">
                    <i class="material-icons prefix">date_range</i>
                    <input id="fecha_compra" type="date" name="fecha_compra" class="validate" required />
                    <label for="fecha_compra">Fecha de la compra</label>
                </div>
                <div class="input-field col s12 m6">
                    <div class="switch">
                        <span>Estado compra:</span>
                        <label>
                            <i class="material-icons">lock_outline</i>
                            <input id="estado_compra" type="checkbox" name="estado_compra" checked />
                            <span class="lever"></span>
                            <i class="material-icons">lock_open</i>
                        </label>
                    </div>
                </div>
            </div>
            <div class="row center-align">
                <a href="#" class="btn waves-effect grey tooltipped modal-close" data-tooltip="Cancelar"><i class="material-icons">cancel</i></a>
                <button type="submit" class="btn waves-effect blue tooltipped" data-tooltip="Guardar"><i class="material-icons">save</i></button>
            </div>
        </form>
    </div>
</div>
<?php
// Se imprime la plantilla del pie enviando el nombre del controlador para la página web.
Dashboard_Page::footerTemplate('compras.js');
?>