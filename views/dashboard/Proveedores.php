<!-- MANDAR A LLAMAR HELPERS  -->
<?php
require_once("../../app/helpers/dashboard_template.php");
Dashboard_Page::headerTemplate('Administrar proveedores');
?>

<div class="row">
    <!-- Se agrega el buscador -->
    <form method="post" id="search-form">
        <div class="input-field col s6 m4">
            <i class="material-icons prefix">search</i>
            <input id="search" type="text" name="search" required/>
            <label for="search">Buscador</label>
        </div>
        <div class="input-field col s6 m4 right-align">
                        <button type="submit" class="btn waves-effect  light-blue darken-4 waves-light btn-medium" data-tooltip="Buscar"><i class="material-icons"></i>Buscar</button>
                    </div>
    </form>
    <div class="input-field col s6 m4">
    <a href="#" onclick="openCreateDialog()" class="btn waves-effect cyan darken-1 tooltipped" data-tooltip="Crear"><i class="material-icons">add</i></a>
</div>

<!-- Tabla para mostrar los registros existentes -->
<table class="highlight">
    <!-- Cabeza de la tabla para mostrar los títulos de las columnas -->
    <thead>
        <tr>
            <th>Nombre Proveedor</th>
            <th>Telefono Proveedor</th>
            <th>Direccion Proveedor</th>
            <th class="actions-column">Acción</th>
            
        </tr>
    </thead>
    <!-- Cuerpo de la tabla para mostrar un registro por fila -->
    <tbody id="tbody-rows">
    </tbody>
</table>


<div id="save-modal" class="modal">
    <div class="modal-content">
      
        <h4 id="modal-title" class="center-align"></h4>
        <!-- Formulario para crear o actualizar un registro -->
        <form method="post" id="save-form" enctype="multipart/form-data">
            <!-- Campo oculto para asignar el id del registro al momento de modificar -->
            <input class="hide" type="number" id="id_proveedor" name="id_proveedor"/>
            <div class="row">
                <div class="input-field col s12 m6">
                    
                    <input id="nombre_proveedor" type="text" name="nombre_proveedor" class="validate" required/>
                    <label for="nombre_proveedor">Nombre Proveedor</label>
                </div>
                <div class="input-field col s12 m6">
                    
                    <input id="telefono_proveedor" type="text" name="telefono_proveedor" class="validate"/>
                    <label for="telefono_proveedor">Telefono proveedor</label> 
                </div>
                <div class="input-field col s12 m6">
                    
                    <input id="direccion_proveedor" type="text" name="direccion_proveedor" class="validate"/>
                    <label for="direccion_proveedor">Direccion proveedor</label> 
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
Dashboard_Page::footerTemplate('proveedores.js');
?>
