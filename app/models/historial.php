<?php
//Es una clase hija de Validator
class Historial extends Validator
{
    // Funcion para obtener los datos de la tabla historial
    public function readAll()
    {
        // Declaramos sentencia SQL 
        $sql = 'SELECT idregistro, c.usuario,hora ,accion,empresa
        from historialcliente h
        INNER JOIN clientes c ON c.codigoCliente = h.usuario 
        order by hora';
        // No requiere parametros
        $params = null;
        return Database::getRows($sql, $params);
    }
}