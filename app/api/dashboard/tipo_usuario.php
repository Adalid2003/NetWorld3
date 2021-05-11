<?php
require_once('../../helpers/database.php');
require_once('../../helpers/validator.php');
require_once('../../models/tipo_usuario.php');

if(isset($_GET['action'])){
    session_start();
$tipo = new Tipo;
if (isset($_SESSION['id_usuario'])) {
        // Se compara la acción a realizar cuando un administrador ha iniciado sesión.
        switch ($_GET['action']) {
            case 'readAll':
                if ($result['dataset'] = $tipo->readAll()) {
                    $result['status'] = 1;
                } else {
                    if (Database::getException()) {
                        $result['exception'] = Database::getException();
                    } else {
                        $result['exception'] = 'No hay tipo registrado';
                    }
                }
                break;
            }
        }
    }else {
        print(json_encode('Recurso no disponible'));
    }
?>