 <!--Se manda a llamar al helper del header-->
<?php
include("../../app/helpers/dashboard_template.php");
?>
<title>Reportes</title>
<h5 class="black-text text-lighten-3 center-align">Reportes de NetWorld SV</h5>
 <!--Se crean las cartas-->
<div class="row">
    <div class="col s12 m6">
      <div class="card blue darken-1">
        <div class="card-content white-text">
          <span class="card-title">Reporte de ventas al mes</span>
          <p>Reporte que muestra las diferentes ventas que hubieron en el mes</p>
        </div>
        <div class="card-action">
          <a href="#" class="white-text">GENERAR</a>
        </div>
      </div>
    </div>

  <div class="row">
    <div class="col s12 m6">
      <div class="card blue darken-1">
        <div class="card-content white-text">
          <span class="card-title">Reporte de productos más vendidos</span>
          <p>Reporte que muestra los productos que han sido mas vendidos durante la semana.</p>
        </div>
        <div class="card-action">
          <a href="#" class="white-text">GENERAR</a>
        </div>
      </div>
    </div>

  <div class="row">
    <div class="col s12 m6">
      <div class="card blue darken-1">
        <div class="card-content white-text">
          <span class="card-title">Reporte de productos por categoria</span>
          <p>Reporte que muestra los productos de toda una categoria.</p>
        </div>
        <div class="card-action">
          <a href="#" class="white-text">GENERAR</a>
        </div>
      </div>
    </div>
    <div class="row">
    <div class="col s12 m6">
      <div class="card blue darken-1">
        <div class="card-content white-text">
          <span class="card-title">Reporte de usuarios por tipo</span>
          <p>Reporte que muestra cuantos usuarios hay por cada tipo de usuario.</p>
        </div>
        <div class="card-action">
          <a href="#" class="white-text">GENERAR</a>
        </div>
      </div>
    </div>
    </div>
 <!--Se manda a llamar al helper del footer->
<?php
include("../../app/helpers/template_footer_private.php");
?>