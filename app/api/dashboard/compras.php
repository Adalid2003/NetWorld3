<?php
require_once('../../helpers/database.php');
require_once('../../helpers/validator.php');
require_once('../../models/compras.php');
// Se comprueba si existe una acción a realizar, de lo contrario se finaliza el script con un mensaje de error.
if (isset($_GET['action'])) {
    // Se crea una sesión o se reanuda la actual para poder utilizar variables de sesión en el script.
    session_start();
    // Se instancia la clase correspondiente.
    $compra= new compra;
    // Se declara e inicializa un arreglo para guardar el resultado que retorna la API.
    $result = array('status' => 0, 'message' => null, 'exception' => null);
    // Se verifica si existe una sesión iniciada como administrador, de lo contrario se finaliza el script con un mensaje de error.
    if (isset($_SESSION['id_usuario'])) {
        // Se compara la acción a realizar cuando un administrador ha iniciado sesión.
        switch ($_GET['action']) {
            case 'readAll':
                if ($result['dataset'] = $compra->readAll()) {
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
                $_POST = $categoria->validateForm($_POST);
                if ($_POST['search'] != '') {
                    if ($result['dataset'] = $compra->searchRows($_POST['search'])) {
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
                $_POST = $compra->validateForm($_POST);

                    if($compra->setfecha_compra($_POST['fecha_compra'])){
                        if($compra->setIdC($_POST['id_cliente'])){
                            if($compra->setestado_compra($_POST['estado_compra'])){
                                if ($compra->createRow()) {
                                    $result['status'] = 1;
                                    
                }
                else {
                    $result['exception'] = Database::getException();
                }
                   
                    }
                    else {
                        $result['exception'] = 'Estado de compra incorrecta';
                    }
                       

                        }
                        else {
                            $result['exception'] = 'cliente incorrecto';
                        }
                           

                            }
                            else {
                                $result['exception'] = 'Fecha incorrecta';
                            }
                                

                                
              break;
            case 'readOne':
                if ($compra->setId($_POST['id_compra'])) {
                        $result['status'] = 1;
                    } else {
                        if (Database::getException()) {
                            $result['exception'] = Database::getException();
                        } else {
                            $result['exception'] = 'Compra inexistente';
                        }
                    }
                } else {
                    $result['exception'] = 'Compra incorrecta';
                }
                break;
                case 'readAll2':
                    if ($result['dataset'] = $compra->readAll2()) {
                        $result['status'] = 1;
                    } else {
                        if (Database::getException()) {
                            $result['exception'] = Database::getException();
                        } else {
                            $result['exception'] = 'No hay cliente registrado';
                        }
                    }
                    break;
                case 'update':
                    $_POST = $compra->validateForm($_POST);
                    if ($compra->setId($_POST['id_compra'])) {
                        if ($data = $compra->readOne()) {
                            if($compra->setfecha_compra($_POST['fecha_compra'])){
                                if($compra->setIdC($_POST['id_cliente'])){
                                    if($compra->setestado_compra($_POST['estado_compra'])){
                                        if ($compra->updateRow()) {
                                            $result['status'] = 1;
                                            $result['message'] = 'Compra modificada correctamente';
                                        } else {
                                            $result['exception'] = Database::getException();
                                        }

                                    }else {
                                        $result['exception'] = 'Estado de compra incorrecta';
                                    }


                                }
                                else {
                                    $result['exception'] = 'Cliente incorrecto';
                                }


                            }else {
                                $result['exception'] = 'Fecha incorrecta';
                            }

                        }else {
                            $result['exception'] = 'Compra inexistente';
                        }

                        

                    }else {
                        $result['exception'] = 'Compra incorrecta';
                    }break;
                    case 'delete':
                        $_POST = $compra->validateForm($_POST);
                        if ($compra->setId($_POST['id_compra'])) {
                            if ($data = $compra->readOne()) {
                                if ($compra>deleteRow()){
                                    $result['status'] = 1;
                                $result['message'] = 'Compra eliminada correctamente';
                            } else {
                                $result['exception'] = Database::getException();
                            }
                                }
                                else {
                                    $result['exception'] = 'Compra inexistente';
                                }
                            }else {
                                $result['exception'] = 'Compra incorrecta';


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

                    
                                  

                                    