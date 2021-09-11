<?php
session_start();
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function


$email = $_SESSION['correo_cliente'];
//Load Composer's autoloader
require '../../libraries/phpmailer52/class.phpmailer.php';
require '../../libraries/phpmailer52/class.smtp.php';
require '../../libraries/phpmailer52/class.phpmaileroauthgoogle.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

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
    $mail->addAddress($email);     //Add a recipient

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'prueba';
    $mail->Body    = 'Este es su codigo de recuperación: ';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
