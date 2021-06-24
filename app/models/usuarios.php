<?php

class Cliente extends Validator
{
  private $id = null;
  private $nombre = null;
  private $apellido = null;
  private $estado = null;
  private $dui = null;
  private $telefono = null;  
  private $clave = null;  
  private $correo = null;  
  private $usuario = null;
  private $nacimiento = null;

  public function setId($value)
  {
     if($this->validateNaturalNumber($value)){
         $this->id = $value;
         return true;
     }else{
         return false;
     }

  }

  public function setNombre($value)
    {
        if ($this->validateAlphabetic($value, 1, 50)) {
            $this->nombre = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setDui($value)
    {
        if ($this->validateDUI($value)) {
            $this->dui = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setApellido($value)
    {
        if ($this->validateAlphabetic($value, 1, 50)) {
            $this->apellido = $value;
            return true;
        } else {
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

    public function setClave($value)
    {
        if ($this->validatePassword($value)) {
            $this->clave = $value;
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

    public function setEstado($value)
    {
        if ($this->validateBoolean($value)) {
            $this->estado = $value;
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

    public function getId(){
        return $this->id;
    }

    public function getNombre(){
        return $this->nombre;
    }
    public function getDui(){
        return $this->dui;
    }
    public function getApellido(){
        return $this->apellido;
    }
    public function getCorreo()
    {
        return $this->correo;
    }
    public function getClave()
    {
        return $this->clave;
    }
    public function getEstado()
    {
        return $this->estado;
    }
    public function getTelefono(){
        return $this->telefono;
    }
    public function getUsuario(){
        return $this->usuario;
    }

    public function checkState($usuario)
    {
        $sql = 'SELECT estado FROM administradores where usuario = ? and estado = true';
        $params = array($usuario);
        if ($data = Database::getRow($sql, $params)) {
            return true;
        } else {
            return false;
        }
    }

    public function checkUser($usuario)
    {
        $sql = 'SELECT codigoadmin,estado,nombre,apellido FROM administradores WHERE usuario = ?';
        $params = array($usuario);
        if ($data = Database::getRow($sql, $params)) {
            $this->id = $data['codigoadmin'];
            $this->nombre = $data['nombre'];
            $this->apellido = $data['apellido'];
            $this->usuario = $usuario;
            return true;
        } else {
            return false;
        }
    }

    public function checkPassword($password)
    {
        $sql = 'SELECT clave FROM administradores WHERE codigoadmin = ?';
        $params = array($this->id);
        $data = Database::getRow($sql, $params);
        if (password_verify($password, $data['clave'])) {
            return true;
        } else {
            return false;
        }
    }

    public function editProfile($value)
    {
        $sql = 'UPDATE administradores set nombre = ?, apellido = ?,dui = ?,correo = ?,telefono = ?,usuario = ?
        WHERE codigoadmin = ? ';
        $params = array($this->nombre, $this->apellido, $this->dui,$this->correo,$this->telefono,$this->usuario,$value);
        return Database::executeRow($sql, $params);
    }

    public function readProfile($value)
    {
        $sql = 'SELECT codigoadmin, estado, nombre, apellido, dui, correo, telefono, direccion, usuario, clave, intentos
        FROM administradores WHERE codigoadmin = ?';
        $params = array($value);
        return Database::getRow($sql, $params);
    }

    public function searchRows($value)
    {
        $sql = 'SELECT codigoadmin,estado,nombre,apellido,dui,correo,telefono,direccion,usuario,intentos
        from administradores
        WHERE dui ILIKE ? 
        order by estado';
        $params = array("%$value%");
        return Database::getRows($sql, $params);
    }

    public function readAll()
    {
        $sql = 'SELECT codigoadmin,estado,nombre,apellido,dui,correo,telefono,direccion,usuario,intentos
        from administradores
        order by estado';
        $params = null;
        return Database::getRows($sql, $params);
    }

}