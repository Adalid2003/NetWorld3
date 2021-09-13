<?php
require_once('../../helpers/database.php');
require_once('../../helpers/validator.php');
require_once('../../models/valoraciones.php');

// Se comprueba si existe una acción a realizar, de lo contrario se finaliza el script con un mensaje de error.
if (isset($_GET['action'])) {
    // Se crea una sesión o se reanuda la actual para poder utilizar variables de sesión en el script.
    session_start();
    // Se instancia la clase correspondiente.
    $valoraciones = new Valoraciones;
    // Se declara e inicializa un arreglo para guardar el resultado que retorna la API.
    $result = array('status' => 0, 'message' => null, 'exception' => null);
    // Se verifica si existe una sesión iniciada como administrador, de lo contrario se finaliza el script con un mensaje de error.
    if (isset($_SESSION['id_usuario'])) {
        // Se compara la acción a realizar cuando un administrador ha iniciado sesión.
        switch ($_GET['action']) {
            // se ejecuta el case readAll
            case 'readAll':
                if ($result['dataset'] = $valoraciones->readAll()) {
                    // se ejecuta la funcion del modelo
                    $result['status'] = 1;
                } else {
                    if (Database::getException()) {
                        // se verifica si no existe un error 
                        $result['exception'] = Database::getException();
                    } else {
                        $result['exception'] = 'No hay valoraciones ingresados aún';
                    }
                }
                break;
                // se ejecuta el case
                case 'readAll2':
                    if ($result['dataset'] = $valoraciones->readAll2()) {
                        // se ejecuta la funcion del modelo
                        $result['status'] = 1;
                    } else {
                        if (Database::getException()) {
                            // se verifica si no existe un error
                            $result['exception'] = Database::getException();
                        } else {
                            $result['exception'] = 'No hay tipos de usuario registrados';
                        }
                    }
                    break;
                    // se ejecuta el case search
            case 'search':
                 // se obtienen el post para acceder a los inputs
                $_POST = $valoraciones->validateForm($_POST);
                //se verifica si el campo no esta vacio
                if ($_POST['search'] != '') {
                    if ($result['dataset'] = $valoraciones->searchRows($_POST['search'])) {
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
                 // se obtienen el post para acceder a los inputs
                $_POST = $valoraciones->validateForm($_POST);
                    if ($valoraciones->setComentario($_POST['comentario_producto'])) {
                        if ($valoraciones->setCalificacion($_POST['calificacion_producto'])) {
                            if ($valoraciones->setProducto($_POST['producto_valoracion'])) {
                                if ($valoraciones->setCliente($_POST['cliente_valoracion'])) {
                                    if ($valoraciones->setEstado(isset($_POST['estado_comentario']) ? 1 : 0)) { 
                                        if ($valoraciones->createRow()) {
                                            // se ejecuta la funcion del modelo
                                            $result['status'] = 1;
                                            $result['message'] = 'Valoracion creado correctamente';
                                        } else {
                                            // se verifica si no existe un error
                                            $result['exception'] = Database::getException();
                                        }
                                    } else {
                                        $result['exception'] = 'Comentario incorrecto';
                                    }
                        } else {
                            $result['exception'] = 'Calificación incorrecto';
                        }
                    } else {
                        $result['exception'] = 'Producto incorrecto';
                    }
                } else {
                    $result['exception'] = 'Cliente incorrecto';
                }
            } else {
                $result['exception'] = 'Estado incorrecto';
            }
            break;
            // se ejecuta el case readOne
            case 'readOne':
                if ($valoraciones->setId($_POST['id_valoracion'])) {
                    if ($result['dataset'] = $valoraciones->readOne()) {
                        // se ejecuta la funcion del modelo
                        $result['status'] = 1;
                    } else {
                        if (Database::getException()) {
                            // se verifica si no existe un error
                            $result['exception'] = Database::getException();
                        } else {
                            $result['exception'] = 'Esta valoracion no existe';
                        }
                    }
                } else {
                    $result['exception'] = 'La valoracion es incorrecta';
                }
                break;
            case 'update':
                 // se obtienen el post para acceder a los inputs
                $_POST = $valoraciones->validateForm($_POST);
                if ($valoraciones->setId($_POST['id_valoracion'])) {
                    if ($data = $valoraciones->readOne()) {
                            if ($valoraciones->setComentario($_POST['comentario_producto'])) {
                                if ($valoraciones->setCalificacion($_POST['calificacion_producto'])) {
                                    if ($valoraciones->setProducto($_POST['producto_valoracion'])) {
                                        if ($valoraciones->setCliente($_POST['cliente_valoracion'])) {
                                    if ($valoraciones->setEstado(isset($_POST['estado_comentario']) ? 1 : 0))
                                        if ($valoraciones->updateRow($_POST['id_valoracion'])) {
                                            // se ejecuta la funcion del modelo
                                            $result['status'] = 1;
                                            $result['message'] = 'El producto se ha actualizado exitosamente';
                                        } else {
                                            // se verifica si no existe un error
                                            $result['exception'] = Database::getException();
                                        }
                                }
                            } else {
                                $result['exception'] = 'Comentario es incorrecto';
                            }
                    } else {
                        $result['exception'] = 'Calificación es incorrecta';
                    }
                } else {
                    $result['exception'] = 'Producto es incorrecto';
                }
            } else {
                $result['exception'] = 'Cliente es incorrecto';
            }
        } else {
            $result['exception'] = 'Estado es incorrecto';
        }
            break;
            case 'delete':
                 // se obtienen el post para acceder a los inputs
                if ($valoraciones->setId($_POST['id_valoracion'])) {
                    if ($data = $valoraciones->readOne()) {
                        if ($valoraciones->deleteRow()) {
                            // se ejecuta la funcion del modelo
                            $result['status'] = 1;
                        } else {
                            // se verifica si existe un error
                            $result['exception'] = Database::getException();
                        }
                    } else {
                        $result['exception'] = 'La valoracion no existe';
                    }
                } else {
                    $result['exception'] = 'Valoracion es incorrecta';
                }
                break;
                //se ejecuta el case
                case 'valoracionesPorProducto':
                    if ($result['dataset'] = $valoraciones->valoracionPorProducto()) {
                        // se ejecuta la funcion del modelo
                        $result['status'] = 1;
                    } else {
                        if (Database::getException()) {
                            // se verifica si existe un error
                            $result['exception'] = Database::getException();
                        } else {
                            $result['exception'] = 'No hay datos disponibles';
                        }
                    }
            break;
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
