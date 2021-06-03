<?php
Class Tipo extends Validator{
    public function readAll()
    {
        $sql = 'SELECT id_tipo_usuario, tipo_usuario FROM tipo_usuario ORDER BY tipo_usuario';
        $params = null;
        return Database::getRows($sql, $params);
    }
}

