<?php
// Se incluye la clase con las plantillas del documento.
require_once('../../app/helpers/header_template.php');
// Se imprime la plantilla del encabezado enviando el título de la página web.
Public_Page::headerTemplate('Detalles del producto');
?>

<!-- Contenedor para mostrar el detalle del producto seleccionado previamente -->
<div class="container">
    <!-- Título del contenido principal -->
    <h4 class="center indigo-text" id="title">Detalles del producto</h4>
    <div class="row" id="detalle">
        <!-- Componente Horizontal Card para mostrar el detalle de un producto -->
        <div class="col s12 m12 l40">
            <div class="card horizontal">
                <div class="card-image">
                    <!-- Se muestra una imagen por defecto mientras se carga la imagen del producto -->
                    <img id="imagen" src="../../resources/img/unknown.png">
                </div>
                <div class="card-stacked">
                    <div class="card-content">
                        <h3 id="nombre" class="header"></h3>
                        <p id="descripcion"></p>
                        <p>Precio (US$) <b id="precio"></b></p>
                    </div>
                    <div class="card-action">
                        <!-- Formulario para agregar el producto al carrito de compras -->
                        <form method="post" id="shopping-form">
                            <!-- Campo oculto para asignar el id del producto -->
                            <input type="hidden" id="id_producto" name="id_producto" />
                            <div class="row center">
                                <div class="input-field col s12 m6">
                                    <i class="material-icons prefix">list</i>
                                    <input type="number" id="cantidad_producto" name="cantidad_producto" min="1"
                                        class="validate" required />
                                    <label for="cantidad_producto">Cantidad</label>
                                </div>
                                <div class="input-field col s12 m6">
                                    <button type="submit" class="btn waves-effect waves-light blue tooltipped"
                                        data-tooltip="Agregar al carrito"><i
                                            class="material-icons">add_shopping_cart</i></button>
                                            
                                    <a href="#" onclick="openCreateDialog()"
                                        class="btn waves-effect waves-light blue tooltipped"
                                        data-tooltip="Agregar valoracion"><i class="material-icons">star_border</i></a>
                                </div>

                            </div>
                    </div>
                    
                    </form>

                    <div>
                        <div class="row center-align">
                            <h4>Valoraciones del producto</h4>
                        </div>
                        <!-- Tabla para mostrar los registros existentes -->
                        <table class="striped responsive-table">
                            <!-- Cabeza de la tabla para mostrar los títulos de las columnas -->
                            <thead>
                                <tr>
                                    <th>Cliente</th>
                                    <th>Producto</th>
                                    <th>Calificación</th>
                                    <th>Comentario</th>
                                    <th class="hide">Estado comentario</th>
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
                                            <input id="calificacion_producto" type="number" name="calificacion_producto"
                                                class="validate" max="10" min="0" step="any" />
                                            <label for="calificacion_producto">Calificación</label>
                                        </div>
                                        <div class="input-field col s6">
                                            <input id="comentario_producto" type="text" name="comentario_producto"
                                                class="validate">
                                            <label for="comentario_producto">Comentario</label>
                                        </div>
                                        <div class="input-field col s6">
                                            <select id="producto_valoracion" name="producto_valoracion">
                                            </select>
                                            <label>Producto</label>
                                        </div>
                                        <div class="input-field col s6">
                                            <select id="cliente_valoracion" name="cliente_valoracion">
                                            </select>
                                            <label>Cliente</label>
                                        </div>
                                        <div class="col s12 m12 center-align">
                                            <p>
                                            <div class="hide">
                                                <span>Estado del comentario:</span>
                                                <label>
                                                    <i class="material-icons">block</i>
                                                    <input id="estado_comentario" type="checkbox"
                                                        name="estado_comentario" checked />
                                                    <span class="lever"></span>
                                                    <i class="material-icons">check</i>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                            <div class="row center-align">
                                <a href="#" class="btn waves-effect grey tooltipped modal-close"
                                    data-tooltip="Cancelar"><i class="material-icons">cancel</i></a>
                                <button type="submit" class="btn waves-effect blue tooltipped" data-tooltip="Guardar"><i
                                        class="material-icons">save</i></button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
</div>

<?php
// Se imprime la plantilla del pie enviando el nombre del controlador para la página web.
Public_Page::footerTemplate('detalle.js');
Public_Page::footerTemplate('valoraciones_public.js');
?>