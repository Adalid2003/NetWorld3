 <!-- Se manda a llamar al helper del header  -->
<?php
include("../../app/helpers/dashboard_template.php");
?>
<title>Dashboard</title>
<h5 class="black-text text-lighten-3 center-align">Bienvenido al dashboard de NetWorld SV</h5>
<div class="container">
    <div class="row">
        <div class="col s12 m6">
            <img src="../../resources/img/charts/g1.gif" alt="" class="center-align">
            <h5 class="center-align">Grafica de ventas</h5>
            <img src="../../resources/img/charts/g2.gif" alt="" class="center-align">
            <h5 class="center-align">Grafica de productos vendidos</h5>
        </div>
    </div>
</div>
<?php
include("../../app/helpers/template_footer_private.php");
?>