<?php
/*
*	Clase para manejar la tabla productos de la base de datos. Es clase hija de Validator.
*/
class Valoraciones extends Validator
{
    // Declaración de atributos (propiedades).
    private $id = null;
    private $calificacion = null;
    private $comentario = null;
    private $estado = null;

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

    public function setCalificacion($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->calificacion = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setComentario($value)
    {
        if ($this->validateString($value, 1, 250)) {
            $this->comentario = $value;
            return true;
        } else {
            return false;
        }
    }

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
    public function getId()
    {
        return $this->id;
    }

    public function getCalificacion()
    {
        return $this->calificacion;
    }

    public function getComentario()
    {
        return $this->comentario;
    }

    public function getEstado()
    {
        return $this->estado;
    }

    /*
    *   Métodos para realizar las operaciones SCRUD (search, create, read, update, delete).
    */
    public function searchRows($value)
    {
        $sql = 'SELECT id_valoracion, calificacion_producto, comentario_producto
        FROM valoraciones
        WHERE calificacion_producto ILIKE ? OR comentario_producto ILIKE ?
        ORDER BY calificacion_producto';
        $params = array("%$value%", "%$value%");
        return Database::getRows($sql, $params);
    }

    public function createRow()
    {
        $sql = 'INSERT INTO valoraciones(calificacion_producto, comentario_producto, estado_comentario)
                VALUES(?, ?, ?)';
        $params = array($this->calificacion, $this->comentario, $this->estado);
        return Database::executeRow($sql, $params);
    }

    public function readAll()
    {
        $sql = 'SELECT id_valoracion, calificacion_producto, comentario_producto
                FROM valoraciones
                ORDER BY calificacion_producto';
        $params = null;
        return Database::getRows($sql, $params);
    }

    public function readOne()
    {
        $sql = 'SELECT id_valoracion, calificacion_producto, comentario_producto
                FROM valoraciones
                WHERE id_valoracion = ?';
        $params = array($this->id);
        return Database::getRow($sql, $params);
    }

    public function updateRow($current_image)
    {
        $sql = 'UPDATE valoraciones
                SET calificacion_producto = ?, comentario_producto = ?, estado_comentario = ?
                WHERE id_valoracion = ?';
        $params = array($this->calificacion, $this->comentario, $this->estado, $this->id);
        return Database::executeRow($sql, $params);
    }

    public function deleteRow()
    {
        $sql = 'DELETE FROM valoraciones
                WHERE id_valoraciones = ?';
        $params = array($this->id);
        return Database::executeRow($sql, $params);
    }


}
