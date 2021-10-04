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

    // Función para buscar un registro
    public function searchHistorial($value)
    {
        $sql = "SELECT idregistro, c.usuario,hora ,accion,empresa
        from historialcliente h
        INNER JOIN clientes c ON c.codigoCliente = h.usuario
		WHERE c.usuario LIKE ? OR CAST(hora AS CHAR) LIKE ? OR empresa LIKE ? OR accion LIKE ?    
        order by hora";
        $params = array("%$value%","%$value%","%$value%","%$value%");
        return Database::getRows($sql, $params);
    }
}