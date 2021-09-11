<?php
/*
*	Clase para manejar la tabla clientes de la base de datos. Es clase hija de Validator.
*/
class Clientes extends Validator
{
    // Declaración de atributos (propiedades).
    private $id = null;
    private $nombres = null;
    private $apellidos = null;
    private $correo = null;
    private $telefono = null;
    private $dui = null;
    private $nacimiento = null;
    private $direccion = null;
    private $clave = null;
    private $estado = null; // Valor por defecto en la base de datos: true

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
    public function setNombres($value)
    {
        if ($this->validateAlphabetic($value, 1, 50)) {
            $this->nombres = $value;
            return true;
        } else {
            return false;
        }
    }
    //Métodos para validar y asignar valores del tributo.
    public function setApellidos($value)
    {
        if ($this->validateAlphabetic($value, 1, 50)) {
            $this->apellidos = $value;
            return true;
        } else {
            return false;
        }
    }
    //Métodos para validar y asignar valores del tributo.
    public function setCorreo($value)
    {
        if ($this->validateEmail($value)) {
            $this->correo = $value;
            return true;
        } else {
            return false;
        }
    }
    //Métodos para validar y asignar valores del tributo.
    public function setTelefono($value)
    {
        if ($this->validatePhone($value)) {
            $this->telefono = $value;
            return true;
        } else {
            return false;
        }
    }
    //Métodos para validar y asignar valores del tributo.
    public function setDUI($value)
    {
        if ($this->validateDUI($value)) {
            $this->dui = $value;
            return true;
        } else {
            return false;
        }
    }
    //Métodos para validar y asignar valores del tributo.
    public function setNacimiento($value)
    {
        if ($this->validateDate($value)) {
            $this->nacimiento = $value;
            return true;
        } else {
            return false;
        }
    }
    //Métodos para validar y asignar valores del tributo.
    public function setDireccion($value)
    {
        if ($this->validateString($value, 1, 200)) {
            $this->direccion = $value;
            return true;
        } else {
            return false;
        }
    }
    //Métodos para validar y asignar valores del tributo.
    public function setClave($value)
    {
        if ($this->validatePassword($value)) {
            $this->clave = $value;
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
    public function getId()
    {
        return $this->id;
    }
    //Método que obtiene los valores del tributo.
    public function getNombres()
    {
        return $this->nombres;
    }
    //Método que obtiene los valores del tributo.
    public function getApellidos()
    {
        return $this->apellidos;
    }
    //Método que obtiene los valores del tributo.
    public function getCorreo()
    {
        return $this->correo;
    }
    //Método que obtiene los valores del tributo.
    public function getTelefono()
    {
        return $this->telefono;
    }
    //Método que obtiene los valores del tributo.
    public function getDUI()
    {
        return $this->dui;
    }
    //Método que obtiene los valores del tributo.
    public function getNacimiento()
    {
        return $this->nacimiento;
    }
    //Método que obtiene los valores del tributo.
    public function getDireccion()
    {
        return $this->direccion;
    }
    //Método que obtiene los valores del tributo.
    public function getClave()
    {
        return $this->clave;
    }
    //Método que obtiene los valores del tributo.
    public function getEstado()
    {
        return $this->estado;
    }

    /*
    *   Métodos para gestionar la cuenta del cliente.
    */
    // Método para verificar los usuarios.
    public function checkUser($correo)
    {
        // Se hace la consullta para llevar a cabo la acción
        $sql = 'SELECT id_cliente, estado_cliente FROM clientes WHERE correo_cliente = ?';
        $params = array($correo);
        if ($data = Database::getRow($sql, $params)) {
            $this->id = $data['id_cliente'];
            $this->estado = $data['estado_cliente'];
            $this->correo = $correo;
            return true;
        } else {
            return false;
        }
    }

    public function checkPassword($password)
    {
        // Se hace la consullta para llevar a cabo la acción
        $sql = 'SELECT clave_cliente FROM clientes WHERE id_cliente = ?';
        $params = array($this->id);
        $data = Database::getRow($sql, $params);
        if (password_verify($password, $data['clave_cliente'])) {
            return true;
        } else {
            return false;
        }
    }

    public function changePassword()
    {
        $hash = password_hash($this->clave, PASSWORD_DEFAULT);
        // Se hace la consullta para llevar a cabo la acción
        $sql = 'UPDATE clientes SET clave_cliente = ? WHERE id_cliente = ?';
        $params = array($hash, $this->id);
        return Database::executeRow($sql, $params);
    }

    public function editProfile()
    {
        // Se hace la consullta para llevar a cabo la acción
        $sql = 'UPDATE clientes
                SET nombres_cliente = ?, apellidos_cliente = ?, correo_cliente = ?, dui_cliente = ?, telefono_cliente = ?, nacimiento_cliente = ?, direccion_cliente = ?
                WHERE id_cliente = ?';
        $params = array($this->nombres, $this->apellidos, $this->correo, $this->dui, $this->telefono, $this->nacimiento, $this->direccion, $this->id);
        return Database::executeRow($sql, $params);
    }

    /*
    *   Métodos para realizar las operaciones SCRUD (search, create, read, update, delete).
    */
    public function searchRows($value)
    {
        // Se hace la consullta para llevar a cabo la acción
        $sql = 'SELECT id_cliente, nombre_cliente, apellido_cliente, correo_cliente, dui_cliente, telefono_cliente, fecha_nacimiento_cliente, direccion_cliente
                FROM clientes
                WHERE apellido_cliente ILIKE ? OR nombre_cliente ILIKE ?
                ORDER BY apellido_cliente';
        $params = array("%$value%", "%$value%");
        return Database::getRows($sql, $params);
    }
    // Se declara la funcion
    public function createRow()
    {
        // Se encripta la clave por medio del algoritmo bcrypt que genera un string de 60 caracteres.
        $hash = password_hash($this->clave, PASSWORD_DEFAULT);
        // Se hace la consullta para llevar a cabo la acción
        $sql = 'INSERT INTO clientes(nombre_cliente, apellido_cliente, correo_cliente, dui_cliente, telefono_cliente, fecha_nacimiento_cliente, direccion_cliente, estado_cliente, clave_cliente)
                VALUES(?, ?, ?, ?, ?, ?, ?, ?,?)';
        $params = array($this->nombres, $this->apellidos, $this->correo, $this->dui, $this->telefono, $this->nacimiento, $this->direccion, $this->estado, $hash);
        return Database::executeRow($sql, $params);
    }
    // Se declara la funcion
    public function readAll()
    {
        // Se hace la consullta para llevar a cabo la acción
        $sql = 'SELECT id_cliente, nombre_cliente, apellido_cliente, correo_cliente, dui_cliente, telefono_cliente, fecha_nacimiento_cliente, direccion_cliente, estado_cliente
                FROM clientes
                ORDER BY apellido_cliente';
        $params = null;
        return Database::getRows($sql, $params);
    }
    // Se declara la funcion
    public function readOne()
    {
        // Se hace la consullta para llevar a cabo la acción
        $sql = 'SELECT id_cliente, nombre_cliente, apellido_cliente, correo_cliente, dui_cliente, telefono_cliente, fecha_nacimiento_cliente, direccion_cliente, estado_cliente
                FROM clientes
                WHERE id_cliente = ?';
        $params = array($this->id);
        return Database::getRow($sql, $params);
    }
    // Se declara la funcion
    public function updateRow()
    {
        // Se hace la consullta para llevar a cabo la acción
        $sql = 'UPDATE clientes
                SET nombre_cliente = ?, apellido_cliente = ?, correo_cliente = ?, dui_cliente = ?, telefono_cliente = ?, fecha_nacimiento_cliente = ?, direccion_cliente = ?, estado_cliente = ?
                WHERE id_cliente = ?';
        $params = array($this->nombres, $this->apellidos, $this->correo, $this->dui, $this->telefono, $this->nacimiento, $this->direccion, $this->estado, $this->id);
        return Database::executeRow($sql, $params);
    }
    // Se declara la funcion
    public function deleteRow()
    {
        // Se hace la consullta para llevar a cabo la acción
        $sql = 'DELETE FROM clientes
                WHERE id_cliente = ?';
        $params = array($this->id);
        return Database::executeRow($sql, $params);
    }
    public function cantidadComprasClientes()
    {
        $sql = 'SELECT nombre_cliente, COUNT(id_compra) cantidad
        FROM compra INNER JOIN clientes USING(id_cliente)
        GROUP BY nombre_cliente ORDER BY cantidad DESC LIMIT 10';
        $params = null;
        return Database::getRows($sql, $params);
    }

    public function recuperarContra()
    {
        $sql = 'SELECT correo_cliente where dui_cliente = ?';
        $params = array($this->dui);
        return Database::executeRow($sql, $params);
    }

    public function enviarEmail(){
        //Import PHPMailer classes into the global namespace
        //These must be at the top of your script, not inside a function
        
        //Load Composer's autoloader
        require '../../libraries/phpmailer52/class.phpmailer.php';
        require '../../libraries/phpmailer52/class.smtp.php';
        require '../../libraries/phpmailer52/class.phpmaileroauthgoogle.php';
        
        //Create an instance; passing `true` enables exceptions
        $mail = new PHPMailer(true);
        
        try {
            //Server settings
            $mail->SMTPDebug = 0;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'cuentanetworld@gmail.com';                     //SMTP username
            $mail->Password   = 'networld123';                               //SMTP password
            $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
            $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
        
            //Recipients
            $mail->setFrom('cuentanetworld@gmail.com');
            $mail->addAddress($this->correo);     //Add a recipient
        
            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'prueba';
            $mail->Body    = 'Este es su codigo de recuperación: ';
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
        
            $mail->send();
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }


}


