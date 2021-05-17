<!--Se manda a llamar al helper del header-->
<?php
require_once("../../app/helpers/dashboard_template.php");
Dashboard_Page::headerTemplate('Administrar compras');
?>
<title>Control compras</title>
<!--Se crean las cartas de los formularios-->
<div class="container">
    <div class="container center">
        <h4>Compras</h4>


        <div class="row">
            <div class="col s12">
                <div class="row">
                    <div class="input-field col s12">
                        <i class="material-icons prefix">find_replace</i>
                        <input type="text" id="autocomplete-input" class="autocomplete">
                        <label for="autocomplete-input">Buscar compra...</label>
                    </div>
                </div>
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

            </tr>
        </thead>

        <tbody>

        </tbody>
    </table>
</div>
<div id="save-modal" class="modal">
    <div class="row">
        <h4 class="center">Gestionar compras</h4>
        <form class="col s12">
            <div class="row">
                <div class="input-field col s12 m6">
                    <div class="input-field col s6">
                        <select id="id_cliente" name="id_cliente">
                        </select>
                        <label>Cliente</label>
                    </div>
                    <div class="input-field col s6">
                        <input id="fecha_co" type="date" class="validate" required>
                        <label for="fecha_co">Fecha de la compra</label>
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
    </div>

    <?php
    // Se imprime la plantilla del pie enviando el nombre del controlador para la página web.
    Dashboard_Page::footerTemplate('compras.js');
    ?>