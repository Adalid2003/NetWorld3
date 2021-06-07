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
//Métodos para validar y asignar valores del tributo.
 
    public function setNombre_proveedor($value)
    {
        if ($this->validateAlphanumeric($value, 1, 50)) {
            $this->Nombre_proveedor = $value;
            return true;
        } else {
            return false;
        }
    }
    //Métodos para validar y asignar valores del tributo.

    public function setDireccion_proveedor($value)
    {
        if ($this->validateAlphanumeric($value, 1, 50)) {
            $this->Direccion_proveedor = $value;
            return true;
        } else {
            return false;
        }
    }
    
        // Se verifica que el número tenga el formato 0000-0000 y que inicie con 2, 6 o 7.
        public function setTelefono_proveedor($value)
    {
        if ($this->validatePhone($value)) {
            $this->Telefono_proveedor = $value;
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
//Métodos para validar y asignar valores del tributo.
    public function getNombre_proveedor()
    {
        return $this->Nombre_proveedor;
    }
//Métodos para validar y asignar valores del tributo.
    public function getTelefono_proveedor()
    {
        return $this->Telefono_proveedor;
    }
//Métodos para validar y asignar valores del tributo.
    public function getDireccion_proveedor()
    {
        return $this->Direccion_proveedor;
    }

     /*
    *   Métodos para realizar las operaciones SCRUD (search, create, read, update, delete).
    */
    public function searchRows($value)
    {
        // Se hace la consullta para llevar a cabo la acción
        $sql = 'SELECT id_proveedor,nombre_proveedor,telefono_prov,direccion_prov
                FROM proveedores
                WHERE nombre_proveeedor ILIKE ? 
                ORDER BY nombre_proveedor';
        $params = array("%$value%", "%$value%");
        return Database::getRows($sql, $params);
    }
    public function createRow()
    {
        // Se hace la consullta para llevar a cabo la acción
        $sql = 'INSERT INTO proveedores(nombre_proveedor, telefono_prov, direccion_prov)
                VALUES(?, ?, ?)';
        $params = array($this->Nombre_proveedor, $this->Telefono_proveedor, $this->Direccion_proveedor);
        return Database::executeRow($sql, $params);
    }
    public function readAll()
    {
        // Se hace la consullta para llevar a cabo la acción
        $sql = 'SELECT id_proveedor,nombre_proveedor,telefono_prov,direccion_prov
                FROM proveedores
                ORDER BY nombre_proveedor';
        $params = null;
        return Database::getRows($sql, $params);
    }
    public function readOne()
    {
        // Se hace la consullta para llevar a cabo la acción
        $sql = 'SELECT nombre_proveedor, telefono_prov,direccion_prov
                FROM proveedores
                WHERE id_proveedor = ?';
        $params = array($this->id);
        return Database::getRow($sql, $params);
    }
    public function updateRow()
    {
        // Se hace la consullta para llevar a cabo la acción
        $sql = 'UPDATE proveedores
                SET nombre_proveedor = ?, telefono_prov = ?, direccion_prov = ?
                WHERE id_proveedor = ?';
        $params = array($this->Nombre_proveedor, $this->Telefono_proveedor, $this->Direccion_proveedor);
        return Database::executeRow($sql, $params);
    }

    public function deleteRow()
    {
        // Se hace la consullta para llevar a cabo la acción
        $sql = 'DELETE FROM proveedores
                WHERE id_proveedores = ?';
        $params = array($this->id);
        return Database::executeRow($sql, $params);
    }
}