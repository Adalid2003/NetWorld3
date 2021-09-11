<?php
require_once('../../helpers/database.php');
require_once('../../helpers/validator.php');
require_once('../../models/usuarios.php');

// Se comprueba si existe una acción a realizar, de lo contrario se finaliza el script con un mensaje de error.
if (isset($_GET['action'])) {
    // Se crea una sesión o se reanuda la actual para poder utilizar variables de sesión en el script.
    session_start();
   //Comprobamos si esta definida la sesión 'tiempo'.

}
    // Se instancia la clase correspondiente.
    $usuario = new Usuarios;
    // Se declara e inicializa un arreglo para guardar el resultado que retorna la API.
    $result = array('status' => 0, 'error' => 0, 'message' => null, 'exception' => null);
    // Se verifica si existe una sesión iniciada como administrador, de lo contrario se finaliza el script con un mensaje de error.
    if (isset($_SESSION['id_usuario'])) {
        if (!isset($_SESSION['tiempo'])) {
            $_SESSION['tiempo']=time();
        }
        else if (time() - $_SESSION['tiempo'] > 5) {
            session_destroy();
            $result['status'] = 1;
            $result['message'] = 'Sesión cerrada por inactividad';
            die();  
        }
        $_SESSION['tiempo']=time(); //Si hay actividad seteamos el valor al tiempo actual
        // Se compara la acción a realizar cuando un administrador ha iniciado sesión.
        switch ($_GET['action']) {
        
        case 'inactividad':
        
            if(isset($_SESSION['tiempo']) ) {

                //Tiempo en segundos para dar vida a la sesión.
                $inactivo = 30;//20min en este caso.
        
                //Calculamos tiempo de vida inactivo.
                $vida_session = time() - $_SESSION['tiempo'];
        
                    //Compraración para redirigir página, si la vida de sesión sea mayor a el tiempo insertado en inactivo.
                    if($vida_session > $inactivo)
                    {
                        //Removemos sesión.
                        session_unset();
                        //Destruimos sesión.
                        session_destroy();              
                        //Redirigimos pagina.
                        header("Location: index.php");
        
                        exit();
                    }
        
            }
            $_SESSION['tiempo'] = time();
                break;
            case 'logOut':
                if (session_destroy()) {
                    $result['status'] = 1;
                    $result['message'] = 'Sesión eliminada correctamente';
                } else {
                    $result['exception'] = 'Ocurrió un problema al cerrar la sesión';
                }
                break;
            case 'readProfile':
                if ($result['dataset'] = $usuario->readProfile()) {
                    $result['status'] = 1;
                } else {
                    if (Database::getException()) {
                        $result['exception'] = Database::getException();
                    } else {
                        $result['exception'] = 'Usuario inexistente';
                    }
                }
                break;
            case 'editProfile':
                $_POST = $usuario->validateForm($_POST);
                if ($usuario->setNombres($_POST['nombres_perfil'])) {
                    if ($usuario->setApellidos($_POST['apellidos_perfil'])) {
                        if ($usuario->setCorreo($_POST['correo_perfil'])) {
                            if ($usuario->setUsuario($_POST['alias_perfil'])) {
                                if ($usuario->editProfile()) {
                                    $result['status'] = 1;
                                    $_SESSION['alias_usuario'] = $usuario->getUsuario();
                                    $result['message'] = 'Perfil modificado correctamente';
                                } else {
                                    $result['exception'] = Database::getException();
                                }
                            } else {
                                $result['exception'] = 'Alias incorrecto';
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
                break;
            case 'changePassword':
                if ($usuario->setId($_SESSION['id_usuario'])) {
                    $_POST = $usuario->validateForm($_POST);
                    if ($usuario->checkPassword($_POST['clave_actual'])) {
                        if ($_POST['clave_nueva_1'] == $_POST['clave_nueva_2']) {
                            if ($usuario->setClave($_POST['clave_nueva_1'])) {
                                if ($usuario->changePassword()) {
                                    $result['status'] = 1;
                                    $result['message'] = 'Contraseña cambiada correctamente';
                                } else {
                                    $result['exception'] = Database::getException();
                                }
                            } else {
                                $result['exception'] = $usuario->getPasswordError();
                            }
                        } else {
                            $result['exception'] = 'Claves nuevas diferentes';
                        }
                    } else {
                        $result['exception'] = 'Clave actual incorrecta';
                    }
                } else {
                    $result['exception'] = 'Usuario incorrecto';
                }
                break;
            case 'readAll':
                if ($result['dataset'] = $usuario->readAll()) {
                    $result['status'] = 1;
                } else {
                    if (Database::getException()) {
                        $result['exception'] = Database::getException();
                    } else {
                        $result['exception'] = 'No hay usuarios registrados';
                    }
                }
                break;
                case 'readHistorial':
                    if ($result['dataset'] = $usuario->readHistorial()) {
                        $result['status'] = 1;
                    } else {
                        if (Database::getException()) {
                            $result['exception'] = Database::getException();
                        } else {
                            $result['exception'] = 'No hay sesiones iniciadas para este usuario';
                        }
                    }
                    break;
            case 'readAll2':
                if ($result['dataset'] = $usuario->readAll2()) {
                    $result['status'] = 1;
                } else {
                    if (Database::getException()) {
                        $result['exception'] = Database::getException();
                    } else {
                        $result['exception'] = 'No hay tipos de usuario registrados';
                    }
                }
                break;
            case 'search':
                $_POST = $usuario->validateForm($_POST);
                if ($_POST['search'] != '') {
                    if ($result['dataset'] = $usuario->searchRows($_POST['search'])) {
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
                //print_r($_POST);
                $_POST = $usuario->validateForm($_POST);
                if ($usuario->setNombres($_POST['nombres'])) {
                    if ($usuario->setDireccion(($_POST['direccion']))) {
                        if ($usuario->setApellidos($_POST['apellidos'])) {
                            if ($usuario->setCorreo($_POST['correo'])) {
                                if ($usuario->setUsuario($_POST['alias'])) {
                                    if ($_POST['clave1'] == $_POST['clave2']) {
                                        if ($usuario->setClave($_POST['clave1'])) {
                                            if ($usuario->setDui($_POST['dui_u'])) {
                                                if ($usuario->setIdU($_POST['tipo_usuario'])) {
                                                    if (is_uploaded_file($_FILES['foto_usuario']['tmp_name'])) {
                                                        if ($usuario->setImagen($_FILES['foto_usuario'])) {
                                                            if ($usuario->createRow()) {
                                                                $result['status'] = 1;
                                                                if ($usuario->saveFile($_FILES['foto_usuario'], $usuario->getRuta(), $usuario->getImagenU())) {
                                                                    $result['message'] = 'Usuario creado correctamente';
                                                                } else {
                                                                    $result['message'] = 'Usuario creado pero no se guardó la imagen';
                                                                }
                                                            } else {
                                                                $result['exception'] = Database::getException();
                                                            }
                                                        } else {
                                                            $result['exception'] = $usuario->getImageError();;
                                                        }
                                                    } else {
                                                        $result['exception'] = 'Selecciona una foto de perfil';
                                                    }
                                                } else {
                                                    $result['exception'] = 'Tipo de usuario incorrecto';
                                                }
                                            } else {
                                                $result['exception'] = 'DUI incorrecto';
                                            }
                                        } else {
                                            $result['exception'] = $usuario->getPasswordError();
                                        }
                                    } else {
                                        $result['exception'] = 'Claves diferentes';
                                    }
                                } else {
                                    $result['exception'] = 'Alias incorrecto';
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
                } else {
                    $result['exception'] = 'Direccion incorrecta';
                }
                break;
            case 'readOne':
                if ($usuario->setId($_POST['id_usuario'])) {
                    if ($result['dataset'] = $usuario->readOne()) {
                        $result['status'] = 1;
                    } else {
                        if (Database::getException()) {
                            $result['exception'] = Database::getException();
                        } else {
                            $result['exception'] = 'Usuario inexistente';
                        }
                    }
                } else {
                    $result['exception'] = 'Usuario incorrecto';
                }
                break;
            case 'update':
                //print_r($_POST);
                $_POST = $usuario->validateForm($_POST);
                if($usuario->setId($_POST['id_usuario'])){
                if ($usuario->setNombres($_POST['nombres'])) {
                    if($data = $usuario->readOne()){
                    if ($usuario->setDireccion(($_POST['direccion']))) {
                        if ($usuario->setApellidos($_POST['apellidos'])) {
                            if ($usuario->setCorreo($_POST['correo'])) {
                                            if ($usuario->setDui($_POST['dui_u'])) {
                                                if ($usuario->setIdU($_POST['tipo_usuario'])) {
                                                    if (is_uploaded_file($_FILES['foto_usuario']['tmp_name'])) {
                                                        if ($usuario->setImagen($_FILES['foto_usuario'])) {
                                                            if ($usuario->updateRow($_FILES['foto_usuario'])) {
                                                                $result['status'] = 1;
                                                                if ($usuario->saveFile($_FILES['foto_usuario'], $usuario->getRuta(), $usuario->getImagenU())) {
                                                                    $result['message'] = 'Usuario actualizado correctamente';
                                                                } else {
                                                                    $result['message'] = 'Usuario actualizado pero no se guardó la imagen';
                                                                }
                                                            } else {
                                                                $result['exception'] = Database::getException();
                                                                $result['message'] = 'Usuario actualizado pero no se guardó la imagen';
                                                            }
                                                        } else {
                                                            $result['exception'] = $usuario->getImageError();;
                                                        }
                                                    } else {
                                                        if ($usuario->updateRow($data['imagen_usuario'])) {
                                                            $result['status'] = 1;
                                                            $result['message'] = 'El usuario se ha actualizado exitosamente';
                                                        } else {
                                                            $result['exception'] = Database::getException();
                                                        }
                                                    }
                                                } else {
                                                    $result['exception'] = 'Tipo de usuario incorrecto';
                                                }
                                            } else {
                                                $result['exception'] = 'DUI incorrecto';
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
                } else {
                    $result['exception'] = 'Direccion incorrecta';
                }
            }else{
                $result['exception'] = 'Usuario inexistente';
            }
        }else{
            $result['exception'] = 'Usuario incorrecto';
        }
                break;
            case 'delete':
                if ($_POST['id_usuario'] != $_SESSION['id_usuario']) {
                    if ($usuario->setId($_POST['id_usuario'])) {
                        if ($usuario->readOne()) {
                            if ($usuario->deleteRow()) {
                                $result['status'] = 1;
                                $result['message'] = 'Usuario eliminado correctamente';
                            } else {
                                $result['exception'] = Database::getException();
                            }
                        } else {
                            $result['exception'] = 'Usuario inexistente';
                        }
                    } else {
                        $result['exception'] = 'Usuario incorrecto';
                    }
                } else {
                    $result['exception'] = 'No se puede eliminar a sí mismo';
                }
                break;
            default:
                $result['exception'] = 'Acción no disponible dentro de la sesión';
        }
    } else {
        // Se compara la acción a realizar cuando el administrador no ha iniciado sesión.
        switch ($_GET['action']) {
            case 'readAll':
                if ($usuario->readAll()) {
                    $result['status'] = 1;
                    $result['message'] = 'Existe al menos un usuario registrado';
                } else {
                    if (Database::getException()) {
                        $result['error'] = 1;
                        $result['exception'] = Database::getException();
                    } else {
                        $result['exception'] = 'No existen usuarios registrados';
                    }
                }
                break;
            case 'register':
                $_POST = $usuario->validateForm($_POST);
                if ($usuario->setNombres($_POST['nombres'])) {
                    if ($usuario->setDireccion(($_POST['direccion']))) {
                        if ($usuario->setApellidos($_POST['apellidos'])) {
                            if ($usuario->setCorreo($_POST['correo'])) {
                                if ($usuario->setUsuario($_POST['alias'])) {
                                    if ($_POST['clave1'] == $_POST['clave2']) {
                                        if ($usuario->setClave($_POST['clave1'])) {
                                            if ($usuario->setDui($_POST['dui_u'])) {
                                                if ($usuario->setIdU(1)) {
                                                    if (is_uploaded_file($_FILES['foto_usuario']['tmp_name'])) {
                                                        if ($usuario->setImagen($_FILES['foto_usuario'])) {
                                                            if ($usuario->createRow()) {
                                                                $result['status'] = 1;
                                                                if ($usuario->saveFile($_FILES['foto_usuario'], $usuario->getRuta(), $usuario->getImagenU())) {
                                                                    $result['message'] = 'Usuario creado correctamente';
                                                                } else {
                                                                    $result['message'] = 'Usuario creado pero no se guardó la imagen';
                                                                }
                                                            } else {
                                                                $result['exception'] = Database::getException();
                                                            }
                                                        } else {
                                                            $result['exception'] = $usuario->getImageError();;
                                                        }
                                                    } else {
                                                        $result['exception'] = 'Selecciona una foto de perfil';
                                                    }
                                                } else {
                                                    $result['exception'] = 'Tipo de usuario incorrecto';
                                                }
                                            } else {
                                                $result['exception'] = 'DUI incorrecto';
                                            }
                                        } else {
                                            $result['exception'] = $usuario->getPasswordError();
                                        }
                                    } else {
                                        $result['exception'] = 'Claves diferentes';
                                    }
                                } else {
                                    $result['exception'] = 'Alias incorrecto';
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
                } else {
                    $result['exception'] = 'Direccion incorrecta';
                }
                break;
            case 'logIn':
                $_POST = $usuario->validateForm($_POST);
                if ($usuario->checkUser($_POST['usuario1'])) {
                    if ($usuario->checkPassword($_POST['clave'])) {
                        $result['status'] = 1;
                        $result['message'] = 'Autenticación correcta';
                        $_SESSION['id_usuario'] = $usuario->getId();
                        $_SESSION['apodo_usuario'] = $usuario->getUsuario();
                        $usuario->createHistorial();
                    } else {
                        if (Database::getException()) {
                            $result['exception'] = Database::getException();
                        } else {
                            $result['exception'] = 'Clave incorrecta';
                        }
                    }
                } else {
                    if (Database::getException()) {
                        $result['exception'] = Database::getException();
                    } else {
                        $result['exception'] = 'Alias incorrecto';
                    }
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
} else {
    print(json_encode('Recurso no disponible'));
}