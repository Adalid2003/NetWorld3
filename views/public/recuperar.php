<?php
// Se incluye la clase con las plantillas del documento.
require_once('../../app/helpers/header_template.php');
require_once('../../app/helpers/database.php');
// Se imprime la plantilla del encabezado enviando el título de la página web.
Public_Page::headerTemplate('Recuperar contraseña');

if (isset($_POST['email'])) {
    //funcion para generar codigo
    function generarCodigo($longitud, $tipo = 0)
    {
        //creamos la variable codigo
        $codigo = "";
        //caracteres a ser utilizados
        $caracteres = "123456789";
        //el maximo de caracteres a usar
        $max = strlen($caracteres) - 1;
        //creamos un for para generar el codigo aleatorio utilizando parametros min y max
        for ($i = 0; $i < $longitud; $i++) {
            $codigo .= $caracteres[rand(0, $max)];
        }
        //regresamos codigo como valor
        return $codigo;
    }
    //Import PHPMailer classes into the global namespace
    //These must be at the top of your script, not inside a function

    //Load Composer's autoloader
    require '../../libraries/phpmailer52/class.phpmailer.php';
    require '../../libraries/phpmailer52/class.smtp.php';
    require '../../libraries/phpmailer52/class.phpmaileroauthgoogle.php';

    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);
    $mail->setLanguage("es");

    $para = $_POST['email'];
    $result = array('status' => 0, 'error' => 0, 'message' => null, 'exception' => null);
    try {
        //Server settings
        $mail->SMTPDebug = 0;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'cuentanetworld@gmail.com';                     //SMTP username
        $mail->Password   = 'networld123';                               //SMTP password
        $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
        $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('cuentanetworld@gmail.com');
        $mail->addAddress($para);     //Add a recipient

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Recuperación de contraseña';
        $mail->Body    = 'Este es su codigo de recuperación: ' . generarCodigo(5);
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

       if ($mail->send()) {
        print('<div class="row center-align">
        <a href="../../views/public/verificar.php" class="btn waves-effect grey tooltipped modal-close" data-tooltip="Cancelar">AVANZAR</a>
        </div>');
       }
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}

?>
<!-- Contenedor para mostrar el formulario de inicio de sesión -->
<div class="container">
    <!-- Título del contenido principal -->
    <h4 class="center-align indigo-text">Recuperación de contraseña</h4>
    <!-- Formulario para iniciar sesión -->
    <form method="post" id="save-form">
        <div class="row">
            <div class="input-field col s12 m4 offset-m4">
                <i class="material-icons prefix">email</i>
                <input type="email" id="email" name="email" class="validate" required />
                <label for="email">Ingrese su correo electronico...</label>
            </div>
        </div>
        <div class="row center-align">
            <button type="submit" class="btn waves-effect blue tooltipped" data-tooltip="Ingresar"><i class="material-icons">send</i></button>
        </div>
    </form>
    </body>
    <?php
    // Se imprime la plantilla del pie enviando el nombre del controlador para la página web.
    Public_page::footerTemplate('recuperar.js');
    ?>