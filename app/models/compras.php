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
    
    /*
    *   Métodos para obtener valores de los atributos.
    */
    public function getId()
    {
        return $this->id;
    }

    public function getfecha_compra()
    {
        return $this->fecha_compra;
    }

    public function getIdC()
    {
        return $this->idC;
    }

    public function getestado_compra()
    {
        return $this->estado_compra;
    }
     /*
    *   Métodos para realizar las operaciones SCRUD (search, create, read, update, delete).
    */
    public function searchRows($value)
    {
        $sql = 'SELECT id_compra ,fecha_compra,id_cliente,estado_compra
                FROM compra
                WHERE fecha_compra ILIKE ?
                ORDER BY fecha_compra';
        $params = array("%$value%");
        return Database::getRows($sql, $params);
    }
    public function createRow()
    {
        $sql = 'INSERT INTO compra(fecha_compra, id_cliente, estado_compra)
                VALUES(?, ?, ?)';
        $params = array($this->fecha_compra, $this->idC, $this->estado_compra);
        return Database::executeRow($sql, $params);
    }
    public function readAll()
    {
        $sql = 'SELECT id_compra,fecha_compra_id_cliente,estado_compra
                FROM compra 
                ORDER BY id_compra';
        $params = null;
        return Database::getRows($sql, $params);
    }

    public function readAll2()
    {
        $sql = 'SELECT id_cliente, nombre_cliente from clientes';
        $params = null;
        return Database::getRows($sql, $params);
    }
    public function readOne()
    {
        $sql = 'SELECT id_compra,fecha_compra_id_cliente,estado_compra
                FROM compra
                WHERE id_compra = ?';
        $params = array($this->id);
        return Database::getRow($sql, $params);
    }

    public function updateRow()
    {
        
        $sql = 'UPDATE compra
                SET fecha_compra = ?, id_cliente = ?, estado_compra = ?
                WHERE id_compra = ?';
        $params = array($this->fecha_compra, $this->id_cliente, $this->estado_compra;
        return Database::executeRow($sql, $params);
    }
    public function deleteRow()
    {
        $sql = 'DELETE FROM compra
                WHERE id_compra= ?';
        $params = array($this->id);
        return Database::executeRow($sql, $params);
    }



    