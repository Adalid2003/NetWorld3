 <!--Se manda a llamar al helper del header-->
<?php
include("../../app/helpers/dashboard_template.php");
?>
 <!--Se crean las cartas y el formulario-->
<div class="row">
            <div class="col s12 14 offset-14">
            <div class="card">
            <div class="card-action white white-text">
            <div class="card-content"></div>
            <div class="form-field">
                <label for="nombre">Nombre</label>
                <input type="text" id="name">
            </div><br>
            <div class="form-field">
                <label for="dui">DUI</label>
                <input type="text" id="dui">
            </div><br>
            <div class="form-field">
                <label for="usuario">Usuario</label>
                <input type="text" id="usermane">
            </div><br>
            <div class="form-field">
                <label for="nombre">Dirección</label>
                <input type="text" id="direccion">
            </div><br>
     </div><br>
     <div class="form-field">
                <label for="password">Contraseña</label>
                <input type="password" id="password">
            </div><br>
            <label for="tipo_usuario">Tipo de usuario</label>
    <div class="input-field col s12">
    <select class="browser-default">
      <option value="" disabled selected>Seleccione el tipo de usuario</option>
      <option value="1">Root</option>
      <option value="2">Administrador</option>
      <option value="3">Cliente</option>
    </select><br>
    
  </div>
        <div class="form-field center-align">
                <button class="btn-large green">Aceptar</button>
        </div><br>
        </div>
        </div>
        </div>
        </div>
<script type="text/javascript" src="../../resources/js/materialize.min.js"></script>
<script type="text/javascript" src="../../app/controllers/initialization.js"></script>