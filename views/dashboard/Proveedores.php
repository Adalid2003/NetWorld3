<!-- MANDAR A LLAMAR HELPERS  -->
<?php
include("../../app/helpers/dashboard_template.php");
?>

<div class="container">
    <div class="container center">
        <h2>Proveedores</h2>

<!-- BUSCAR PROVEEDOR -->
        <div class="row">
            <div class="col s12">
                <div class="row">
                    <div class="input-field col s12">
                        <i class="material-icons prefix">find_replace</i>
                        <input type="text" id="autocomplete-input" class="autocomplete">
                        <label for="autocomplete-input">Buscar Proveedor...</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- TABLA CON DATOS -->
    <table class="striped responsive-table">
        <thead>
            <tr>
                <th>Imagen</th>
                <th>Nombre de proveedor</th>
                <th>Direccion del proveedor</th>
                <th>Telefono de Proveedor</th>
                <th>Acción</th>
            </tr>
        </thead>

        <tbody>
        <a id="scale-demo" href="#modal1" class="green btn-floating btn-large scale-transition modal-trigger">
            <i class="material-icons">add</i>
        </a>
        <h5>Agregar Proveedor</h5>
            <tr>
                <td><a class="brand-logo"> <img src="../../resources/img/users/asusx2.png" height="85"></a></td>
                <td>Carlos Henrique</td>
                <td>Ilopago urbanizacion madre selva calle 45 ote</td>
                <td>25697569</td>
                <td>
                    <a id="scale-demo" href="../dashboard/Proveedores_form.php" class="blue btn-floating btn-large scale-transition">
                        <i class="material-icons">autorenew</i>
                    </a>
                    <a id="scale-demo" href="../dashboard/Proveedores_form.php" class="red btn-floating btn-large scale-transition">
                        <i class="material-icons">close</i>
                    </a>
                </td>
            </tr>
            <tr>
                <td><a class="brand-logo"> <img src="../../resources/img/users/netgear.png" height="85"></a></td>
                <td>Rene Meza</td>
                <td>Colonia Escalon , calle los abetos 15</td>
                <td>785636953</td>
                <td>
                    <a id="scale-demo" href="../dashboard/Proveedores_form.php" class="blue btn-floating btn-large scale-transition">
                        <i class="material-icons">autorenew</i>
                    </a>
                    <a id="scale-demo" href="../dashboard/Proveedores_form.php" class="red btn-floating btn-large scale-transition">
                        <i class="material-icons">close</i>
                    </a>
                </td>
            </tr>
            <tr>
                <td><a class="brand-logo"> <img src="../../resources/img/users/tplink.png" height="85"></a></td>
                <td>Hector Ocasio</td>
                <td>Santa Ana,Colonia Chapultepec calle los olivos 88</td>
                <td>25789696</td>
                <td>
                    <a id="scale-demo" href="../dashboard/Proveedores_form.php" class="blue btn-floating btn-large scale-transition">
                        <i class="material-icons">autorenew</i>
                    </a>
                    <a id="scale-demo" href="../dashboard/Proveedores_form.php" class="red btn-floating btn-large scale-transition">
                        <i class="material-icons">close</i>
                    </a>
                </td>
            </tr>
            
        </tbody>
    </table>
</div>
<div id="modal1" class="modal">
    <div class="row">
        <h4 class="center">Gestionar proveedores</h4>
        <form class="col s12">
            <div class="row">
                <div class="input-field col s6">
                    <input id="first_name" type="text" class="validate" required>
                    <label for="first_name">Nombre</label>
                </div>
                <div class="input-field col s6">
                    <input id="phone" type="text" class="validate" required>
                    <label for="phone">Telefono</label>
                </div>
                <div class="input-field col s6">
                    <input id="direccion_prov" type="text" class="validate" required>
                    <label for="direccion_prov">Direccion</label>
                </div>
            </div>
            <div class="row center-align">
                <a href="#!" class="modal-close waves-effect grey btn-flat white-text">Cancelar</a>
                <button type="submit" class="btn waves-effect blue tooltipped" data-tooltip="Guardar">Guardar</button>
            </div>
    </div>
</div>
  <!-- MANDAR A LLAMAR HELPERS CON EL FOOTER -->
<?php
include("../../app/helpers/template_footer_private.php");
?>