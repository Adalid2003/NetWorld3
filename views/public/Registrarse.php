<?php
include("../../app/helpers/header_template.php");
?>

<body class="blogin">
        <title>Registrarse</title>
        <H1 class="black-text text-lighten-3 center-align">LLENA EL SIGUIENTE FORMULARIO PARA REGISTRARTE</H1>
        <div class="row">
                <div class="col s12 14 offset-14">
                        <div class="card">
                                <div class="card-action white white-text">
                                        <div class="card-content"></div>
                                        <div class="form-field">
                                                <label for="Nombres">Nombres</label>
                                                <input type="text" id="Nombres">

                                                <label for="Apellidos">Apellidos</label>
                                                <input type="text" id="Apellidos">



                                                <label for="Telefono">Numero de Telefono</label>
                                                <input type="text" id="Telefono">
                                                <label for="dui">Documento unico de identidad(Dui)</label>
                                                <input type="text" id="dui">
                                                <label for="Direccion">Direccion</label>
                                                <input type="text" id="Direccion">
                                                <label for="email">Correo Electronico</label>
                                                <input type="text" id="Correo">
                                                <label for="password">Contraseña</label>
                                                <input type="password" id="password">
                                                <div class="form-field center-align">
                                                        <button class="btn-large blue">Registrarse</button>


                                                </div>
                                        </div>
                                </div>
                        </div>



                        <?php
                        include("../../app/helpers/template_footer_public.php");
                        ?>