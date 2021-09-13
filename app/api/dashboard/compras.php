<?php
require_once('../../helpers/database.php');
require_once('../../helpers/validator.php');
require_once('../../models/compras.php');

// Se comprueba si existe una acción a realizar, de lo contrario se finaliza el script con un mensaje de error.
if (isset($_GET['action'])) {
    // Se crea una sesión o se reanuda la actual para poder utilizar variables de sesión en el script.
    session_start();
    // Se instancia la clase correspondiente.
    $compras = new compras;
    // Se declara e inicializa un arreglo para guardar el resultado que retorna la API.
    $result = array('status' => 0, 'message' => null, 'exception' => null);
    // Se verifica si existe una sesión iniciada como administrador, de lo contrario se finaliza el script con un mensaje de error.
    if (isset($_SESSION['id_usuario'])) {
        // Se compara la acción a realizar cuando un administrador ha iniciado sesión.
        switch ($_GET['action']) {
            case 'readAll':
                if ($result['dataset'] = $compras->readAll()) {
                    $result['status'] = 1;
                } else {
                    if (Database::getException()) {
                        $result['exception'] = Database::getException();
                    } else {
                        $result['exception'] = 'No hay compras registradas';
                    }
                }
                break;
            case 'search':
                // se obtienen el post para acceder a los inputs
                $_POST = $compras->validateForm($_POST);
                if ($_POST['search'] != '') {
                    if ($result['dataset'] = $compras->searchRows($_POST['search'])) {
                        
                           // se ejecuta la funcion del modelo
                        $result['status'] = 1;
                        $rows = count($result['dataset']);
                        if ($rows > 1) {
                            $result['message'] = 'Se encontraron ' . $rows . ' coincidencias';
                        } else {
                            $result['message'] = 'Solo existe una coincidencia';
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
                    $_POST = $compras->validateForm($_POST);
                    if($compras->setCliente($_POST['cliente_compra'])){
                        if($compras->setFecha($_POST['fecha_compra'])){
                            if ($compras->setEstado(isset($_POST['estado_compra']) ? 1 : 0)){
                                if ($compras->createRow()) {
                                        // se ejecuta la funcion del modelo
                                    $result['status'] = 1;
                                    $result['message'] = 'Regitro de compra creada correctamente';
                                } else {
                                    // se verifica si no existe un error
                                    $result['exception'] = Database::getException();
                                }

                            }
                            else {
                                $result['exception'] = 'Estado incorrecto';
                            }     
                            

                        }else {
                            $result['exception'] = 'Fecha incorrecta';
                        }

                    }else {
                        $result['exception'] = 'Cliente incorrecto';
                    }
                  
                break;
                // se ejecuta el case readOne
                case 'readOne':
                    // se obtienen el post para acceder a los inputs
                    if ($compras->setId($_POST['id_compra'])) {
                        if ($result['dataset'] = $compras->readOne()) {
                             // se ejecuta la funcion del modelo
                            $result['status'] = 1;
                        } else {
                            if (Database::getException()) {
                                $result['exception'] = Database::getException();
                            } else {
                                $result['exception'] = 'Esta compra no existe';
                            }
                        }
                    } else {
                        $result['exception'] = 'La compra es incorrecta';
                    }
                    break;
    
                    case 'readAll2':
                        if ($result['dataset'] = $compra->readAll2()) {
                            $result['status'] = 1;
                        } else {
                            if (Database::getException()) {
                                // se verifica si no existe un error
                                $result['exception'] = Database::getException();
                            } else {
                                $result['exception'] = 'No hay cliente registrado';
                            }
                        }
                        break;
                        // se ejecuta el case update
                    case 'update':
                        //print_r($_POST);
                         // se obtienen el post para acceder a los inputs
                        $_POST = $compras->validateForm($_POST);
                        if ($compras->setId($_POST['id_compra'])) {
                            if ($data = $compras->readOne()) {
                                if($compras->setCliente($_POST['cliente_compra'])) {
                                    if($compras->setFecha($_POST['fecha_compra'])) {
                                        if ($compras->setEstado(isset($_POST['estado_compra']) ? 1 : 0)){
                                            if ($compras->updateRow($_POST['id_compra'])) {
                                                // se ejecuta la funcion del modelo
                                                $result['status'] = 1;
                                                $result['message'] = 'Compra modificada correctamente';
                                            } else {
                                                // se verifica si no existe un error
                                                $result['exception'] = Database::getException();
                                            }
    
                                        }else {
                                            $result['exception'] = 'Estado incorrecto';
                                        }
    
    
                                    }
                                    else {
                                        $result['exception'] = 'Fecha incorrecta';
                                    }
    
    
                                }else {
                                    $result['exception'] = 'Cliente incorrecto';
                                }
                                break;

                            }
                        }
                            // se ejecuta el case delete
                            case 'delete':
                                if ($compras->setId($_POST['id_compra'])) {
                                    if ($data = $compras->readOne()) {
                                        if ($compras->deleteRow()) {
                                             // se ejecuta la funcion del modelo
                                            $result['status'] = 1;
                                        } else {
                                            // se verifica si no existe un error
                                            $result['exception'] = Database::getException();
                                        }
                                    } else {
                                        $result['exception'] = 'Compra inexistente';
                                    }
                                } else {
                                    $result['exception'] = 'Compra incorrecta';
                                }
                                break;
                                // se ejecuta el case
                                case 'comprasMasRecientes':
                                    if ($result['dataset'] = $compras->comprasMasRecientes()) {
                                        // se ejecuta la funcion del modelo
                                        $result['status'] = 1;
                                    } else {
                                        if (Database::getException()) {
                                            // se verifica si no existe un error
                                            $result['exception'] = Database::getException();
                                        } else {
                                            $result['exception'] = 'No hay cliente registrado';
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


                    
                                  

                                    