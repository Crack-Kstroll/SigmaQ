<?php

class EstadoCuenta extends Validator
{
    // Declaración de atributos
    private $id = null;
    private $responsable = null;	
    private $sociedad = null;		
    private $cliente = null;	
    private $codigo = null;	
    private $factura = null;
    private $asignacion = null;
    private $fechaContable = null;
    private $clase = null;
    private $vencimiento = null;
    private $diasVencidos = null;
    private $divisa = null;		
    private $total = null;

    // Metodos para asignar valores a los atributos
    public function setId($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->id = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setResponsable($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->responsable = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setSociedad($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->sociedad = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setCliente($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->cliente = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setCodigo($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->codigo = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setFactura($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->factura = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setAsignacion($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->asignacion = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setFechaContable($value)
    {
        if ($this->validateDate($value)) {
            $this->fechaContable = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setVencimiento($value)
    {
        if ($this->validateAlphanumeric($value, 1, 50)) {
            $this->vencimiento = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setDiasVencidos($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->diasVencidos = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setDivisa($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->divisa = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setTotal($value)
    {
        if ($this->validateMoney($value)) {
            $this->total = $value;
            return true;
        } else {
            return false;
        }
    }

    // Funciones para obtener los valores de los atributos

    public function getId()
    {
        return $this->id;
    }

    public function getResponsable()
    {
        return $this->responsable;
    }

    public function getSociedad()
    {
        return $this->sociedad;
    }

    public function getCliente()
    {
        return $this->cliente;
    }

    public function getCodigo()
    {
        return $this->codigo;
    }

    public function getFactura()
    {
        return $this->factura;
    }

    public function getAsignacion()
    {
        return $this->asignacion;
    }

    public function getFechaContable()
    {
        return $this->fechaContable;
    }

    public function getClase()
    {
        return $this->clase;
    }

    public function getVencimiento()
    {
        return $this->vencimiento;
    }

    public function getDiasVencidos()
    {
        return $this->diasVencidos;
    }

    public function getDivisa()
    {
        return $this->divisa;
    }

    public function getTotal()
    {
        return $this->total;
    }

    // Métodos para realizar las operaciones SCRUD

    public function SelectCategoria()
    {
        $sql = 'SELECT idestadocuenta, responsable, sociedad, cliente, codigo, factura, asignacion, fechacontable, clase, vencimiento, diasvencidos, divisa, totalgeneral
                FROM public.estadocuentas';
        $params = null;
        print($params);
        return Database::getRows($sql, $params);
    }

    public function SelectOneCategoria()
    {
        $sql = 'SELECT idestadocuenta, responsable, sociedad, cliente, codigo, factura, asignacion, fechacontable, clase, vencimiento, diasvencidos, divisa, totalgeneral
                FROM public.estadocuentas
                WHERE idestadocuenta = ?';
        $params = array($this->id);
        print($params);
        return Database::getRows($sql, $params);
    }
}