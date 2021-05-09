<!--Se manda a llamar al helper del header-->
<?php
include("../../app/helpers/dashboard_template.php");
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
    <table class="striped responsive-table">
        <thead>
            <tr>
                <th>Estado compra</th>
                <th>Cliente</th>
                <th>Descripción</th>
                <th>Total</th>
                <th>Fecha compra</th>
                <th>Fecha envio</th>
            </tr>
        </thead>

        <tbody>
            <a id="scale-demo" href="#modal1" class="green btn-floating btn-large scale-transition modal-trigger">
                <i class="material-icons">add</i>
            </a>
            <h5>Agregar compra</h5>
            <tr>
                <td>Activa</td>
                <td>William Amaya</td>
                <td>Compra de un 1 router y 1 modem</td>
                <td>$228.98</td>
                <td>14/03/2021</td>
                <td>25/03/2021</td>
                <td>
                    <a id="scale-demo" href="../dashboard/usuarios.php" class="blue btn-floating btn-large scale-transition">
                        <i class="material-icons">autorenew</i>
                    </a>
                    <a id="scale-demo" href="../dashboard/usuarios.php" class="red btn-floating btn-large scale-transition">
                        <i class="material-icons">close</i>
                    </a>
                </td>
            </tr>

        </tbody>
    </table>
</div>
<div id="modal1" class="modal">
  <div class="row">
    <h4 class="center">Gestionar compras</h4>
    <form class="col s12">
      <div class="row">
      <div class="input-field col s12 m6">
          <select>
            <option value="" disabled selected>Cliente</option>
            <option value="1">Option 1</option>
            <option value="2">Option 2</option>
            <option value="3">Option 3</option>
          </select>
          <label>Seleccione el cliente</label>
        </div>
        <div class="input-field col s6">
          <input id="fecha_co" type="date" class="validate" required>
          <label for="fecha_co">Fecha de la compra</label>
        </div>
        <div class="input-field col s12 m6">
          <select>
            <option value="" disabled selected>Estado de la compra</option>
            <option value="1">Option 1</option>
            <option value="2">Option 2</option>
            <option value="3">Option 3</option>
          </select>
          <label>Seleccione el estado de la compra</label>
        </div>
      </div>
      <div class="row center-align">
        <a href="#!" class="modal-close waves-effect grey btn-flat white-text">Cancelar</a>
        <button type="submit" class="btn waves-effect blue tooltipped" data-tooltip="Guardar">Guardar</button>
      </div>
  </div>
</div>

<!--Se manda a llamar al helper del footer-->
<?php
include("../../app/helpers/template_footer_public.php");
?>