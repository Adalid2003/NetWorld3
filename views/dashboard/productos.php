<!-- Se manda a llamar el template del sitio privado -->
<?php
include("../../app/helpers/dashboard_template.php");
?>



<!-- Se declara la clse container -->
<div class="container">
    <div class="container center">
        <h4>Productos</h4>

        <!-- Se agrega el buscador -->
        <div class="row">
            <div class="col s12">
                <div class="row">
                    <div class="input-field col s12">
                        <i class="material-icons prefix">find_replace</i>
                        <input type="text" id="autocomplete-input" class="autocomplete">
                        <label for="autocomplete-input">Buscar producto...</label>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Se hace la tabla responsiva -->
    <table class="striped responsive-table">
        <thead>
            <tr>
                <th>Imagen</th>
                <th>Nombre</th>
                <th>Categoría</th>
                <th>Estado</th>
                <th>Acción</th>
            </tr>
        </thead>

        <tbody>
            <a id="scale-demo" href="#modal1" class="green btn-floating btn-large scale-transition modal-trigger">
                <i class="material-icons">add</i>
            </a>
            <h5>Agregar producto</h5>
            <tr>
                <td><a class="brand-logo"> <img src="../../resources/img/cards/modem_fibra1.jpg" height="85"></a></td>
                <td>EPON ONU módem Fibra Óptica</td>
                <td>Modem de fibra óptica</td>
                <td>Disponible</td>
                <td>
                    </a>
                    <a id="scale-demo" href="productos_actualizar.php" class="blue btn-floating btn-large scale-transition">
                        <i class="material-icons">autorenew</i>
                    </a>
                    <a id="scale-demo" href="#!" class="red btn-floating btn-large scale-transition">
                        <i class="material-icons">close</i>
                    </a>
                </td>
            </tr>
            <tr>
                <td><a class="brand-logo"> <img src="../../resources/img/cards/hub1.jpg" height="85"></a></td>
                <td>Hub de transceptor pasivo Utp de 16 canales W</td>
                <td>Hub pasivo</td>
                <td>Disponible</td>
                <td>
                    <a id="scale-demo" href="#!" class="blue btn-floating btn-large scale-transition">
                        <i class="material-icons">autorenew</i>
                    </a>
                    <a id="scale-demo" href="#!" class="red btn-floating btn-large scale-transition">
                        <i class="material-icons">close</i>
                    </a>
                </td>
            </tr>
            <tr>
                <td><a class="brand-logo"> <img src="../../resources/img/cards/switch_ether1.jpg" height="85"></a></td>
                <td>Switches de acceso administrados en la nube Cisco Meraki MS (PoE)</td>
                <td>Switch de acceso a Ethernet</td>
                <td>Disponible</td>
                <td>
                    <a id="scale-demo" href="#!" class="blue btn-floating btn-large scale-transition">
                        <i class="material-icons">autorenew</i>
                    </a>
                    <a id="scale-demo" href="#!" class="red btn-floating btn-large scale-transition">
                        <i class="material-icons">close</i>
                    </a>
                </td>
            </tr>
            <tr>
                <td><a class="brand-logo"> <img src="../../resources/img/cards/switch_pro1.jpg" height="85"></a></td>
                <td>Cisco Switch Catalyst 3560-X Series (Capada de cifrado 2 + TrustSec)</td>
                <td>Switches para proveedores</td>
                <td>No disponible</td>
                <td>
                    <a id="scale-demo" href="#!" class="blue btn-floating btn-large scale-transition">
                        <i class="material-icons">autorenew</i>
                    </a>
                    <a id="scale-demo" href="#!" class="red btn-floating btn-large scale-transition">
                        <i class="material-icons">close</i>
                    </a>
                </td>
            </tr>
            <tr>
                <td><a class="brand-logo"> <img src="../../resources/img/cards/modem1_1.jpg" height="85"></a></td>
                <td>Actiontec GT701 1-Port 10/100 Wired Router</td>
                <td>Modem DSL</td>
                <td>No disponible</td>
                <td>
                    <a id="scale-demo" href="#!" class="blue btn-floating btn-large scale-transition">
                        <i class="material-icons">autorenew</i>
                    </a>
                    <a id="scale-demo" href="#!" class="red btn-floating btn-large scale-transition">
                        <i class="material-icons">close</i>
                    </a>
                </td>
            </tr>
        </tbody>
    </table>
</div>
<div id="modal1" class="modal">
  <div class="row">
    <h4 class="center">Gestionar productos</h4>
    <form class="col s12">
      <div class="row">
        <div class="input-field col s6">
          <input id="first_name" type="text" class="validate" required>
          <label for="first_name">Nombre</label>
        </div>
        <div class="input-field col s6">
          <input id="price" type="text" class="validate" required>
          <label for="price">Precio (USD)</label>
        </div>
        <div class="input-field col s6">
          <input id="date_ingreso" type="date" class="validate" required>
          <label for="date_ingreso">Fecha de ingreso</label>
        </div>
        <div class="input-field col s6">
          <input id="descripcion_pro" type="text" class="validate" required>
          <label for="descripcion_pro">Descripción</label>
        </div>
        <div class="input-field col s6">
          <input id="cantidad_pro" type="text" class="validate" required>
          <label for="cantidad_pro">Cantidad</label>
        </div>
        <div class="input-field col s12 m6">
          <select>
            <option value="" disabled selected>Estado del prodcuto</option>
            <option value="1">Option 1</option>
            <option value="2">Option 2</option>
            <option value="3">Option 3</option>
          </select>
          <label>Seleccione el estado del producto</label>
        </div>
        <div class="input-field col s12 m6">
          <select>
            <option value="" disabled selected>Categoria</option>
            <option value="1">Option 1</option>
            <option value="2">Option 2</option>
            <option value="3">Option 3</option>
          </select>
          <label>Seleccione la categoria del producto</label>
        </div>
        <div class="file-field input-field col s12 m6">
                    <div class="btn waves-effect tooltipped blue">
                        <span><i class="material-icons">image</i></span>
                        <input id="foto_usuario" type="file" name="foto_usuario" accept=".jpg, .png"/>
                    </div>
                    <div class="file-path-wrapper">
                        <input class="file-path validate" type="text" placeholder="Formatos aceptados: jpg y png"/>
                    </div>
                </div>
      </div>
      <div class="row center-align">
        <a href="#!" class="modal-close waves-effect grey btn-flat white-text">Cancelar</a>
        <button type="submit" class="btn waves-effect blue tooltipped" data-tooltip="Guardar">Guardar</button>
      </div>
  </div>
</div>
<!-- Se manda a llamar el footer -->
<?php
include("../../app/helpers/template_footer_private.php");
?>