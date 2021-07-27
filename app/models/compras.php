<?php
/*
*	Clase para manejar la tabla categorias de la base de datos. Es clase hija de Validator.
*/
class Compras extends Validator
{
    // Declaración de atributos (propiedades).
    private $id = null;
    private $fecha_compra = null;
    private $idC = null;
    private $estado_compra = null;
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
    public function setFecha($value)
    {
        if ($this->validateDate($value)) {
            $this->fecha_compra = $value;
            return true;
        } else {
            return false;
        }
    }
//Métodos para validar y asignar valores del tributo.
    public function setCliente($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->idC = $value;
            return true;
        } else {
            return false;
        }
    }
//Métodos para validar y asignar valores del tributo.  
    public function setEstado($value)
    {
        if ($this->validateBoolean($value)) {
            $this->estado_compra = $value;
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
    public function getfecha_compra()
    {
        return $this->fecha_compra;
    }
//Método que obtiene los valores del tributo.
    public function getIdC()
    {
        return $this->idC;
    }
//Método que obtiene los valores del tributo.
    public function getestado_compra()
    {
        return $this->estado_compra;
    }
     /*
    *   Métodos para realizar las operaciones SCRUD (search, create, read, update, delete).
    */
    // Se declara la funcion
    public function searchRows($value)
    {
        // Se hace la consullta para llevar a cabo la acción
        $sql = 'SELECT id_compra ,fecha_compra , id_cliente, estado_compra,nombre_cliente
                 FROM compra INNER JOIN clientes USING(id_cliente)
                WHERE nombre_cliente ILIKE ?
                ORDER BY nombre_cliente';
        $params = array("%$value%");
        return Database::getRows($sql, $params);
    }
    // Se declara la funcion
    public function createRow()
    {
        // Se hace la consullta para llevar a cabo la acción
        $sql = 'INSERT INTO compra(fecha_compra, id_cliente, estado_compra)
                VALUES(?, ?, ?)';
        $params = array($this->fecha_compra, $this->idC, $this->estado_compra);
        return Database::executeRow($sql, $params);
    }
    // Se declara la funcion
    public function readAll()
    {
        // Se hace la consullta para llevar a cabo la acción
        $sql = 'SELECT id_compra,fecha_compra, nombre_cliente,estado_compra
                FROM compra INNER JOIN clientes USING(id_cliente)
                ORDER BY id_compra';
        $params = null;
        return Database::getRows($sql, $params);
    }
    // Se declara la funcion
    public function readAll2()
    {
        // Se hace la consullta para llevar a cabo la acción
        $sql = 'SELECT * from clientes';
        $params = null;
        return Database::getRows($sql, $params);
    }
    // Se declara la funcion
    public function readOne()
    {
        // Se hace la consullta para llevar a cabo la acción
        $sql = 'SELECT id_compra,fecha_compra, id_cliente,estado_compra
                FROM compra
                WHERE id_compra = ?';
        $params = array($this->id);
        return Database::getRow($sql, $params);
    }
    // Se declara la funcion
    public function updateRow()
    {
        // Se hace la consullta para llevar a cabo la acción
        $sql = 'UPDATE compra
                SET fecha_compra = ?, id_cliente = ?, estado_compra = ?
                WHERE id_compra = ?';
        $params = array($this->fecha_compra, $this->idC, $this->estado_compra, $this->id);
        return Database::executeRow($sql, $params);
    }
    // Se declara la funcion
    public function deleteRow()
    {
        // Se hace la consullta para llevar a cabo la acción
        $sql = 'DELETE FROM compra
                WHERE id_compra= ?';
        $params = array($this->id);
        return Database::executeRow($sql, $params);
    }

    public function readCompraFecha()
    {
        $sql = 'SELECT id_compra, fecha_compra, id_cliente, estado_compra, estado_compra_cliente, nombre_cliente
                FROM compra INNER JOIN clientes USING(id_cliente)
                WHERE id_compra = ? AND estado_compra = 0
                ORDER BY fecha_compra desc';
        $params = array($this->id);
        return Database::getRows($sql, $params);
    }

    public function comprasMasRecientes()
    {
        $sql = 'SELECT fecha_compra, count(id_compra) cantidad from compra group by fecha_compra';
        $params = null;
        return Database::getRows($sql, $params);
    }


}