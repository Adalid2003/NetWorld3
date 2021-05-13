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
                        <input type="text" id="search" name="search" required />
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
            <input class="hide" type="number" id="id_cliente" name="id_cliente" />
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
                    <i class="material-icons prefix">security</i>
                    <input id="clave1" type="password" name="clave1" class="validate" required />
                    <label for="clave1">Contrseña</label>
                </div>
                <div class="input-field col s12 m6">
                    <i class="material-icons prefix">security</i>
                    <input id="clave2" type="password" name="clave2" class="validate" required />
                    <label for="clave2">Confirmar contraseña</label>
                </div>
                <div class="input-field col s12 m6">
                    <i class="material-icons prefix">perm_identity</i>
                    <input id="dui_c" type="text" name="dui_c" placeholder="00000000-0" pattern="[0-9]{8}[-][0-9]{1}" class="validate" required />
                    <label for="dui_c">DUI</label>
                </div>
                <div class="input-field col s12 m6">
                    <i class="material-icons prefix">map</i>
                    <input id="direccion" type="text" name="direccion" class="validate" required />
                    <label for="direccion">Dirección</label>
                </div>
                <div class="input-field col s12 m6">
                    <i class="material-icons prefix">cake</i>
                    <input id="fecha_nacimiento" type="date" name="fecha_nacimiento" class="validate" required />
                    <label for="fecha_nacimiento">Fecha de nacimiento</label>
                </div>
                <div class="input-field col s12 m6">
                    <i class="material-icons prefix">phone</i>
                    <input id="telefono" type="text" name="telefono" placeholder="0000-0000" pattern="[2,6,7]{1}[0-9]{3}[-][0-9]{4}" class="validate" required />
                    <label for="telefono">Telefono</label>
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