<!-- Se manda a llamar el template del sitio privado -->
<?php
require_once("../../app/helpers/dashboard_template.php");
Dashboard_Page::headerTemplate('Administrar productos');
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
                        <label for="search">Buscar producto...</label>
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
    <a href="../../app/reports/dashboard/productos.php" target="_blank" class="btn waves-effect amber tooltipped" data-tooltip="Reporte de productos por categoría"><i class="material-icons">assignment</i></a>
    <a href="../../app/reports/dashboard/productos_precio.php" target="_blank" class="btn waves-effect amber tooltipped" data-tooltip="Reporte de productos por precio"><i class="material-icons">assignment</i></a>
</div>


<!-- Se hace la tabla responsiva -->
<table class="responsive-table highlight">
    <thead>
        <tr>
            <th>Imagen</th>
            <th>Nombre</th>
            <th>Categoría</th>
            <th>Precio (US$)</th>
            <th>Estado</th>
            <th class="actions-column">Acción</th>
        </tr>
    </thead>

    <tbody id="tbody-rows">
    </tbody>
</table>

<div id="save-modal" class="modal">
    <div class="modal-content">
        <h4 id="modal-title" class="center-align"></h4>
        <form method="post" id="save-form" enctype="multipart/form-data">
            <input class="hide" type="number" id="id_producto" name="id_producto" />
            <form class="col s12">
                <div class="row">
                    <div class="input-field col s6">
                        <input id="nombre_producto" type="text" name="nombre_producto" class="validate" required>
                        <label for="nombre_producto">Nombre</label>
                    </div>
                    <div class="input-field col s6">
                        <input id="descripcion" type="text" name="descripcion" class="validate" required>
                        <label for="descripcion">Descripcion</label>
                    </div>
                    <div class="input-field col s6">
                        <input id="precio_producto" type="number" name="precio_producto" class="validate" max="999.99" min="0.01" step="any" required>
                        <label for="precio_producto">Precio ($)</label>
                    </div>
                    <div class="input-field col s6">
                        <select id="categoria_producto" name="categoria_producto">
                        </select>
                        <label>Categoría</label>
                    </div>
                    <div class="file-field input-field col s6">
                        <div class="btn waves-effect tooltipped" data-tooltip="Seleccione una imagen de al menos 500x500">
                            <span><i class="material-icons">image</i></span>
                            <input id="archivo_producto" type="file" name="archivo_producto" accept=".gif, .jpg, .png" />
                        </div>
                        <div class="file-path-wrapper">
                            <input type="text" class="file-path validate" placeholder="Formatos aceptados: gif, jpg y png" />
                        </div>
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
            </form>
    </div>
</div>

<?php
// Se imprime la plantilla del pie enviando el nombre del controlador para la página web.
Dashboard_Page::footerTemplate('productos.js');
?>