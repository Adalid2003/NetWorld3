<?php
/*
*	Clase para manejar la tabla categorias de la base de datos. Es clase hija de Validator.
*/
class Categorias extends Validator
{
    // Declaración de atributos (propiedades).
    private $id = null;
    private $nombre = null;
    private $imagen = null;
    private $descripcion = null;
    private $ruta = '../../../resources/img/categorias/';

    /*
    *   Métodos para asignar valores a los atributos.
    */
    public function setId($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->id = $value;
            return true;
        } else {
            return false;
        }
    }
//Métodos para validar y asignar valores del tributo.
    public function setNombre($value)
    {
        if ($this->validateAlphanumeric($value, 1, 50)) {
            $this->nombre = $value;
            return true;
        } else {
            return false;
        }
    }
//Métodos para validar y asignar valores del tributo.
    public function setImagen($file)
    {
        if ($this->validateImageFile($file, 500, 500)) {
            $this->imagen = $this->getImageName();
            return true;
        } else {
            return false;
        }
    }
//Métodos para validar y asignar valores del tributo.
    public function setDescripcion($value)
    {
        if ($value) {
            if ($this->validateString($value, 1, 250)) {
                $this->descripcion = $value;
                return true;
            } else {
                return false;
            }
        } else {
            $this->descripcion = null;
            return true;
        }
    }

    /*
    *   Métodos para obtener valores de los atributos.
    */
    public function getId()
    {
        return $this->id;
    }
//Método que obtiene los valores del tributo.
    public function getNombre()
    {
        return $this->nombre;
    }
//Método que obtiene los valores del tributo.
    public function getImagen()
    {
        return $this->imagen;
    }
//Método que obtiene los valores del tributo.
    public function getDescripcion()
    {
        return $this->descripcion;
    }
//Método que obtiene los valores del tributo.
    public function getRuta()
    {
        return $this->ruta;
    }

    /*
    *   Métodos para realizar las operaciones SCRUD (search, create, read, update, delete).
    */
        // Método para buscar una categoría.
    public function searchRows($value)
    {
        // Se realiza una cunsulta que selecciona las categorías.
        $sql = 'SELECT id_categoria, nombre_categoria, imagen_catoria, descripcion_categoria
                FROM categorias
                WHERE nombre_categoria ILIKE ? OR descripcion_categoria ILIKE ?
                ORDER BY nombre_categoria';
        $params = array("%$value%", "%$value%");
        return Database::getRows($sql, $params);
    }
// Se realiza una consulta para ingresar las categorías.
    public function createRow()
    {
        // Se realiza una cunsulta que ingresa las categorías.
        $sql = 'INSERT INTO categorias(nombre_categoria, imagen_catoria, descripcion_categoria)
                VALUES(?, ?, ?)';
        $params = array($this->nombre, $this->imagen, $this->descripcion);
        return Database::executeRow($sql, $params);
    }
// Se realiza una consulta para obtener las categorías.
    public function readAll()
    {
        // Se realiza una cunsulta que selecciona las categorías.
        $sql = 'SELECT id_categoria, nombre_categoria, imagen_catoria, descripcion_categoria
                FROM categorias
                ORDER BY nombre_categoria';
        $params = null;
        return Database::getRows($sql, $params);
    }
// Se realiza una consulta para obtener las categorías.
    public function readOne()
    {
        // Se realiza una cunsulta que selecciona las categorías.
        $sql = 'SELECT id_categoria, nombre_categoria, imagen_catoria, descripcion_categoria
                FROM categorias
                WHERE id_categoria = ?';
        $params = array($this->id);
        return Database::getRow($sql, $params);
    }
// Se realiza una consulta para actualizar las categorías.
    public function updateRow($current_image)
    {
        // Se verifica si existe una nueva imagen para borrar la actual, de lo contrario se mantiene la actual.
        ($this->imagen) ? $this->deleteFile($this->getRuta(), $current_image) : $this->imagen = $current_image;
        // Se realiza una cunsulta que actualiza las categorías.
        $sql = 'UPDATE categorias
                SET imagen_catoria = ?, nombre_categoria = ?, descripcion_categoria = ?
                WHERE id_categoria = ?';
        $params = array($this->imagen, $this->nombre, $this->descripcion, $this->id);
        return Database::executeRow($sql, $params);
    }
// Se realiza una consulta para borrar las categorías.
    public function deleteRow()
    {
        // Se realiza una cunsulta que borra las categorías.
        $sql = 'DELETE FROM categorias
                WHERE id_categoria = ?';
        $params = array($this->id);
        return Database::executeRow($sql, $params);
    }
// Se realiza una consulta para  obtener las categorías de los productos .
    public function readProductosCategoria()
    {
        // Se realiza una cunsulta que selecciona los productos junto a su categoría.
        $sql = 'SELECT nombre_categoria, id_producto, imagen_producto, nombre_producto, descripcion, precio_producto
                FROM productos INNER JOIN categorias USING(id_categoria)
                WHERE id_categoria = ? AND estado_producto = true
                ORDER BY nombre_producto';
        $params = array($this->id);
        return Database::getRows($sql, $params);
    }

    public function readCategoriaRpt()
    {
        $sql = 'SELECT nombre_categoria, count(id_producto) cantidad from productos inner join categorias using(id_categoria)
        GROUP BY nombre_categoria ORDER BY cantidad asc';
        $params = null;
        return Database::getRows($sql, $params);
    }

}
