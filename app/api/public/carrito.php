<?php
require_once('../../helpers/database.php');
require_once('../../helpers/validator.php');
require_once('../../models/carrito.php');

// Se comprueba si existe una acción a realizar, de lo contrario se finaliza el script con un mensaje de error.
if (isset($_GET['action'])) {
    // Se crea una sesión o se reanuda la actual para poder utilizar variables de sesión en el script.
    session_start();
    // Se instancia la clase correspondiente.
    $carrito = new carrito;
    // Se declara e inicializa un arreglo para guardar el resultado que retorna la API.
    $result = array('status' => 0, 'session' => 0, 'message' => null, 'exception' => null);
    // Se verifica si existe una sesión iniciada como cliente para realizar las acciones correspondientes.
    if (isset($_SESSION['id_cliente'])) {
        $result['session'] = 1;
        // Se compara la acción a realizar cuando un cliente ha iniciado sesión.
        switch ($_GET['action']) {
            case 'createDetail':
                if ($carrito->startOrder()) {
                    $_POST = $carrito->validateForm($_POST);
                    print_r($_POST);
                    if ($carrito->setProducto($_POST['id_producto'])) {
                        if ($carrito->setCantidad($_POST['cantidad_producto'])) {
                            if ($carrito->createDetail()) {
                                $result['status'] = 1;
                                $result['message'] = 'Producto agregado correctamente';
                            } else {
                                $result['exception'] = 'Ocurrió un problema al agregar el producto';
                            }
                        } else {
                            $result['exception'] = 'Cantidad incorrecta';
                        }
                    } else {
                        $result['exception'] = 'Producto incorrecto';
                    }
                } else {
                    $result['exception'] = 'Ocurrió un problema al obtener la compra';
                    print_r($_result);
                }
                break;
            case 'readOrderDetail':
                if ($carrito->startOrder()) {
                    if ($result['dataset'] = $carrito->readOrderDetail()) {
                        $result['status'] = 1;
                        $_SESSION['id_compra'] = $carrito->getIdCompra();
                    } else {
                        if (Database::getException()) {
                            $result['exception'] = Database::getException();
                        } else {
                            $result['exception'] = 'No tiene productos en el carrito';
                        }
                    }
                } else {
                    $result['exception'] = 'Debe agregar un producto al carrito';
                }
                break;
            case 'updateDetail':
                $_POST = $carrito->validateForm($_POST);
                if ($carrito->setIdDetallecompra($_POST['id_detalle_compra'])) {
                    if ($carrito->setCantidad($_POST['cantidad_producto'])) {
                        if ($carrito->updateDetail()) {
                            $result['status'] = 1;
                            $result['message'] = 'Cantidad modificada correctamente';
                        } else {
                            $result['exception'] = 'Ocurrió un problema al modificar la cantidad';
                        }
                    } else {
                        $result['exception'] = 'Cantidad incorrecta';
                    }
                } else {
                    $result['exception'] = 'Detalle incorrecto';
                }
                break;
            case 'deleteDetail':
                if ($carrito->setIdDetallecompra($_POST['id_detalle_compra'])) {
                    if ($carrito->deleteDetail()) {
                        $result['status'] = 1;
                        $result['message'] = 'Producto removido correctamente';
                    } else {
                        $result['exception'] = 'Ocurrió un problema al remover el producto';
                    }
                } else {
                    $result['exception'] = 'Detalle incorrecto';
                }
                break;
            case 'finishOrder':
                if ($carrito->finishOrder()) {
                    $result['status'] = 1;
                    $result['message'] = 'Compra finalizada correctamente';
                } else {
                    $result['exception'] = 'Ocurrió un problema al finalizar la Compra';
                }
                break;
            default:
                $result['exception'] = 'Acción no disponible dentro de la sesión';
        }
    } else {
        // Se compara la acción a realizar cuando un cliente no ha iniciado sesión.
        switch ($_GET['action']) {
            case 'createDetail':
                $result['exception'] = 'Debe iniciar sesión para agregar el producto al carrito';
                break;
            default:
                $result['exception'] = 'Acción no disponible fuera de la sesión';
        }
    }
    // Se indica el tipo de contenido a mostrar y su respectivo conjunto de caracteres.
    header('content-type: application/json; charset=utf-8');
    // Se imprime el resultado en formato JSON y se retorna al controlador.
    print(json_encode($result));
} else {
    print(json_encode('Recurso no disponible'));
}
