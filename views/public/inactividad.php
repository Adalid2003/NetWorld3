<!doctype html>
<?php
session_start();
session_destroy();
?>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Inactividad</title>
    <link type="text/css" rel="stylesheet" href="/coffeeshop/resources/css/materialize.min.css"/>
	<link type="text/css" rel="stylesheet" href="/coffeeshop/resources/css/material_icons.css"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <div>
    </div>
    <div class="center-align">
        <h1 class="indigo-text">Auto cierre de sesión por inactividad</h1>
        <h5 class="indigo-text">Se ha cerrado la sesión por inactividad</h5>
        <a href="/NetWorld3/views/public/"><img width="690" src="../resources/img/errores/no_data.png"></a>
    </div>
</body>
</html>