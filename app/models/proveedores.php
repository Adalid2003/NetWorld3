<?php
/*
*	Clase para manejar la tabla productos de la base de datos. Es clase hija de Validator.
*/
class proveedores extends Validator
{
    // Declaración de atributos (propiedades).
    private $id = null;
    private $Nombre_proveedor = null;
    private $Telefono_proveedor = null;
    private $Direccion_proveedor = null;

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
    public function setNombre_proveedor($value)
    {
        if ($this->validateAlphanumeric($value, 1, 50)) {
            $this->nombre = $value;
            return true;
        } else {
            return false;
        }
    }
     public function setTelefono_proveedor($value)
    {
        // Se verifica que el número tenga el formato 0000-0000 y que inicie con 2, 6 o 7.
        if (preg_match('/^[2,6,7]{1}[0-9]{3}[-][0-9]{4}$/', $value)) {
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

    public function getNombre_proveedor()
    {
        return $this->Nombre_proveedor;
    }

    public function getTelefono_proveedor()
    {
        return $this->Telefono_proveedor;
    }

    public function getDireccion_proveedor()
    {
        return $this->Direccion_proveedor;
    }

     /*
    *   Métodos para realizar las operaciones SCRUD (search, create, read, update, delete).
    */
    public function searchRows($value)
    {
        $sql = 'SELECT id_proveedor,nombre_proveedor,telefono_prov,direccion_prov
                FROM proveedores
                WHERE nombre_proveeedor ILIKE ? 
                ORDER BY nombre_proveedor';
        $params = array("%$value%", "%$value%");
        return Database::getRows($sql, $params);
    }
    public function createRow()
    {
        $sql = 'INSERT INTO proveedores(nombre_proveedor, telefono_prov, direccion_prov)
                VALUES(?, ?, ?)';
        $params = array($this->Nombre_proveedor, $this->Telefono_proveedor, $this->Direccion_proveedor);
        return Database::executeRow($sql, $params);
    }
    public function readAll()
    {
        $sql = 'SELECT id_proveedores,telefono_prov,direccion_prov
                FROM proveedores
                ORDER BY nombre_proveedor';
        $params = null;
        return Database::getRows($sql, $params);
    }
    public function readOne()
    {
        $sql = 'SELECT id_producto, telefono_prov,direccion_prov
                FROM proveedores
                WHERE id_proveedor = ?';
        $params = array($this->id);
        return Database::getRow($sql, $params);
    }
    public function updateRow()
    {
        

        $sql = 'UPDATE proveedores
                SET nombre_proveedor = ?, telefono_prov = ?, direccion_prov = ?
                WHERE id_proveedor = ?';
        $params = array($this->Nombre_proveedor, $this->Telefono_proveedor, $this->Direccion_proveedor);
        return Database::executeRow($sql, $params);
    }

    public function deleteRow()
    {
        $sql = 'DELETE FROM proveedores
                WHERE id_proveedores = ?';
        $params = array($this->id);
        return Database::executeRow($sql, $params);
    }
    

