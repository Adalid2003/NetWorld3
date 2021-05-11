<!-- Se manda a llamar el template del sitio privado -->
<?php
require_once("../../app/helpers/dashboard_template.php");
Dashboard_Page::headerTemplate('Administrar valoraciones');
?>

<!-- Se declara la clse container -->
<div class="container">
    <div class="container center">

        <!-- Se agrega el buscador -->
        <div class="row center-align">
            <form method="post" id="search-form">
                <div class="col s12">
                    <div class="input-field col s4 m6 valing-wrapper">
                        <i class="material-icons prefix ">search</i>
                        <input type="text" id="search" name="search" required />
                        <label for="search">Buscar categoría...</label>
                    </div>
                    <div class="input-field col s6 m4 right-align">
                        <button type="submit" class="btn waves-effect   light-blue darken-4 waves-light btn-medium" data-tooltip="Buscar"><i class="material-icons"></i>Buscar</button>
                    </div>
            </form>
        </div>
    </div>
</div>

<div class="input-field col s6 m4">
    <a href="#" onclick="openCreateDialog()" class="btn waves-effect cyan darken-1  tooltipped" data-tooltip="Agregar"><i class="material-icons">add</i></a>
</div>

<!-- Tabla para mostrar los registros existentes -->
<table class="striped responsive-table">
    <!-- Cabeza de la tabla para mostrar los títulos de las columnas -->
    <thead>
        <tr>
            <th>Calificación</th>
            <th>Comentario</th>
            <th>Estado comentario</th>
            <th class="actions-column">Acción</th>
        </tr>
    </thead>
    <!-- Cuerpo de la tabla para mostrar un registro por fila -->
    <tbody id="tbody-rows">
    </tbody>
</table>

<!-- Componente Modal para mostrar una caja de dialogo -->
<div id="save-modal" class="modal">
    <div class="modal-content">
        <!-- Título para la caja de dialogo -->
        <h4 id="modal-title" class="center-align"></h4>
        <!-- Formulario para crear o actualizar un registro -->
        <form method="post" id="save-form" enctype="multipart/form-data">
            <!-- Campo oculto para asignar el id del registro al momento de modificar -->
            <input class="hide" type="number" id="id_valoracion" name="id_valoracion" />
            <div class="row">
                <div class="input-field col s12 m6">
                    <input id="calificacion_producto" type="number" name="calificacion_producto" class="validate" max="10" min="0" step="any" />
                    <label for="calificacion_producto">Calificación</label>
                </div>
                <div class="input-field col s6">
                    <input id="comentario_producto" type="text" name="comentario_producto" class="validate">
                    <label for="comentario_producto">Comentario</label>
                </div>
                <div class="col s12 m12 center-align">
                    <p>
                    <div class="switch">
                        <span>Estado del comentario:</span>
                        <label>
                            <i class="material-icons">visibility_off</i>
                            <input id="estado_comentario" type="checkbox" name="estado_comentario" checked />
                            <span class="lever"></span>
                            <i class="material-icons">visibility</i>
                        </label>
                    </div>
                    </p>
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
Dashboard_Page::footerTemplate('valoraciones.js');
?>