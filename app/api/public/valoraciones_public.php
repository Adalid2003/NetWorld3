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
            // Se crea un caso para verificar que existan las valoraciones para mostrar
            case 'readAll':
                if ($result['dataset'] = $valoraciones->readAll()) {
                    // Verifica que resultado del estado sea 1 para seguir con la acción
                    $result['status'] = 1;
                } else {
                    if (Database::getException()) {
                        $result['exception'] = Database::getException();
                        //En caso que no sea 1, notifica el error
                    } else {
                        $result['exception'] = 'No hay valoraciones ingresados aún';
                    }
                }
                // Se finaliza el caso
                break;
                // Se crea un caso para verificar que existan usuarios para mostrar
                case 'readAll2':
                    if ($result['dataset'] = $valoraciones->readAll2()) {
                        // Verifica que resultado del estado sea 1 para seguir con la acción
                        $result['status'] = 1;
                    } else {
                        if (Database::getException()) {
                            $result['exception'] = Database::getException();
                            //En caso que no sea 1, notifica el error
                        } else {
                            $result['exception'] = 'No hay tipos de usuario registrados';
                        }
                    }
                    // Se finaliza el caso
                    break;
                // Se crea un caso para bucar las valoraciones
            case 'search':
                // Se valida el formulario
                $_POST = $valoraciones->validateForm($_POST);
                if ($_POST['search'] != '') {
                    // Se busca en las filas con el caso para buscar "search"
                    if ($result['dataset'] = $valoraciones->searchRows($_POST['search'])) {
                        // Verifica que resultado del estado sea 1 para seguir con la acción
                        $result['status'] = 1;
                        $rows = count($result['dataset']);
                        // En caso que sea mayo que uno se lleva a cabo la acción
                        if ($rows > 1) {
                            $result['message'] = 'Se ha encontrado ' . $rows . ' coincidencias';
                        //En caso que sea menor a 1, notifica el error
                        } else {
                            $result['message'] = 'Solo se ha encontrado una coincidencia';
                        }
                        //En caso que sea menor a 1, notifica el error
                    } else {
                        if (Database::getException()) {
                            $result['exception'] = Database::getException();
                        } else {
                            $result['exception'] = 'No hay coincidencias';
                        }
                    }
                    // Se notfica que tiene que ingreaar un valor al estar el campo vacío
                } else {
                    $result['exception'] = 'Ingrese un valor para buscar';
                }
                // Se finaliza el caso
                break;
            // Se crea un caso para crear las valoraciones
            case 'create':
                $_POST = $valoraciones->validateForm($_POST);
                // Se declara una dacena de if con los datos de la base de datos uniendolos con el model
                    if ($valoraciones->setComentario($_POST['comentario_producto'])) {
                        if ($valoraciones->setCalificacion($_POST['calificacion_producto'])) {
                            if ($valoraciones->setProducto($_POST['producto_valoracion'])) {
                                if ($valoraciones->setCliente($_POST['cliente_valoracion'])) {
                                    if ($valoraciones->setEstado(isset($_POST['estado_comentario']) ? 1 : 0)) { 
                                        // Se crea la fila
                                        if ($valoraciones->createRow()) {
                                            // Verifica si el estado es 1 
                                            $result['status'] = 1;
                                            // En caso de que sea 1 se lleva a cabo la acción
                                            $result['message'] = 'Valoracion creado correctamente';
                                            // En caso de no sea uno se notifican los errores
                                        } else {
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
            // Se finaliza el caso
            break;
            // Se crea un caso para verificar las valoraciones
            case 'readOne':
                // Se captura el id de la valoracion 
                if ($valoraciones->setId($_POST['id_valoracion'])) {
                    if ($result['dataset'] = $valoraciones->readOne()) {
                        // Se declara que el estado es igual a uno
                        $result['status'] = 1;
                        // En caso que el estado que no sea uno se notifica el error
                    } else {
                        if (Database::getException()) {
                            $result['exception'] = Database::getException();
                        } else {
                            $result['exception'] = 'Esta valoracion no existe';
                        }
                    }
                    // Si la valoracion es incorrecta, se notifica
                } else {
                    $result['exception'] = 'La valoracion es incorrecta';
                }
                // Se finaliza el proceso
                break;
                // Se crea un caso para actualizar las valoraciones
            case 'update':
                // Se valida el formulario
                $_POST = $valoraciones->validateForm($_POST);
                 // Se captura el id de la valoracion 
                if ($valoraciones->setId($_POST['id_valoracion'])) {
                    // Se declara una dacena de if con los datos de la base de datos uniendolos con el model
                    if ($data = $valoraciones->readOne()) {
                            if ($valoraciones->setComentario($_POST['comentario_producto'])) {
                                if ($valoraciones->setCalificacion($_POST['calificacion_producto'])) {
                                    if ($valoraciones->setProducto($_POST['producto_valoracion'])) {
                                        if ($valoraciones->setCliente($_POST['cliente_valoracion'])) {
                                    if ($valoraciones->setEstado(isset($_POST['estado_comentario']) ? 1 : 0))
                                        // Se actualiza la fila
                                        if ($valoraciones->updateRow($_POST['id_valoracion'])) {
                                            // Verifica si el estado es 1 
                                            $result['status'] = 1;
                                            $result['message'] = 'El producto se ha actualizado exitosamente';
                                            // En caso de no sea uno se notifican los errores
                                        } else {
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
        // Se finaliza el proceso
            break;
            // Se crea un caso para actualizar las valoraciones
            case 'delete':
                // Se captura el id de la valoracion 
                if ($valoraciones->setId($_POST['id_valoracion'])) {
                    // Se declara una dacena de if con los datos de la base de datos uniendolos con el model
                    if ($data = $valoraciones->readOne()) {
                        if ($valoraciones->deleteRow()) {
                            // Se declara que el estado es igual a uno
                            $result['status'] = 1;
                            // En caso que el estado que no sea uno se notifica el error
                        } else {
                            $result['exception'] = Database::getException();
                        }
                        // Si la valoracion es incorrecta, se notifica
                    } else {
                        $result['exception'] = 'La valoracion no existe';
                    }
                } else {
                    $result['exception'] = 'Valoracion es incorrecta';
                }
                // Se finzaliza el proceso
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

