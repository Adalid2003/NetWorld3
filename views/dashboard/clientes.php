<!--Se manda a llamar al helper del header-->
<?php
// Se incluye la clase con las plantillas del documento.
require_once('../../app/helpers/dashboard_template.php');
// Se imprime la plantilla del encabezado enviando el título de la página web.
Dashboard_Page::headerTemplate('Administrar clientes');
?>
<div class="container">
    <div class="container center">

        <!-- Se agrega el buscador -->
        <div class="row center-align">
            <form method="post" id="search-form">
                <div class="col s12">
                    <div class="input-field col s4 m6 valing-wrapper">
                        <i class="material-icons prefix ">search</i>
                        <input type="text" id="search" name="search" required/>
                        <label for="search">Buscar cliente...</label>
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
            <th>NOMBRE</th>
            <th>APELLIDOS</th>
            <th>TELEFONO</th>
            <th>DIRECCIÓN</th>
            <th>CORREO</th>
            <th>DUI</th>
            <th>FECHA DE NACIMIENTO</th>
            <th>ESTADO</th>
            <th>ACCIÓN</th>
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
            <input class="hide" type="number" id="id_categoria" name="id_categoria"/>
            <div class="row">
                <div class="input-field col s12 m6">
                    <input id="nombre_categoria" type="text" name="nombre_categoria" class="validate" required/>
                    <label for="nombre_categoria">Nombre</label>
                </div>
                <div class="input-field col s12 m6">
                    <input id="descripcion_categoria" type="text" name="descripcion_categoria" class="validate"/>
                    <label for="descripcion_categoria">Descripción</label>
                </div>
                <div class="file-field input-field col s12 m6">
                    <div class="btn waves-effect tooltipped" data-tooltip="Seleccione una imagen de al menos 500x500">
                        <span><i class="material-icons">burst_mode</i></span>
                        <input id="archivo_categoria" type="file" name="archivo_categoria" accept=".gif, .jpg, .png"/>
                    </div>
                    <div class="file-path-wrapper">
                        <input class="file-path validate" type="text" placeholder="Formatos aceptados: gif, jpg y png"/>
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
Dashboard_Page::footerTemplate('clientes.js');
?>