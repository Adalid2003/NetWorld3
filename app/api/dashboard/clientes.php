<?php
require_once('../../helpers/database.php');
require_once('../../helpers/validator.php');
require_once('../../models/clientes.php');

// Se comprueba si existe una acción a realizar, de lo contrario se finaliza el script con un mensaje de error.
if (isset($_GET['action'])) {
    // Se crea una sesión o se reanuda la actual para poder utilizar variables de sesión en el script.
    session_start();
    // Se instancia la clase correspondiente.
    $clientes = new Clientes;
    // Se declara e inicializa un arreglo para guardar el resultado que retorna la API.
    $result = array('status' => 0, 'message' => null, 'exception' => null);
    // Se verifica si existe una sesión iniciada como administrador, de lo contrario se finaliza el script con un mensaje de error.
    if (isset($_SESSION['id_usuario'])) {
        // Se compara la acción a realizar cuando un administrador ha iniciado sesión.
        switch ($_GET['action']) {
            case 'readAll':
                if ($result['dataset'] = $clientes->readAll()) {
                    $result['status'] = 1;
                } else {
                    if (Database::getException()) {
                        $result['exception'] = Database::getException();
                    } else {
                        $result['exception'] = 'No hay clientes registrados';
                    }
                }
                break;
            case 'search':
                $_POST = $clientes->validateForm($_POST);
                if ($_POST['search'] != '') {
                    if ($result['dataset'] = $clientes->searchRows($_POST['search'])) {
                        $result['status'] = 1;
                        $rows = count($result['dataset']);
                        if ($rows > 1) {
                            $result['message'] = 'Se encontraron ' . $rows . ' coincidencias';
                        } else {
                            $result['message'] = 'Solo existe una coincidencia';
                        }
                    } else {
                        if (Database::getException()) {
                            $result['exception'] = Database::getException();
                        } else {
                            $result['exception'] = 'No hay coincidencias';
                        }
                    }
                } else {
                    $result['exception'] = 'Ingrese un valor para buscar';
                }
                break;
            case 'create':
                $_POST = $clientes->validateForm($_POST);
                if ($clientes->setNombres($_POST['nombres'])) {
                    if ($clientes->setApellidos($_POST['apellidos'])) {
                        if ($clientes->setDUI($_POST['dui_c'])) {
                            if ($clientes->setTelefono($_POST['telefono'])) {
                                if ($clientes->setNacimiento($_POST['fecha_nacimiento'])) {
                                    if ($clientes->setDireccion($_POST['direccion'])) {
                                        if ($clientes->setCorreo($_POST['correo'])) {
                                            if ($_POST['clave1'] == $_POST['clave2']) {
                                                if ($clientes->setEstado(isset($_POST['estado_cliente']) ? 1 : 0)) {
                                                if ($clientes->setClave($_POST['clave1'])) {
                                                    if ($clientes->createRow()) {
                                                        $result['status'] = 1;
                                                        $result['message'] = 'Cliente creado correctamente';
                                                    } else {
                                                        $result['exception'] = Database::getException();
                                                    }
                                                } else {
                                                    $result['exception'] = 'Calificación incorrecto';
                                                }
                                            }
                                            else{
                                                $result['exception'] = 'Estado incorrecto';
                                            }
                                         } else {
                                            $result['exception'] = 'La contraseña no coincide';
                                            }
                                        } else {
                                            $result['exception'] = 'DUI incorrecto';
                                        }
                                    } else {
                                        $result['exception'] = 'Direccion incorrecta';
                                    }
                                } else {
                                    $result['exception'] = 'Fecha de nacimiento incorrecta';
                                }
                            } else {
                                $result['exception'] = 'Telefono incorrecto';
                            }
                        } else {
                            $result['exception'] = 'Correo incorrecto';
                        }
                    } else {
                        $result['exception'] = 'Las contraseñas no coinciden';
                    }
                } else {
                    $result['exception'] = 'Contraseña incorrecta';
                }
                break;
            case 'update':
                //print_r($_POST);
                $_POST = $clientes->validateForm($_POST);
                if ($clientes->setId($_POST['id_cliente'])) {
                    if ($clientes->readOne()) {
                        if ($clientes->setNombres($_POST['nombres'])) {
                            if ($clientes->setApellidos($_POST['apellidos'])) {
                                if ($clientes->setDUI($_POST['dui_c'])) {
                                    if ($clientes->setTelefono($_POST['telefono'])) {
                                        if ($clientes->setNacimiento($_POST['fecha_nacimiento'])) {
                                            if ($clientes->setDireccion($_POST['direccion'])) {
                                                if ($clientes->setEstado(isset($_POST['estado_cliente']) ? 1 : 0)) {
                                                if ($clientes->setCorreo($_POST['correo'])) {
                                                    if ($clientes->updateRow()) {
                                                        $result['status'] = 1;
                                                        $result['message'] = 'Cliente actualizado correctamente';
                                                    } else {
                                                        $result['exception'] = Database::getException();
                                                    }
                                                } else {
                                                    $result['exception'] = 'Correo incorrecto';
                                                }
                                            }else{
                                                $result['exception'] = 'Estado incorrecto';
                                            } 
                                        }else {
                                                $result['exception'] = 'Direccion incorrecta';
                                            }
                                        } else {
                                            $result['exception'] = 'Fecha de nacimiento incorrecta';
                                        }
                                    } else {
                                        $result['exception'] = 'Telefono incorrecto';
                                    }
                                } else {
                                    $result['exception'] = 'DUI incorrecto';
                                }
                            } else {
                                $result['exception'] = 'Apellido incorrecto';
                            }
                        } else {
                            $result['exception'] = 'Cliente incorrecto';
                        }
                    } else {
                        $result['exception'] = 'Cliente inexistente';
                    }
                } else {
                    $result['exception'] = 'Cliente incorrecto';
                }
                break;
            case 'readOne':
                if ($clientes->setId($_POST['id_cliente'])) {
                    if ($result['dataset'] = $clientes->readOne()) {
                        $result['status'] = 1;
                    } else {
                        if (Database::getException()) {
                            $result['exception'] = Database::getException();
                        } else {
                            $result['exception'] = 'Cliente inexistente';
                        }
                    }
                } else {
                    $result['exception'] = 'Usuario incorrecto';
                }
                break;
            case 'delete':
                if ($clientes->setId($_POST['id_cliente'])) {
                    if ($data = $clientes->readOne()) {
                        if ($clientes->deleteRow()) {
                            $result['status'] = 1;
                        } else {
                            $result['exception'] = Database::getException();
                        }
                    } else {
                        $result['exception'] = 'Cliente inexistente';
                    }
                } else {
                    $result['exception'] = 'Cliente incorrecta';
                }
                break;
                case 'cantidadComprasClientes':
                    if ($result['dataset'] = $clientes->cantidadComprasClientes()) {
                        $result['status'] = 1;
                    } else {
                        if (Database::getException()) {
                            $result['exception'] = Database::getException();
                        } else {
                            $result['exception'] = 'No hay datos disponibles';
                        }
                    }
                    break;
                default:
                    $result['exception'] = 'Acción no disponible dentro de la sesión';
            }
        // Se indica el tipo de contenido a mostrar y su respectivo conjunto de caracteres.
        header('content-type: application/json; charset=utf-8');
        // Se imprime el resultado en formato JSON y se retorna al controlador.
        print(json_encode($result));
    } else {
        print(json_encode('Acceso denegado'));
    }
} else {
    print(json_encode('Recurso no disponible'));
}
