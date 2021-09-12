<?php
require_once('../../helpers/database.php');
require_once('../../helpers/validator.php');
require_once('../../models/carrito.php');

// Se comprueba si existe una acción a realizar, de lo contrario se finaliza el script con un mensaje de error.
if (isset($_GET['action'])) {
    // Se crea una sesión o se reanuda la actual para poder utilizar variables de sesión en el script.
    session_start();
    $TimeOutMinutes = 5; // This is your TimeOut period in minutes
    $LogOff_URL = "index.php"; // If timed out, it will be redirected to this page
    
    $TimeOutSeconds = $TimeOutMinutes * 60; // TiimeOut in Seconds
    if (isset($_SESSION['SessionStartTime'])) {
    $InActiveTime = time() - $_SESSION['SessionStartTime'];
    if ($InActiveTime >= $TimeOutSeconds) {
    
        session_destroy();
        //header("Location: $LogOff_URL");
    
    }
    }
         $_SESSION['SessionStartTime'] = time();
   
    //Comprobamos si esta definida la sesión 'tiempo'.
    // Se instancia la clase correspondiente.
    $carrito = new carrito;
    // Se declara e inicializa un arreglo para guardar el resultado que retorna la API.
    $result = array('status' => 0, 'session' => 0, 'message' => null, 'exception' => null);
    // Se verifica si existe una sesión iniciada como cliente para realizar las acciones correspondientes.
    if (isset($_SESSION['id_cliente'])) {
        $result['session'] = 1;
        // Se compara la acción a realizar cuando un cliente ha iniciado sesión.
        switch ($_GET['action']) {
            // Se crea un caso para agregar productos en el carrito
            case 'createDetail':
                // La orden inicia
                if ($carrito->startOrder()) {
                    //Se valida el formulario una vez que la orden se incie
                    $_POST = $carrito->validateForm($_POST);
                    //print_r($_POST);
                    // Se captura el id del producto
                    if ($carrito->setProducto($_POST['id_producto'])) {
                        // Se captura la cantidad de producto de la base de datos
                        if ($carrito->setCantidad($_POST['cantidad_producto'])) {
                            if ($carrito->createDetail()) {
                                // Valida si el resultado es 1
                                $result['status'] = 1;
                                // Se lanza un mensaje notificando que se agregó con exito
                                $result['message'] = 'Producto agregado correctamente';
                                // En caso de que ocurra un problema se lanza un mensaje notificando que ocurrio un error
                            } else {
                                $result['exception'] = 'Ocurrió un problema al agregar el producto';
                            }
                            //En caso que la cantidad que se ingrese sea incorrecta, se notifica
                        } else {
                            $result['exception'] = 'Cantidad incorrecta';
                        }
                        //En caso que el detalle que se ingrese sea incorrecto, se notifica
                    } else {
                        $result['exception'] = 'Producto incorrecto';
                    }
                    // En caso que ocurra un problema para obtener la compra, se notifica
                } else {
                    $result['exception'] = Database::getException();
                    //print_r($_result);
                }
                break;
            // Se crea un caso para verificar si hay productos en el carrito
            case 'readOrderDetail':
                // La orden inicia
                if ($carrito->startOrder()) {
                    if ($result['dataset'] = $carrito->readOrderDetail()) {
                        //Valida si el estado es uno
                        $result['status'] = 1;
                        $_SESSION['id_compra'] = $carrito->getIdCompra();
                    } else {
                        if (Database::getException()) {
                            $result['exception'] = Database::getException();
                            //En caso que no encuentren productos en el carrito, se notifica
                        } else {
                            $result['exception'] = 'No tiene productos en el carrito';
                        }
                    }
                    // Notifica que debe agregar productos al carrito para continuar
                } else {
                    $result['exception'] = 'Debe agregar un producto al carrito';
                }
                break;
            // Se crea un caso para actualizar la cantidad de productos
            case 'updateDetail':
                //Se valida el formulario una vez que la orden se incie
                $_POST = $carrito->validateForm($_POST);
                // Se captura el id de detalle compra
                if ($carrito->setIdDetallecompra($_POST['id_detalle_compra'])) {
                    if ($carrito->setCantidad($_POST['cantidad_producto'])) {
                        if ($carrito->updateDetail()) {
                            $result['status'] = 1;
                            // Se lanza un mensaje notificando que se modificó con exito
                            $result['message'] = 'Cantidad modificada correctamente';
                            // En caso de que ocurra un problema se lanza un mensaje notificando que ocurrio un error
                        } else {
                            $result['exception'] = 'Ocurrió un problema al modificar la cantidad';
                        }
                        //En caso que la cantidad que se ingrese sea incorrecta, se notifica
                    } else {
                        $result['exception'] = 'Cantidad incorrecta';
                    }
                    //En caso que el detalle que se ingrese sea incorrecto, se notifica
                } else {
                    $result['exception'] = 'Detalle incorrecto';
                }
                break;
                // Se crea un caso para eliminar el producto
            case 'deleteDetail':
                // Captura el id de detalle compra
                if ($carrito->setIdDetallecompra($_POST['id_detalle_compra'])) {
                    if ($carrito->deleteDetail()) {
                        // Valida que el estado sea 1 para continuar con la respectiva acción
                        $result['status'] = 1;
                        // Se lanza un mensaje notificando que el producto se elimino con exito
                        $result['message'] = 'Producto removido correctamente';
                        // En caso de que ocurra un problema se lanza un mensaje notificando que ocurrio un error
                    } else {
                        $result['exception'] = 'Ocurrió un problema al remover el producto';
                    }
                     //En caso que el detalle que se ingrese sea incorrecta, se notifica
                } else {
                    $result['exception'] = 'Detalle incorrecto';
                }
                break;
                // Se crea un caso para cuando se quiera finalizar la orden
            case 'finishOrder':
                if ($carrito->finishOrder()) {
                    // Valida que el estado sea 1 para continuar con la respectiva acción
                    $result['status'] = 1;
                    // Se lanza un mensaje notificando que la compra se finalizó con exito
                    $result['message'] = 'Compra finalizada correctamente';
                     // En caso de que ocurra un problema se lanza un mensaje notificando que ocurrio un error
                } else {
                    $result['exception'] = 'Ocurrió un problema al finalizar la Compra';
                }
                break;
                // Se notifica que la acción que se quiere llevar a cabo tiene que hacerse cuando la sesión esté iniciada
            default:
                $result['exception'] = 'Acción no disponible dentro de la sesión';
        }
    } else {
        // Se compara la acción a realizar cuando un cliente no ha iniciado sesión.
        switch ($_GET['action']) {
            case 'createDetail':
                $result['exception'] = 'Debe iniciar sesión para agregar el producto al carrito';
                break;
        // Se notifica que la acción que se quiere llevar a cabo tiene que hacerse cuando la sesión esté iniciada
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