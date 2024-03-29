<?php
require_once('../../helpers/database.php');
require_once('../../helpers/validator.php');
require_once('../../models/clientes.php');

// Se comprueba si existe una acción a realizar, de lo contrario se finaliza el script con un mensaje de error.
if (isset($_GET['action'])) {
    // Se crea una sesión o se reanuda la actual para poder utilizar variables de sesión en el script.
    session_start();
    // Se instancia la clase correspondiente.
    $cliente = new Clientes;
    // Se declara e inicializa un arreglo para guardar el resultado que retorna la API.
    $result = array('status' => 0, 'recaptcha' => 0, 'message' => null, 'exception' => null);
    // Se verifica si existe una sesión iniciada como cliente para realizar las acciones correspondientes.
    $_SESSION['correo_cliente'] = $cliente->getCorreo();
    if (isset($_SESSION['id_cliente'])) {
        // Se compara la acción a realizar cuando un cliente ha iniciado sesión.
        switch ($_GET['action']) {
            case 'changePassword':
                if ($cliente->setId($_SESSION['id_cliente'])) {
                    $_POST = $cliente->validateForm($_POST);
                    if ($cliente->checkPassword($_POST['clave_actual'])) {
                        if ($_POST['clave_nueva_1'] == $_POST['clave_nueva_2']) {
                            if ($_POST['clave_nueva_1'] != $_POST['clave_actual']) {
                                if ($_POST['clave_nueva_2'] != $_POST['clave_actual']) {
                                    if ($cliente->setClave($_POST['clave_nueva_1'])) {
                                        if ($cliente->changePassword()) {
                                            $result['status'] = 1;
                                            $result['message'] = 'Contraseña cambiada correctamente';
                                        } else {
                                            $result['exception'] = Database::getException();
                                        }
                                    } else {
                                        $result['exception'] = $cliente->getPasswordError();
                                    }
                                } else {
                                    $result['exception'] = 'Por su seguridad, su contraseña debe ser diferente a la que usa actualmente';
                                }
                            } else {
                                $result['exception'] = 'Por su seguridad, su contraseña debe ser diferente a la que usa actualmente';
                            }
                        } else {
                            $result['exception'] = 'Clave nueva diferente';
                        }
                    } else {
                        $result['exception'] = 'Clave actual incorrecta';
                    }
                } else {
                    $result['exception'] = 'Usuario incorrecto';
                }
                break;
            case 'sessionTime':
                if ((time() - $_SESSION['tiempo_cliente']) < 300) {
                    $_SESSION['tiempo_cliente'] = time();
                } else {
                    unset($_SESSION['id_cliente'], $_SESSION['cliente'], $_SESSION['tiempo_cliente']);
                    $result['status'] = 1;
                    $result['message'] = 'La sesión se ha cerrado por inactividad.';
                }
                break;
                // Se crea un caso para cerrar sesión
            case 'logOut':
                unset($_SESSION['id_cliente']);
                $result['status'] = 1;
                $result['message'] = 'Sesión eliminada correctamente';
                break;
            case 'readHistorial':
                if ($result['dataset'] = $cliente->readHistorial()) {
                    $result['status'] = 1;
                } else {
                    if (Database::getException()) {
                        $result['exception'] = Database::getException();
                    } else {
                        $result['exception'] = 'No hay sesiones iniciadas para este usuario';
                    }
                }
                break;
            default:
                $result['exception'] = 'Acción no disponible dentro de la sesión';
        }
    } else {
        // Se compara la acción a realizar cuando el cliente no ha iniciado sesión.
        switch ($_GET['action']) {
                // Se crea un caso para registrarse
            case 'register':
                //print_r($_POST);
                $_POST = $cliente->validateForm($_POST);
                // Se sanea el valor del token para evitar datos maliciosos.
                $token = filter_input(INPUT_POST, 'g-recaptcha-response', FILTER_SANITIZE_STRING);
                if ($token) {
                    $secretKey = '6LfPolscAAAAAAXRkKcN9AlQ7PAZb_INtzy8kOmx';
                    $ip = $_SERVER['REMOTE_ADDR'];

                    $data = array(
                        'secret' => $secretKey,
                        'response' => $token,
                        'remoteip' => $ip
                    );

                    $options = array(
                        'http' => array(
                            'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                            'method'  => 'POST',
                            'content' => http_build_query($data)
                        ),
                        'ssl' => array(
                            'verify_peer' => false,
                            'verify_peer_name' => false
                        )
                    );
                    // Se declara la url 
                    $url = 'https://www.google.com/recaptcha/api/siteverify';
                    $context  = stream_context_create($options);
                    $response = file_get_contents($url, false, $context);
                    $captcha = json_decode($response, true);

                    // Se declara una dacena de if con los datos de la base de datos uniendolos con el model
                    if ($captcha['success']) {
                        if ($cliente->setNombres($_POST['nombres'])) {
                            if ($cliente->setApellidos($_POST['apellidos'])) {
                                if ($cliente->setCorreo($_POST['correo_cliente'])) {
                                    if ($cliente->setDireccion($_POST['direccion'])) {
                                        if ($cliente->setDUI($_POST['dui_c'])) {
                                            if ($cliente->setNacimiento($_POST['fecha_nacimiento'])) {
                                                if ($cliente->setTelefono($_POST['telefono'])) {
                                                    if ($_POST['clave1'] == $_POST['clave2']) {
                                                        if ($cliente->setEstado(true)) {
                                                            if ($cliente->setClave($_POST['clave1'])) {
                                                                // Se crea la fila
                                                                if ($cliente->createRow()) {
                                                                    // Verifica si el estado es 1 
                                                                    $result['status'] = 1;
                                                                    // En caso de que sea 1 se lleva a cabo la acción
                                                                    $result['message'] = 'Cliente registrado correctamente';
                                                                    // En caso de no sea uno se notifican los errores
                                                                } else {
                                                                    $result['exception'] = Database::getException();
                                                                }
                                                            } else {
                                                                $result['exception'] = $cliente->getPasswordError();
                                                            }
                                                        } else {
                                                            $result['exception'] = 'Estado incorrecto';
                                                        }
                                                    } else {
                                                        $result['exception'] = 'Claves diferentes';
                                                    }
                                                } else {
                                                    $result['exception'] = 'Teléfono incorrecto';
                                                }
                                            } else {
                                                $result['exception'] = 'Fecha de nacimiento incorrecta';
                                            }
                                        } else {
                                            $result['exception'] = 'DUI incorrecto';
                                        }
                                    } else {
                                        $result['exception'] = 'Dirección incorrecta';
                                    }
                                } else {
                                    $result['exception'] = 'Correo incorrecto';
                                }
                            } else {
                                $result['exception'] = 'Apellidos incorrectos';
                            }
                        } else {
                            $result['exception'] = 'Nombres incorrectos';
                        }
                        // Se valida el el captcha que valida si no es un robot
                    } else {
                        $result['recaptcha'] = 1;
                        $result['exception'] = 'No eres un humano';
                    }
                    // En caso de un error se notifica 
                } else {
                    $result['exception'] = 'Ocurrió un problema al cargar el reCAPTCHA';
                }
                break;






            case 'logIn':
                //Se valida el formulario
                $_POST = $cliente->validateForm($_POST);
                //Captura el usuario de la base de datos
                if ($cliente->checkUser($_POST['usuario'])) {
                    // Se obtiene el estado
                    if ($cliente->getEstado()) {
                        // Se captura la clave 
                        if ($cliente->checkPassword($_POST['clave'])) {
                            // Se declara que el estado es uno
                            $result['status'] = 1;
                            // En caso que sea uno se lleva a cabo la acción de forma exitosa
                            $result['message'] = 'Autenticación correcta';
                            // Se captura el id del cliente
                            $_SESSION['id_cliente'] = $cliente->getId();
                            $_SESSION['tiempo_cliente'] = time();
                            // Se captura el correo del cliente
                            $_SESSION['correo_cliente'] = $cliente->getCorreo();
                            $_SESSION['nombre_cliente'] = $cliente->getNombres();
                            $cliente->createHistorial();
                            // En caso que no sea uno se infroma el error
                        } else {
                            if (Database::getException()) {
                                $result['exception'] = Database::getException();
                                //Se notifica el error
                            } else {
                                $result['exception'] = 'Clave incorrecta';
                            }
                            // Se notifica que la cuenta se desactiva
                        }
                    } else {
                        $result['exception'] = 'La cuenta ha sido desactivada';
                    }
                    // Se notifica que el alias es incorrecto
                } else {
                    if (Database::getException()) {
                        $result['exception'] = Database::getException();
                    } else {
                        $result['exception'] = 'Alias incorrecto';
                    }
                }
                // Se finaliza el caso
                break;
            case 'validateEmail':
                //print_r($_POST);
                $_POST = $cliente->validateForm($_POST);
                if ($cliente->setCorreo($_POST['txtCorreo'])) {
                    if ($correo = $cliente->checkEmail()) {
                        if ($correo['correo_cliente'] == $_POST['txtCorreo']) {
                            $_SESSION['id_cliente_tmp'] = $correo['id_cliente'];
                            $_SESSION['correo_ciente'] = $correo['correo_cliente'];
                            $result['status'] = 1;
                            $result['message'] = 'Correo verificado.';
                        } else {
                            $result['exception'] = 'El correo electrónico ingresado no coincide con su cuenta.';
                        }
                    } else {
                        if (Database::getException()) {
                            $result['exception'] = Database::getException();
                        } else {
                            $result['exception'] = 'El correo ingresado no existe en nuestros registros, por favor verifique su información o vuelva a intentarlo.';
                        }
                    }
                } else {
                    $result['exception'] = 'Id pendiente de ingresar.';
                }
                break;
            case 'sendEmail':
                $_SESSION['codigo_email'] = random_int(100, 999999);
                try {



                    //Load Composer's autoloader
                    require '../../libraries/phpmailer52/class.phpmailer.php';
                    require '../../libraries/phpmailer52/class.smtp.php';
                    require '../../libraries/phpmailer52/class.phpmaileroauthgoogle.php';

                    //Create an instance; passing `true` enables exceptions
                    $mail = new PHPMailer(true);
                    $mail->CharSet = 'UTF-8';
                    $mail->setLanguage("es");
                    //Ajustes del servidor
                    $mail->SMTPDebug = 0;
                    $mail->isSMTP();
                    $mail->Host       = 'smtp.gmail.com';
                    $mail->SMTPAuth   = true;
                    $mail->Username   = 'cuentanetworld@gmail.com';
                    $mail->Password   = 'networld123';
                    $mail->SMTPSecure = 'tls';
                    $mail->Port       = 587;

                    //Receptores
                    $mail->setFrom('recuperacionsmartfix@gmail.com', 'Soporte SmartFix');
                    $mail->addAddress($_SESSION['correo_cliente']);

                    //Contenido
                    $mail->isHTML(true);                                  //Set email format to HTML
                    $mail->Subject = 'Codigo de Verificación';
                    $mail->Body    = 'Tu código de verificación es: <b>' . $_SESSION['codigo_email'] . '</b>.';
                    $mail->AltBody = 'Tu código de verificación es: ' . $_SESSION['codigo_email'] . '.';

                    if ($mail->send()) {
                        $result['status'] = 1;
                        $result['message'] = 'Se ha enviado un código de recuperación de contraseña a su correo.';
                    }
                } catch (Exception $e) {
                    $result['exception'] = $mail->ErrorInfo;
                }
                break;
            case 'validateCode':
                $_POST = $cliente->validateForm($_POST);
                if ($_SESSION['codigo_email'] == $_POST['txtCodigo']) {
                    unset($_SESSION['codigo_email']);
                    $result['status'] = 1;
                    $result['message'] = 'Código verificado correctamente.';
                } else {
                    $result['exception'] = 'El código que usted ha ingresado ya venció o es invalido.';
                }

                break;
            case 'changePasswordOut':
                if ($cliente->setId($_SESSION['id_cliente_tmp'])) {
                    $_POST = $cliente->validateForm($_POST);
                    if ($_POST['clave_nueva_1'] == $_POST['clave_nueva_2']) {
                        if ($cliente->setPassword($_POST['clave_nueva_1'])) {
                            if ($cliente->changePasswordOut()) {
                                $result['status'] = 1;
                                $result['message'] = 'Contraseña cambiada correctamente';
                                unset($_SESSION['id_cliente_tmp']);
                            } else {
                                $result['exception'] = Database::getException();
                            }
                        } else {
                            $result['exception'] = $cliente->getPasswordError();
                        }
                    } else {
                        $result['exception'] = 'Claves nuevas diferentes';
                    }
                } else {
                    $result['exception'] = 'Usuario incorrecto';
                }
                break;
            default:
                $result['exception'] = 'Acción no disponible fuera de la sesión';
        }
    }
    // Se indica el tipo de contenido a mostrar y su respectivo conjunto de caracteres.
    header('content-type: application/json; charset=utf-8');
    // Se imprime el resultado en formato JSON y se retorna al controlador.
    print(json_encode($result));
    // En caso que ocurra un error, no se imprime el resultado en formato JSON
} else {
    print(json_encode('Recurso no disponible'));
}
