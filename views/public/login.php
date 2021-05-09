<!DOCTYPE html>
<html>
 <!--Se manda a llamar al helper del header-->
<?php
include("../../app/helpers/header_template.php");
?>

<head>
    
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="shotcut icon" href="favicon.ico" type="image/x-icon">
</head>

<body class="blogin">
    <title>Iniciar sesión</title>
    <H1 class="black-text text-lighten-3 center-align">Iniciar sesión</H1>
    <div class="row">
        <div class="col s12 14 offset-14">
            <div class="card">
                <div class="card-action white white-text">
                    <div class="card-content"></div>
                    <div class="form-field">
                        <label for="usuario">Usuario</label>
                        <input type="text" id="usermane">
                    </div><br>
                    <div class="form-field">
                        <label for="password">Contraseña</label>
                        <input type="password" id="password">
                    </div><br>
                    <div class="form-field center-align">
                        <button class="btn-large blue">INGRESAR</button>
                    </div><br>
                    <div class="form-field center-align">
                        <button class="btn blue">Olvide mi contraseña</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <H5 class="black-text text-lighten-3 center-align">Es nuevo? por favor de <a href="../../views/public/Registrarse.php">click aquí</a> para registrarse</H1>
</body>
 <!--Se manda a llamar al helper del footer-->
<?php
include("../../app/helpers/template_footer_public.php");
?>