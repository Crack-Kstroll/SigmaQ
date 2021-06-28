<?php
//Clase para manejar los mantenimientos del catálogo

//Es una clase hija de Validator
class Indice extends Validator {
    //Declaración de atributos 
    private $idindice = null;
    private $responsable = null;
    private $cliente = null;
    private $organizacion = null;
    private $indice = null;
    private $totalcompromiso = null;
    private $cumplidos = null;
    private $nocumplidos = null;
    private $noconsiderados = null;
    private $incumnoentregados = null;
    private $incumporcalidad = null;
    private $incumporfecha = null;
    private $incumporcantidad = null;

    //Funciones para asignar valores a los atributos
    public function setIdIndice($idIndice)
    {
        if($this->validateNaturalNumber($idIndice)) {
            $this->idindice = $idIndice;
            return true;
        } else {
            return false;
        }
    }

    public function setResponsable($idResponsable)
    {
        if($this->validateNaturalNumber($idResponsable)) {
            $this->responsable = $idResponsable;
            return true;
        } else {
            return false;
        }
    }

    public function setCliente($idCliente)
    {
        if($this->validateNaturalNumber($idCliente)) {
            $this->cliente = $idCliente;
            return true;
        } else {
            return false;
        }
    }

    public function setOrganizacion($organizacion) {
        if($this->validateAlphaNumeric($organizacion, 1, 20)) {
            $this->organizacion = $organizacion;
            return true;
        } else {
            return false;
        }
    }

    public function setIndice($indice) {
        if($this->validateMoney($indice)) {
            $this->indice = $indice;
            return true;
        } else {
            return false;
        }
    }

    public function setTotalCompromiso($compromiso)
    {
        if($this->validateNaturalNumber($compromiso)) {
            $this->totalcompromiso = $compromiso;
            return true;
        } else {
            return false;
        }
    }

    public function setCumplidos($cumplidos)
    {
        if($this->validateNaturalNumber($cumplidos)) {
            $this->cumplidos = $cumplidos;
            return true;
        } else {
            return false;
        }
    }

    public function setNoCumplidos($noCumplidos)
    {
        if($this->validateNaturalNumber($noCumplidos)) {
            $this->nocumplidos = $noCumplidos;
            return true;
        } else {
            return false;
        }
    }
    
    public function setNoConsiderados($noConsiderados)
    {
        if($this->validateNaturalNumber($noConsiderados)) {
            $this->noconsiderados = $noConsiderados;
            return true;
        } else {
            return false;
        }
    }

    public function setIncumNoEntregados($incumNoEntregados) {
        if($this->validateAlphaNumeric($incumNoEntregados, 1, 5)) {
            $this->incumnoentregados = $incumNoEntregados;
            return true;
        } else {
            return false;
        }
    }

    public function setIncumPorCalidad($incumPorCalidad) {
        if($this->validateAlphaNumeric($incumPorCalidad, 1, 5)) {
            $this->incumporcalidad = $incumPorCalidad;
            return true;
        } else {
            return false;
        }
    }

    public function setIncumPorFecha($incumPorFecha) {
        if($this->validateAlphaNumeric($incumPorFecha, 1, 5)) {
            $this->incumporfecha = $incumPorFecha;
            return true;
        } else {
            return false;
        }
    }

    public function setIncumPorCantidad($incumPorCantidad) {
        if($this->validateAlphaNumeric($incumPorCantidad, 1, 5)) {
            $this->incumporcantidad = $incumPorCantidad;
            return true;
        } else {
            return false;
        }
    }
    
    //Functiones para obtener los valores de los atributos
    public function getIdIndice() {
        return $this->idindice;
    }

    public function getIdIndice() {
        return $this->responsable;
    }

    public function getIdIndice() {
        return $this->cliente;
    }

    //Funciones para realizar los mantenimientos a la tabla

    //Función para insertar un registro para el índice
    public function insertIndice() {
        $query="INSERT INTO indiceentregas(responsable, cliente, organizacion, indice, totalcompromiso, cumplidos, nocumplidos, noconsiderados, incumnoentregados, incumporcalidad, incumporfecha, incumporcantidad) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)";
        $params = array($this->responsable, $this->cliente, $this->organizacion, $this->indice, $this->totalcompromiso, $this->cumplidos, $this->nocumplidos, $this->noconsiderados, $this->incumnoentregados, $this->incumporcalidad, $this->incumporfecha, $this->incumporcantidad);
        return Database::executeRow($query, $params);
    }

    //Función para mostrar los índices
    public function selectIndice() {
        $query="SELECT *, CONCAT(a.nombre, ' ', a.apellido) as Responsable, cl.usuario
                FROM indiceentregas ie
                INNER JOIN administradores a
                    ON ie.responsable = a.codigoadmin
                INNER JOIN clientes cl
                    ON ie.cliente = cl.codigocliente";
        $params = null;
        return Database::getRow($query, $params);
    }

    //Función para actualizar un registros
    public function updateIndice() {
        $query="UPDATE indiceentregas
                SET responsable = ?, organizacion = ?, indice = ?, totalcompromiso = ?, cumplidos = ?, nocumplidos = ?, noconsiderados = ?, incumnoentregados = ?, incumporcalidad = ?, incumporfecha = ?, incumporcantidad = ? 
                WHERE idindice = ?";
        $params=array($this->responsable, $this->organizacion, $this->indice, $this->totalcompromiso, $this->cumplidos, $this->nocumplidos, $this->noconsiderados, $this->incumnoentregados, $this->incumporcalidad, $this->incumporfecha, $this->incumporcantidad, $this->idindice);
        return Database::executeRow($query, $params);
    }

    //Función para eliminar un registro
    public function deleteIndice() {
        $query="DELETE FROM indiceentregas WHERE idindice = ?";
        $params=array($this->idindice);
        return Database::executeRow($query, $params);
    }

    //Función para mostrar los empleados
    public function getAdministradores() {
        $query="SELECT codigoadmin, usuario
                FROM administradores
                WHERE estado = true";
        $params=null;
        return Database::executeRow($query, $params);
    }

    //Función para mostrar los clientes
    public function getClientes() {
        $query="SELECT usuario
                FROM clientes
                WHERE estado = true";
        $params=null;
        return Database::executeRow($query, $params);
    }

}

?>