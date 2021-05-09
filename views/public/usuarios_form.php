 <!--Se manda a llamar al helper de header-->
<?php
include("../../app/helpers/dashboard_template.php");
?>
<script type="text/javascript" src="../../resources/js/materialize.min.js"></script>
<script type="text/javascript" src="../../app/controllers/initialization.js"></script>

<div class="container">
    <div class="container center">
        <h4>Usuarios</h4>

 <!--Se crea la tabla-->
        <div class="row">
            <div class="col s12">
                <div class="row">
                    <div class="input-field col s12">
                        <i class="material-icons prefix">find_replace</i>
                        <input type="text" id="autocomplete-input" class="autocomplete">
                        <label for="autocomplete-input">Buscar usuario...</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <table class="striped responsive-table">
        <thead>
            <tr>
                <th>Imagen</th>
                <th>Nombre</th>
                <th>Tipo usuario</th>
                <th>Estado</th>
                <th>Acción</th>
            </tr>
        </thead>

        <tbody>
        <a id="scale-demo" href="../dashboard/usuarios.php" class="green btn-floating btn-large scale-transition">
            <i class="material-icons">add</i>
        </a>
        <h5>Agregar usuario</h5>
            <tr>
                <td><a class="brand-logo"> <img src="../../resources/img/users/user.png" height="85"></a></td>
                <td>José Jiménez</td>
                <td>Root</td>
                <td>Activo</td>
                <td>
                    <a id="scale-demo" href="../dashboard/usuarios.php" class="blue btn-floating btn-large scale-transition">
                        <i class="material-icons">autorenew</i>
                    </a>
                    <a id="scale-demo" href="../dashboard/usuarios.php" class="red btn-floating btn-large scale-transition">
                        <i class="material-icons">close</i>
                    </a>
                </td>
            </tr>
            <tr>
                <td><a class="brand-logo"> <img src="../../resources/img/users/user.png" height="85"></a></td>
                <td>Rene Meza</td>
                <td>Administrador</td>
                <td>Activo</td>
                <td>
                    <a id="scale-demo" href="../dashboard/usuarios.php" class="blue btn-floating btn-large scale-transition">
                        <i class="material-icons">autorenew</i>
                    </a>
                    <a id="scale-demo" href="../dashboard/usuarios.php" class="red btn-floating btn-large scale-transition">
                        <i class="material-icons">close</i>
                    </a>
                </td>
            </tr>
            <tr>
                <td><a class="brand-logo"> <img src="../../resources/img/users/user.png" height="85"></a></td>
                <td>Wiliiam Amaya</td>
                <td>Cliente</td>
                <td>Activo</td>
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

 <!--Se manda a llamar al helper de footer-->
<?php
include("../../app/helpers/template_footer_public.php");
?>