<?php
/*
*	Clase para manejar la tabla usuarios de la base de datos. Es clase hija de Validator.
*/
class Usuarios extends Validator
{
    // Declaración de atributos (propiedades).
    private $id = null;
    private $nombres = null;
    private $apellidos = null;
    private $correo = null;
    private $usuario = null;
    private $clave = null;
    private $direccion = null;
    private $imagenU = null;
    private $id_tipoU = null;
    private $dui = null;
    private $tipo_usuario = null;
    private $ruta = '../../../resources/img/users/';

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
    public function setUsuario($value)
    {
        if ($this->validateAlphanumeric($value, 1, 50)) {
            $this->usuario = $value;
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
    public function setImagen($value)
    {
        if ($this->validateImageFile($value, 500, 500)) {
            $this->imagenU = $this->getImageName();
            return true;
        } else {
            return false;
        }
    }
//Métodos para validar y asignar valores del tributo.
    public function setIdU($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->id_tipoU = $value;
            return true;
        } else {
            return false;
        }
    }
    //Métodos para validar y asignar valores del tributo.
    public function setDireccion($value)
    {
        if ($this->validateAlphanumeric($value, 1, 50)) {
            $this->direccion = $value;
            return true;
        } else {
            return false;
        }
    }
    //Métodos para validar y asignar valores del tributo.
    public function setDui($value)
    {
        if ($this->validateDUI($value)) {
            $this->dui = $value;
            return true;
        } else {
            return false;
        }
    }

    //Métodos para validar y asignar valores del tributo.
    

    /*
    *   Métodos para obtener valores de los atributos.
    */
    public function getId()
    {
        return $this->id;
    }
    //Métodos para validar y asignar valores del tributo.
    public function getTipoU()
    {
        return $this->id_tipoU;
    }

    public function getTipousuario()
    {
        return $this->tipo_usuario;
    }
    //Métodos para validar y asignar valores del tributo.
    public function getImagenU()
    {
        return $this->imagenU;
    }
//Métodos para validar y asignar valores del tributo.
    public function getDireccion()
    {
        return $this->direccion;
    }
//Métodos para validar y asignar valores del tributo.
    public function getNombres()
    {
        return $this->nombres;
    }
//Métodos para validar y asignar valores del tributo.
    public function getApellidos()
    {
        return $this->apellidos;
    }
//Métodos para validar y asignar valores del tributo.
    public function getCorreo()
    {
        return $this->correo;
    }
//Métodos para validar y asignar valores del tributo.
    public function getUsuario()
    {
        return $this->usuario;
    }
//Métodos para validar y asignar valores del tributo.
    public function getClave()
    {
        return $this->clave;
    }
//Métodos para validar y asignar valores del tributo.
    public function getDui()
    {
        return $this->dui;
    }
//Métodos para validar y asignar valores del tributo.
    public function getRuta()
    {
        return $this->ruta;
    }

    /*
    *   Métodos para gestionar la cuenta del usuario.
    */
    public function checkUser($usuario)
    {
        // Se hace la consullta para llevar a cabo la acción
        $sql = 'SELECT id_usuario FROM usuarios WHERE apodo_usuario = ?';
        $params = array($usuario);
        if ($data = Database::getRow($sql, $params)) {
            $this->id = $data['id_usuario'];
            $this->usuario = $usuario;
            return true;
        } else {
            return false;
        }
    }

    public function checkPassword($clave)
    {
        // Se hace la consullta para llevar a cabo la acción
        $sql = 'SELECT clave FROM usuarios WHERE id_usuario= ?';
        $params = array($this->id);
        $data = Database::getRow($sql, $params);
        if (password_verify($clave, $data['clave'])) {
            return true;
        } else {
            return false;
        }
    }

    
    public function changePassword()
    {
        $hash = password_hash($this->clave, PASSWORD_DEFAULT);
        // Se hace la consullta para llevar a cabo la acción
        $sql = 'UPDATE usuarios SET clave = ? WHERE id_usuario = ?';
        $params = array($hash, $_SESSION['id_usuario']);
        return Database::executeRow($sql, $params);
    }

    public function readProfile()
    {
        // Se hace la consullta para llevar a cabo la acción
        $sql = 'SELECT  id_usuario, nombre_usuario, clave, dui_usuario, direccion, tipo_usuario, imagen_usuario, correo, apodo_usuario, apellidos_usuario
        FROM usuarios INNER JOIN tipo_usuario USING(id_tipo_usuario)
                WHERE id_usuario = ?';
        $params = array($_SESSION['id_usuario']);
        return Database::getRow($sql, $params);
    }

    public function editProfile()
    {
        // Se hace la consullta para llevar a cabo la acción
        $sql = 'UPDATE usuarios
                SET nombre_usuario = ?, apellidos_usuario = ?, correo = ?, apodo_usuario = ?
                WHERE id_usuario = ?';
        $params = array($this->nombres, $this->apellidos, $this->correo, $this->usuario, $_SESSION['id_usuario']);
        return Database::executeRow($sql, $params);
    }

    /*
    *   Métodos para realizar las operaciones SCRUD (search, create, read, update, delete).
    */
    public function searchRows($value)
    {
        // Se hace la consullta para llevar a cabo la acción
        $sql = 'SELECT  id_usuario, nombre_usuario, clave, dui_usuario, direccion, tipo_usuario, imagen_usuario, correo, apodo_usuario, apellidos_usuario
                FROM usuarios INNER JOIN tipo_usuario USING(id_tipo_usuario)
                WHERE apellidos_usuario ILIKE ? OR nombre_usuario ILIKE ?
                ORDER BY apellidos_usuario';
        $params = array("%$value%", "%$value%");
        return Database::getRows($sql, $params);
    }

    public function createRow()
    {
        // Se encripta la clave por medio del algoritmo bcrypt que genera un string de 60 caracteres.
        $hash = password_hash($this->clave, PASSWORD_DEFAULT);
        // Se hace la consullta para llevar a cabo la acción
        $sql = 'INSERT INTO usuarios(nombre_usuario, clave, dui_usuario, direccion, id_tipo_usuario, imagen_usuario, correo, apodo_usuario, apellidos_usuario)
                VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?)';
        $params = array($this->nombres, $hash, $this->dui, $this->direccion, $this->id_tipoU, $this->imagenU, $this->correo, $this->usuario, $this->apellidos);
        return Database::executeRow($sql, $params);
    }

    public function readAll()
    {
        // Se hace la consullta para llevar a cabo la acción
        $sql = 'SELECT id_usuario, nombre_usuario, clave, dui_usuario, direccion, tipo_usuario, imagen_usuario, correo, apodo_usuario, apellidos_usuario
                FROM usuarios INNER JOIN tipo_usuario USING(id_tipo_usuario)
                ORDER BY apellidos_usuario';
        $params = null;
        return Database::getRows($sql, $params);
    }

    public function readAll2()
    {
        // Se hace la consullta para llevar a cabo la acción
        $sql = 'SELECT id_tipo_usuario, tipo_usuario from tipo_usuario';
        $params = null;
        return Database::getRows($sql, $params);
    }

    public function readAll3()
    {
        // Se hace la consullta para llevar a cabo la acción
        $sql = 'SELECT id_tipo_usuario, tipo_usuario
        FROM tipo_usuario order by tipo_usuario ';
        $params = null;
        return Database::getRows($sql, $params);
    }


    



    public function readOne()
    {
        // Se hace la consullta para llevar a cabo la acción
        $sql = 'SELECT id_usuario, nombre_usuario, clave, dui_usuario, direccion, id_tipo_usuario, imagen_usuario, correo, apodo_usuario, apellidos_usuario
                FROM usuarios
                WHERE id_usuario = ?';
        $params = array($this->id);
        return Database::getRow($sql, $params);
    }

    public function updateRow($current_image)
    {
        ($this->imagenU) ? $this->deleteFile($this->getRuta(), $current_image) : $this->imagenU = $current_image;
        // Se hace la consullta para llevar a cabo la acción
        $sql = 'UPDATE usuarios 
                SET nombre_usuario = ?, apellidos_usuario = ?, correo = ?, id_tipo_usuario = ?, dui_usuario= ?, imagen_usuario = ?, direccion = ?
                WHERE id_usuario = ?';
        $params = array($this->nombres, $this->apellidos, $this->correo, $this->id_tipoU, $this->dui, $this->imagenU, $this->direccion, $this->id);
        return Database::executeRow($sql, $params);
    }

    public function deleteRow()
    {
        // Se hace la consullta para llevar a cabo la acción
        $sql = 'DELETE FROM usuarios
                WHERE id_usuario = ?';
        $params = array($this->id);
        return Database::executeRow($sql, $params);
    }

    public function readUsuariotipo()
    {
        $sql = 'SELECT apodo_usuario, tipo_usuario, t.id_tipo_usuario,correo,nombre_usuario,apellidos_usuario,dui_usuario
        FROM usuarios u, tipo_usuario t where t.id_tipo_usuario=u.id_tipo_usuario and t.id_tipo_usuario=?';
        $params = array($this->id);
        return Database::getRows($sql, $params);
    }

    public function createHistorial()
    {
        // Se hace la consullta para llevar a cabo la acción
        $sql = 'INSERT INTO historial_sesion(ordenador, hora, id_usuario)
                VALUES(?,  current_timestamp, ?)';
        $params = array($_SERVER['SERVER_SOFTWARE'], $_SESSION['id_usuario']);
        return Database::executeRow($sql, $params);
    }

    public function readHistorial()
    {
        // Se hace la consullta para llevar a cabo la acción
        $sql = 'SELECT id_sesion, ordenador, hora, apodo_usuario
                FROM historial_sesion INNER JOIN usuarios USING(id_usuario)
                WHERE id_usuario = ?
                ORDER BY apodo_usuario';
        $params = array($_SESSION['id_usuario']);
        return Database::getRows($sql, $params);
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
