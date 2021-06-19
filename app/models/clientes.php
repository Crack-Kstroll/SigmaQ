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


  public function checkState($usuario)
    {
        $sql = 'SELECT estado FROM administradores where usuario = ? and estado = 1';
        $params = array($usuario);
        if ($data = Database::getRow($sql, $params)) {
            return true;
        } else {
            return false;
        }
    }

  public function checkUser($usuario)
    {
        $sql = 'SELECT idadmin,estado,nombre,apellido FROM administradores WHERE usuario = ?';
        $params = array($usuario);
        if ($data = Database::getRow($sql, $params)) {
            $this->id = $data['idadmin'];
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
        $sql = 'SELECT clave FROM administradores WHERE idadmin = ?';
        $params = array($this->id);
        $data = Database::getRow($sql, $params);
        if (password_verify($password, $data['clave'])) {
            return true;
        } else {
            return false;
        }
    }

  public function setId($value)
  {
     if($this->validateNaturalNumber($value)){
         $this->id = $value;
         return true;
     }else{
         return false;
     }

  }

  public function setNacimiento($value)
    {
        if ($this->validateDate($value)) {
            $this->nacimiento = $value;
            return true;
        } else {
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
    public function getNacimiento(){
        return $this->nacimiento;
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

    public function register()
    {
        // Se encripta la clave por medio del algoritmo bcrypt que genera un string de 60 caracteres.
        $hash = password_hash($this->clave, PASSWORD_DEFAULT);
        $sql = 'INSERT INTO public."Clientes"("idCliente", "nombreCliente", "apellidoCliente", "telefonoCliente", "contraseñaCliente", 
            "correoCliente", nickname, "estadoCliente", "duiCliente", fecha_nacimiento)
            VALUES (default, ?, ?, ?, ?, ?, ?, true, ?, null)';
        $params = array($this->nombre, $this->apellido, $this->telefono, $hash ,$this->correo,$this->nickname,$this->dui);
        return Database::executeRow($sql, $params);
    }

    public function editProfile($value)
    {
        $sql = 'UPDATE public."Clientes"
        SET "nombreCliente" = ?, "apellidoCliente" = ?, "telefonoCliente" = ?,  "correoCliente" = ?, nickname = ?, "duiCliente" = ?
        WHERE "idCliente" = ?';
        $params = array($this->nombre, $this->apellido, $this->telefono,$this->correo,$this->nickname,$this->dui,$value);
        return Database::executeRow($sql, $params);
    }

    public function readAll()
    {
        $sql = 'SELECT "idCliente","nombreCliente","apellidoCliente","estadoCliente","telefonoCliente","correoCliente",nickname
                FROM "Clientes"';
        $params = null;
        return Database::getRows($sql, $params);
    }

    public function editStatus()
    {
        $sql = 'UPDATE "Clientes" SET "estadoCliente" = ? WHERE "idCliente" = ?';
        $params = array($this->estado,$this->id);
        return Database::executeRow($sql, $params);
    }

    public function readOne()
    {
        $sql = 'SELECT "idCliente","nombreCliente","apellidoCliente","estadoCliente","telefonoCliente","correoCliente",nickname
                FROM "Clientes"
                WHERE "idCliente" = ?';
        $params = array($this->id);
        return Database::getRow($sql, $params);
    }

    public function readProfile($value)
    {
        $sql = 'SELECT "idCliente","nombreCliente","apellidoCliente","estadoCliente","telefonoCliente","correoCliente",nickname,"duiCliente","fecha_nacimiento","contraseñaCliente"
        FROM "Clientes"
        WHERE "idCliente" = ?';
        $params = array($value);
        return Database::getRow($sql, $params);
    }

    public function searchRows($value)
    {
        $sql = 'SELECT "idCliente","nombreCliente","apellidoCliente","estadoCliente","telefonoCliente","correoCliente",nickname
                FROM "Clientes"
                WHERE "nombreCliente" ILIKE ? OR "apellidoCliente" ILIKE ? OR "nickname" ILIKE ? OR "correoCliente" ILIKE ?
                ORDER BY "nombreCliente"';
        $params = array("%$value%", "%$value%","%$value%","%$value%");
        return Database::getRows($sql, $params);
    }

    public function deleteRow()
    {
        $sql= 'DELETE FROM "Clientes" WHERE "idCliente"=?';
        $params=array($this->id);
        return Database::executeRow($sql, $params);
    }
}