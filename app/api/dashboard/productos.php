<?php
require_once('../../helpers/database.php');
require_once('../../helpers/validator.php');
require_once('../../models/productos.php');

// Se comprueba si existe una acción a realizar, de lo contrario se finaliza el script con un mensaje de error.
if (isset($_GET['action'])) {
    // Se crea una sesión o se reanuda la actual para poder utilizar variables de sesión en el script.
    session_start();
    // Se instancia la clase correspondiente.
    $producto = new Productos;
    // Se declara e inicializa un arreglo para guardar el resultado que retorna la API.
    $result = array('status' => 0, 'message' => null, 'exception' => null);
    // Se verifica si existe una sesión iniciada como administrador, de lo contrario se finaliza el script con un mensaje de error.
    if (isset($_SESSION['id_usuario'])) {
        // Se compara la acción a realizar cuando un administrador ha iniciado sesión.
        switch ($_GET['action']) {
            case 'readAll':
                if ($result['dataset'] = $producto->readAll()) {
                    $result['status'] = 1;
                } else {
                    if (Database::getException()) {
                        $result['exception'] = Database::getException();
                    } else {
                        $result['exception'] = 'No hay productos ingresados aún';
                    }
                }
                break;
            case 'search':
                $_POST = $producto->validateForm($_POST);
                if ($_POST['search'] != '') {
                    if ($result['dataset'] = $producto->searchRows($_POST['search'])) {
                        $result['status'] = 1;
                        $rows = count($result['dataset']);
                        if ($rows > 1) {
                            $result['message'] = 'Se ha encontrado ' . $rows . ' coincidencias';
                        } else {
                            $result['message'] = 'Solo se ha encontrado una coincidencia';
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
                $_POST = $producto->validateForm($_POST);
                if ($producto->setNombre($_POST['nombre_producto'])) {
                    if ($producto->setDescripcion($_POST['descripcion'])) {
                        if ($producto->setPrecio($_POST['precio_producto'])) {
                            if (isset($_POST['categoria_producto'])) {
                                if ($producto->setCategoria($_POST['categoria_producto'])) {
                                    if ($producto->setEstado(isset($_POST['estado_producto']) ? 1 : 0)) {
                                        if (is_uploaded_file($_FILES['archivo_producto']['tmp_name'])) {
                                            if ($producto->setImagen($_FILES['archivo_producto'])) {
                                                if ($producto->createRow()) {
                                                    $result['status'] = 1;
                                                    if ($producto->saveFile($_FILES['archivo_producto'], $producto->getRuta(), $producto->getImagen())) {
                                                        $result['message'] = 'Producto creado correctamente';
                                                    } else {
                                                        $result['message'] = 'Producto creado pero no se guardó la imagen';
                                                    }
                                                } else {
                                                    $result['exception'] = Database::getException();;
                                                }
                                            } else {
                                                $result['exception'] = $producto->getImageError();
                                            }
                                        } else {
                                            $result['exception'] = 'Seleccione una imagen';
                                        }
                                    } else {
                                        $result['exception'] = 'Estado incorrecto';
                                    }
                                } else {
                                    $result['exception'] = 'Categoría incorrecta';
                                }
                            } else {
                                $result['exception'] = 'Seleccione una categoría';
                            }
                        } else {
                            $result['exception'] = 'Precio incorrecto';
                        }
                    } else {
                        $result['exception'] = 'Descripción incorrecta';
                    }
                } else {
                    $result['exception'] = 'Nombre incorrecto';
                }
                break;
            case 'readOne':
                if ($producto->setId($_POST['id_producto'])) {
                    if ($result['dataset'] = $producto->readOne()) {
                        $result['status'] = 1;
                    } else {
                        if (Database::getException()) {
                            $result['exception'] = Database::getException();
                        } else {
                            $result['exception'] = 'Este producto no existe';
                        }
                    }
                } else {
                    $result['exception'] = 'El producto es incorrecto';
                }
                break;
            case 'update':
                $_POST = $producto->validateForm($_POST);
                if ($producto->setId($_POST['id_producto'])) {
                    if ($data = $producto->readOne()) {
                        if ($producto->setNombre($_POST['nombre_producto'])) {
                            if ($producto->setDescripcion($_POST['descripcion'])) {
                                if ($producto->setPrecio($_POST['precio_producto'])) {
                                    if ($producto->setCategoria($_POST['categoria_producto'])) {
                                        if ($producto->setEstado(isset($_POST['estado_producto']) ? 1 : 0)) {
                                            if (is_uploaded_file($_FILES['archivo_producto']['tmp_name'])) {
                                                if ($producto->setImagen($_FILES['archivo_producto'])) {
                                                    if ($producto->updateRow($data['imagen_producto'])) {
                                                        $result['status'] = 1;
                                                        if ($producto->saveFile($_FILES['archivo_producto'], $producto->getRuta(), $producto->getImagen())) {
                                                            $result['message'] = 'El producto se ha actualizado exitosamente';
                                                        } else {
                                                            $result['message'] = 'El producto se ha acutualizado pero no se guardó la imagen';
                                                        }
                                                    } else {
                                                        $result['exception'] = Database::getException();
                                                    }
                                                } else {
                                                    $result['exception'] = $producto->getImageError();
                                                }
                                            } else {
                                                if ($producto->updateRow($data['imagen_producto'])) {
                                                    $result['status'] = 1;
                                                    $result['message'] = 'El producto se ha actualizado exitosamente';
                                                } else {
                                                    $result['exception'] = Database::getException();
                                                }
                                            }
                                        } else {
                                            $result['exception'] = 'Estado es incorrecto';
                                        }
                                    } else {
                                        $result['exception'] = 'Seleccione una categoría';
                                    }
                                } else {
                                    $result['exception'] = 'Precio es incorrecto';
                                }
                            } else {
                                $result['exception'] = 'Descripción es incorrecta';
                            }
                        } else {
                            $result['exception'] = 'Nombre es incorrecto';
                        }
                    } else {
                        $result['exception'] = 'El prodcuto no existe';
                    }
                } else {
                    $result['exception'] = 'Producto es incorrecto';
                }
                break;
            case 'delete':
                if ($producto->setId($_POST['id_producto'])) {
                    if ($data = $producto->readOne()) {
                        if ($producto->deleteRow()) {
                            $result['status'] = 1;
                            if ($producto->deleteFile($producto->getRuta(), $data['imagen_producto'])) {
                                $result['message'] = 'El producto se ha eliminado';
                            } else {
                                $result['message'] = 'El producto ha eliminado pero no se borró la imagen';
                            }
                        } else {
                            $result['exception'] = Database::getException();
                        }
                    } else {
                        $result['exception'] = 'El producto no existe';
                    }
                } else {
                    $result['exception'] = 'Producto es incorrecto';
                }
                break;
            case 'cantidadProductosCategoria':
                if ($result['dataset'] = $producto->cantidadProductosCategoria()) {
                    $result['status'] = 1;
                } else {
                    if (Database::getException()) {
                        $result['exception'] = Database::getException();
                    } else {
                        $result['exception'] = 'No hay datos disponibles';
                    }
                }
                break;
                case 'ProductosMasvendidos':
                    if ($result['dataset'] = $producto->Productosmasvendidos()) {
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
