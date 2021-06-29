<?php

class Cliente extends Validator
{
    private $id = null;
    private $estado = null;
    private $empresa = null;
    private $telefono = null;
    private $correo = null;  
    private $usuario = null;  
    private $clave = null;  
    private $codigo = null;  

    public function setId($value)
    {
        if($this->validateNaturalNumber($value)){
            $this->id = $value;
            return true;
        }else{
            return false;
        }
    }

    public function setCodigo($value)
    {
        if($this->validateNaturalNumber($value)){
            $this->codigo = $value;
            return true;
        }else{
            return false;
        }
    }

    public function setEstado($value)
    {
        if ($this->validateBoolean($value)) {
            $this->estado = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setEmpresa($value)
    {
        if ($this->validateString($value, 1, 40)) {
            $this->empresa = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setTelefono($value)
    {
        if ($this->validatePhone($value)) {
            $this->telefono = $value;
            return true;
        }else {
            return false;
        }
    }

    public function setCorreo($value)
    {
        if ($this->validateEmail($value)) {
            $this->correo = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setUsuario($value)
    {
        if ($this->validateAlphanumeric($value, 1, 50)) {
            $this->usuario = $value;
            return true;
        }else {
            return false;
        }
    }

    public function setClave($value)
    {
        if ($this->validatePassword($value)) {
            $this->clave = $value;
            return true;
        } else {
            return false;
        }
    }

    public function getId()
    {
        return $this->id;
    }

    public function getEstado()
    {
        return $this->estado;
    }

    public function getEmpresa()
    {
        return $this->empresa;
    }

    public function getTelefono()
    {
        return $this->telefono;
    }
    
    public function getCorreo()
    {
        return $this->correo;
    }

    public function getUsuario()
    {
        return $this->usuario;
    }

    public function getClave()
    {
        return $this->clave;
    }

    public function getCodigo()
    {
        return $this->codigo;
    }

    public function searchRows($value)
    {
        $sql = 'SELECT codigocliente,estado,empresa,telefono,correo,usuario,clave,intentos 
        from clientes
        WHERE codigocliente = ? 
        order by codigocliente';
        $params = array($value);
        return Database::getRows($sql, $params);
    }

    public function readAll()
    {
        $sql = 'SELECT codigocliente,usuario,estado,empresa,telefono,correo,clave,intentos 
        from clientes 
        order by codigocliente';
        $params = null;
        return Database::getRows($sql, $params);
    }

    public function activateUser()
    {
        $sql = 'UPDATE clientes
        SET estado = true
        WHERE codigocliente = ?;';
        $params = array($this->id);
        return Database::executeRow($sql, $params);
    }

    public function createRow()
    {
        $hash = password_hash($this->clave, PASSWORD_DEFAULT);
        $sql = 'INSERT INTO clientes(codigocliente, estado, empresa, telefono, correo, usuario, clave, intentos)
            VALUES (?, default, ?, ?, ?, ?, ?, default)';
        $params = array($this->id,$this->empresa, $this->telefono,$this->correo,$this->usuario, $hash);
        return Database::executeRow($sql, $params);
    }

    public function updateRow()
    {
        $hash = password_hash($this->clave, PASSWORD_DEFAULT);
        $sql = 'UPDATE clientes
        SET codigocliente = ?, empresa= ?, telefono = ?, correo = ?, usuario = ?, clave = ?
        WHERE codigocliente = ?';
        $params = array($this->id ,$this->empresa, $this->telefono, $this->correo,$this->usuario,$hash,$this->codigo);
        return Database::executeRow($sql, $params);
    }

    public function readRow()
    {
        $sql = 'SELECT codigocliente,estado,empresa,telefono,correo,usuario,clave,intentos 
        from clientes 
        where codigocliente = ?';
        $params = array($this->id);
        return Database::getRow($sql, $params);
    }

    public function desactivateUser()
    {
        $sql = 'UPDATE clientes
        SET estado = false
        WHERE codigocliente = ?;';
        $params = array($this->id);
        return Database::executeRow($sql, $params);
    }

}