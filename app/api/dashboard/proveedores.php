<?php
require_once('../../helpers/database.php');
require_once('../../helpers/validator.php');
require_once('../../models/proveedores.php');
// Se comprueba si existe una acción a realizar, de lo contrario se finaliza el script con un mensaje de error.
if (isset($_GET['action'])) {
    // Se crea una sesión o se reanuda la actual para poder utilizar variables de sesión en el script.
    session_start();
    // Se instancia la clase correspondiente.
    $proveedores = new proveedores;
    // Se declara e inicializa un arreglo para guardar el resultado que retorna la API.
    $result = array('status' => 0, 'message' => null, 'exception' => null);
    // Se verifica si existe una sesión iniciada como administrador, de lo contrario se finaliza el script con un mensaje de error.
    if (isset($_SESSION['id_usuario'])) {
        // Se compara la acción a realizar cuando un administrador ha iniciado sesión.
        switch ($_GET['action']) {
            case 'readAll':
                if ($result['dataset'] = $proveedores->readAll()) {
                    $result['status'] = 1;
                } else {
                    if (Database::getException()) {
                        $result['exception'] = Database::getException();
                    } else {
                        $result['exception'] = 'No hay proveedores ingresados aún';
                    }
                }
                break;
                // se ejecuta el case search
            case 'search':
                // se obtienen el post para acceder a los inputs
                $_POST = $proveedores->validateForm($_POST);
                // se verifica que el campo no este vacio
                if ($_POST['search'] != '') {
                    if ($result['dataset'] = $proveedores->searchRows($_POST['search'])) {
                          // se ejecuta la funcion del modelo
                        $result['status'] = 1;
                        $rows = count($result['dataset']);
                        if ($rows > 1) {
                            $result['message'] = 'Se ha encontrado ' . $rows . ' coincidencias';
                        } else {
                            $result['message'] = 'Solo se ha encontrado una coincidencia';
                        }
                    } else {
                        if (Database::getException()) {
                             // se verifica si no existe un error
                            $result['exception'] = Database::getException();
                        } else {
                            $result['exception'] = 'No hay coincidencias';
                        }
                    }
                } else {
                    $result['exception'] = 'Ingrese un valor para buscar';
                }
                break;
                // se ejecuta el case create 
            case 'create':
                //print_r($_POST);
                // se obtienen el post para acceder a los inputs
                $_POST = $proveedores->validateForm($_POST);
                if ($proveedores->setNombre_proveedor($_POST['nombre_proveedor'])) {
                    if ($proveedores->setTelefono_proveedor($_POST['telefono_proveedor'])) {
                        if ($proveedores->setDireccion_proveedor($_POST['direccion_proveedor'])) {
                            if ($proveedores->createRow()) {
                                // se ejecuta la funcion del modelo
                                $result['status'] = 1;
                            } else {
                                // se verifica si no existe un error
                                $result['exception'] = Database::getException();
                            }
                        } else {
                            $result['exception'] = 'Direccion incorrecta';
                        }
                    } else {
                        $result['exception'] = 'Telefono incorrecto';
                    }
                } else {
                    $result['exception'] = 'Nombre incorrecto';
                }
                break;
                // se ejecuta el case readOne
            case 'readOne':
                if ($proveedores->setId($_POST['id_proveedor'])) {
                    if ($result['dataset'] = $proveedores->readOne()) {
                        // se ejecuta la funcion del modelo
                        $result['status'] = 1;
                    } else {
                        if (Database::getException()) {
                             // se verifica si no existe un error
                            $result['exception'] = Database::getException();
                        } else {
                            $result['exception'] = 'Este Proveedor no existe';
                        }
                    }
                } else {
                    $result['exception'] = 'El Proveedor es incorrecto';
                }
                break;
                // se ejecuta el case update
            case 'update':
                 // se obtienen el post para acceder a los inputs
                $_POST = $proveedores->validateForm($_POST);
                if ($proveedores->setId($_POST['id_proovedor'])) {

                    if ($data = $proveedores->readOne()) {
                        if ($proveedores->setNombre_proveedor($_POST['nombre_proveedor'])) {
                            if ($proveedores->setTelefono_proveedor($_POST['telefono_proveedor'])) {
                                if ($proveedores->setDireccion_proveedor($_POST['direccion_proveedor'])) {
                                    if ($proveedores->updateRow()) {
                                        // se ejecuta la funcion del modelo
                                        $result['status'] = 1;
                                        $result['message'] = 'Proveedor modificado correctamente';
                                    } else {
                                          // se verifica si no existe un error
                                        $result['exception'] = Database::getException();
                                    }
                                } else {
                                    $result['exception'] = 'La direccion del Proveedor es incorrecta';
                                }
                            } else {
                                $result['exception'] = 'El telefono del Proveedor es incorrecto';
                            }
                        } else {
                            $result['exception'] = 'El  Nombre del Proveedor es incorrecto';
                        }
                    } else {
                        $result['exception'] = 'El Proveedor no existe';
                    }
                }
                break;
                // se ejecuta el case delete
            case 'delete':
                 // se obtienen el post para acceder a los inputs
                $_POST = $proveedores->validateForm($_POST);
                if ($proveedores->setId($_POST['id_proveedor'])) {
                    if ($data = $proveedores->readOne()) {
                        if ($proveedores -> deleteRow()) {
                               // se ejecuta la funcion del modelo
                            $result['status'] = 1;
                            $result['message'] = 'Proveedor eliminado correctamente';
                        } else {
                             // se verifica si no existe un error
                            $result['exception'] = Database::getException();
                        }
                    } else {
                        $result['exception'] = 'Proveedor inexistente';
                    }
                } else {
                    $result['exception'] = 'Proveedor incorrecto';
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
