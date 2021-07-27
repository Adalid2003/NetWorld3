<?php
/*
*	Clase para manejar la tabla productos de la base de datos. Es clase hija de Validator.
*/
class Productos extends Validator
{
    // Declaración de atributos (propiedades).
    private $id = null;
    private $nombre = null;
    private $descripcion = null;
    private $precio = null;
    private $imagen = null;
    private $categoria = null;
    private $estado = null;
    private $ruta = '../../../resources/img/productos/';

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
    public function setDescripcion($value)
    {
        if ($this->validateString($value, 1, 250)) {
            $this->descripcion = $value;
            return true;
        } else {
            return false;
        }
    }
//Métodos para validar y asignar valores del tributo.
    public function setPrecio($value)
    {
        if ($this->validateMoney($value)) {
            $this->precio = $value;
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
    public function setCategoria($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->categoria = $value;
            return true;
        } else {
            return false;
        }
    }
//Métodos para validar y asignar valores del tributo.
    public function setEstado($value)
    {
        if ($this->validateBoolean($value)) {
            $this->estado = $value;
            return true;
        } else {
            return false;
        }
    }

    /*
    *   Métodos para obtener valores de los atributos.
    */
//Método que obtiene los valores del tributo.
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
    public function getDescripcion()
    {
        return $this->descripcion;
    }
//Método que obtiene los valores del tributo.
    public function getPrecio()
    {
        return $this->precio;
    }
//Método que obtiene los valores del tributo.
    public function getImagen()
    {
        return $this->imagen;
    }
//Método que obtiene los valores del tributo.
    public function getCategoria()
    {
        return $this->categoria;
    }
//Método que obtiene los valores del tributo.
    public function getEstado()
    {
        return $this->estado;
    }
//Método que obtiene los valores del tributo.
    public function getRuta()
    {
        return $this->ruta;
    }

    /*
    *   Métodos para realizar las operaciones SCRUD (search, create, read, update, delete).
    */
        // Se declara la funcion
    public function searchRows($value)
    {
        $sql = 'SELECT id_producto, imagen_producto, nombre_producto, descripcion, precio_producto, nombre_categoria, estado_producto
                FROM productos INNER JOIN categorias USING(id_categoria)
                WHERE nombre_producto ILIKE ? OR nombre_categoria ILIKE ?
                ORDER BY nombre_producto';
        $params = array("%$value%", "%$value%");
        return Database::getRows($sql, $params);
    }
    // Se declara la funcion
    public function createRow()
    {
        // Se hace la consullta para llevar a cabo la acción
        $sql = 'INSERT INTO productos(nombre_producto, precio_producto, descripcion, imagen_producto, id_categoria, estado_producto, id_usuario)
                VALUES(?, ?, ?, ?, ?, ?, ?)';
        $params = array($this->nombre, $this->precio, $this->descripcion, $this->imagen, $this->categoria, $this->estado, $_SESSION['id_usuario']);
        return Database::executeRow($sql, $params);
    }
    // Se declara la funcion
    public function readAll()
    {
        // Se hace la consullta para llevar a cabo la acción
        $sql = 'SELECT id_producto, imagen_producto, nombre_producto, descripcion, precio_producto, nombre_categoria, estado_producto
                FROM productos INNER JOIN categorias USING(id_categoria)
                ORDER BY nombre_producto';
        $params = null;
        return Database::getRows($sql, $params);
    }
        // Se declara la funcion
    public function readOne()
    {
        // Se hace la consullta para llevar a cabo la acción
        $sql = 'SELECT id_producto, nombre_producto, descripcion, precio_producto, imagen_producto, id_categoria, estado_producto
                FROM productos
                WHERE id_producto = ?';
        $params = array($this->id);
        return Database::getRow($sql, $params);
    }
    // Se declara la funcion
    public function updateRow($current_image)
    {
        // Se verifica si existe una nueva imagen para borrar la actual, de lo contrario se mantiene la actual.
        ($this->imagen) ? $this->deleteFile($this->getRuta(), $current_image) : $this->imagen = $current_image;
        // Se hace la consullta para llevar a cabo la acción
        $sql = 'UPDATE productos
                SET imagen_producto = ?, nombre_producto = ?, descripcion = ?, precio_producto = ?, estado_producto = ?, id_categoria = ?
                WHERE id_producto = ?';
        $params = array($this->imagen, $this->nombre, $this->descripcion, $this->precio, $this->estado, $this->categoria, $this->id);
        return Database::executeRow($sql, $params);
    }
    // Se declara la funcion
    public function deleteRow()
    {
        // Se hace la consullta para llevar a cabo la acción
        $sql = 'DELETE FROM productos
                WHERE id_producto = ?';
        $params = array($this->id);
        return Database::executeRow($sql, $params);
    }

    /*
    *   Métodos para generar gráficas.
    */
    public function cantidadProductosCategoria()
    {
        // Se hace la consullta para llevar a cabo la acción
        $sql = 'SELECT nombre_categoria, COUNT(id_producto) cantidad
                FROM productos INNER JOIN categorias USING(id_categoria)
                GROUP BY nombre_categoria ORDER BY cantidad DESC';
        $params = null;
        return Database::getRows($sql, $params);
    }
    public function readPrecioProducto()
    {
        // Se hace la consullta para llevar a cabo la acción
        $sql = 'SELECT id_producto, nombre_producto, id_categoria, descripcion, precio_producto, nombre_categoria
                FROM productos INNER JOIN categorias USING(id_categoria) 
                where id_producto = ?
                ORDER BY precio_producto asc';
        $params = array($this->id);
        return Database::getRows($sql, $params);
    }

    public function Productosmasvendidos()
    {
        // Se hace la consullta para llevar a cabo la acción
        $sql = 'SELECT nombre_producto, COUNT(id_detalle_compra) cantidad_producto
		FROM productos INNER JOIN detalle_compra USING(id_producto)
		GROUP BY nombre_producto ORDER BY cantidad_producto DESC LIMIT 10';
        $params = null;
        return Database::getRows($sql, $params);
    }

    public function productosMasCaros()
    {
        $sql = 'SELECT nombre_producto, precio_producto from productos order by precio_producto desc';
        $params = null;
        return Database::getRows($sql, $params);
    }

}
