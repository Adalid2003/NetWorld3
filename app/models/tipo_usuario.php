<?php
Class Tipo extends Validator{
    public function readAll()
    {
        $sql = 'SELECT * FROM tipo_usuario';
        $params = null;
        return Database::getRows($sql, $params);
    }
}

