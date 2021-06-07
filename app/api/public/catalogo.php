<?php
//Se mandan a llamar los helpers
require_once('../../helpers/database.php');
require_once('../../helpers/validator.php');
require_once('../../models/categorias.php');
require_once('../../models/productos.php');

// Se comprueba si existe una acción a realizar, de lo contrario se finaliza el script con un mensaje de error.
if (isset($_GET['action'])) {
    // Se instancian las clases correspondientes.
    $categoria = new Categorias;
    $producto = new Productos;
    // Se declara e inicializa un arreglo para guardar el resultado que retorna la API.
    $result = array('status' => 0, 'message' => null, 'exception' => null);
    // Se compara la acción a realizar según la petición del controlador.
    switch ($_GET['action']) {
        // Se crea un caso para verificar que existan categorías para mostrar
        case 'readAll':
            if ($result['dataset'] = $categoria->readAll()) {
                // Verifica que resultado del estado sea 1 para seguir con la acción
                $result['status'] = 1;
            } else {
                if (Database::getException()) {
                    $result['exception'] = Database::getException();
                    //En caso que no sea 1, notifica el error
                } else {
                    $result['exception'] = 'No existen categorías para mostrar';
                }
            }
            // Se finiliza el caso
            break;
            // Se crea un caso para verificar que existan productos para mostrar
        case 'readProductosCategoria':
            //Captura el id de categoría
            if ($categoria->setId($_POST['id_categoria'])) {
                if ($result['dataset'] = $categoria->readProductosCategoria()) {
                    // Verifica que resultado del estado sea 1 para seguir con la acción
                    $result['status'] = 1;
                } else {
                    if (Database::getException()) {
                        $result['exception'] = Database::getException();
                        //En caso que no sea 1, notifica el error
                    } else {
                        $result['exception'] = 'No existen productos para mostrar';
                    }
                    // En caso que la categoría incorrecta se notifica
                }
            } else {
                $result['exception'] = 'Categoría incorrecta';
            }
            // Se finaliza el caso
            break;
            // Se crea un caso para verificar que existan productos para mostrar
        case 'readOne':
            //Captura el id del producto
            if ($producto->setId($_POST['id_producto'])) {
                if ($result['dataset'] = $producto->readOne()) {
                    // Verifica que resultado del estado sea 1 para seguir con la acción
                    $result['status'] = 1;
                } else {
                    if (Database::getException()) {
                        $result['exception'] = Database::getException();
                    //En caso que no sea 1, notifica el error
                    } else {
                        $result['exception'] = 'Producto inexistente';
                    }
                    // En caso que el producto sea incorrecto se notifica
                }
            } else {
                $result['exception'] = 'Producto incorrecto';
            }
            // Se finaliza el caso
            break;
        default:
            $result['exception'] = 'Acción no disponible';
    }
    // Se indica el tipo de contenido a mostrar y su respectivo conjunto de caracteres.
    header('content-type: application/json; charset=utf-8');
    // Se imprime el resultado en formato JSON y se retorna al controlador.
    print(json_encode($result));
    // En caso que ocurra un error, no se imprime el resultado en formato JSON
} else {
    print(json_encode('Recurso no disponible'));
}
