 <!--Se manda a llamar al helper del header-->
<?php
include("../../app/helpers/header_template.php");
?>
<title>Carrito de compras</title>
<div class="container">
    <div class="container center">
        <h4>Carrito de compras <i class="material-icons">shopping_cart</i></h4>
 <!--Se crea la tabla de productos del carrito-->
        <div class="row">
        <div class="col s12 14 offset-14">
            <div class="card">
                <div class="card-action white white-text">
        <div class="row">
            <div class="col s12">
                <div class="row">
                </div>
            </div>
        </div>
    </div>
    <table class="striped responsive-table">
        <thead>
            <tr>
                <th>Imagen</th>
                <th>Nombre producto</th>
                <th>Cantidad</th>
                <th>Precio (USD)</th>
            </tr>
        </thead>

        <tbody>
            <a id="scale-demo" href="../../views/public/index_publico.php" class="green btn-floating btn-large scale-transition">
                <i class="material-icons">shopping_basket</i>
            </a>
            <h5>Seguir comprando...</h5>
            <tr>
                <td><a class="brand-logo"> <img src="../../resources/img/cards/fibra1.jpg" height="85"></a></td>
                <td>Cable de conexión de fibra LC OM3 LC de 49.2 ft</td>
                <td>1</td>
                <td>$24.98</td>
                <td>
                    <a id="scale-demo" href="#" class="red btn-floating btn-large scale-transition">
                        <i class="material-icons">close</i>
                    </a>
                </td>
            </tr>
            <tr>
                <td><a class="brand-logo"> <img src="../../resources/img/cards/modem1.jpg" height="85"></a></td>
                <td>MODEM NEXXT NAXOS800 con configuracion Inalambrica</td>
                <td>1</td>
                <td>$200.00</td>
                <td>
                    <a id="scale-demo" href="#" class="red btn-floating btn-large scale-transition">
                        <i class="material-icons">close</i>
                    </a>
                </td>
            </tr>

        </tbody>
    </table>
            </div>
        </div>
        </div>
    <h5>TOTAL: $224.98</h5>
    <button class="btn blue">Imprimir comprobante</button>
     <!--Se crea el espacio para rellenar los datos necesarios del cliente-->
    <div class="row">
        <div class="col s12 14 offset-14">
            <div class="card">
                <div class="card-action white white-text">
                    <div class="card-content"></div>
                    <div class="form-field">
                        <label for="nombre">Nombre del cliente: </label>
                        <input type="text" id="name">
                    </div><br>
                    <div class="form-field">
                        <label for="nombre">Dirección: </label>
                        <input type="text" id="direccion">
                    </div><br>
                    <label for="fecha">Fecha de envio: </label>
                    <input type="date" class="datepicker">  
                </div><br>
                </div><br>
                <div class="form-field center-align">
                    <button class="btn-large green">Aceptar</button>
                </div><br>
            </div>
        </div>
    </div>
</div>
<h5 class="black-text text-lighten-3 center-align">Nota: RECUERDE que el pago lo realizara en efectivo en el momento que se haga la entrega en la dirección especificada.</h5>
</div>
 <!--Se manda a llamar al helper del footer-->
<?php
include("../../app/helpers/template_footer_public.php");
?>