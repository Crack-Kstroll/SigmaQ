<?php
//Clase para manejar los mantenimientos del catálogo

//Es una clase hija de Validator
class Divisas extends Validator{

    //Declaración de atributos 
    private $iddivisa = null;
    private $divisa = null;

    //Funciones para asignar valores a los atributos
    public function setIdDivisa($idDivisa)
    {
        if($this->validateNaturalNumber($idDivisa)) {
            $this->iddivisa = $idDivisa;
            return true;
        } else {
            return false;
        }
    }

    public function setDivisa($Divisa)
    {
        if ($this->validateAlphabetic($Divisa, 1, 25)) {
            $this->divisa = $Divisa;
            return true;
        } else {
            return false;
        }
    }

    // Funciones para obtener los valores de los atributos

    public function getIdDivisa()
    {
        return $this->iddivisa;
    }

    public function getDivisa()
    {
        return $this->divisa;
    }

    // Métodos para realizar las operaciones SCRUD
    public function selectDivisa()
    {
        $sql = "SELECT iddivisa, divisa 
                FROM divisas";
        $params = null;
        print($params);
        return Database::getRows($sql, $params);
    }

    public function SelectOneDivisa()
    {
        $sql = 'SELECT iddivisa, divisa 
                FROM divisas
                WHERE iddivisa = ?';
        $params = array($this->iddivisa);
        print($params);
        return Database::getRows($sql, $params);
    }

    public function insertDivisa() {
        $query="INSERT INTO divisas(divisa)
                VALUES (?)";
        $params = array($this->divisa);
        return Database::executeRow($query, $params);
    }

    public function updateDivisa() {
        $query="UPDATE divisas
                SET divisa = ?
                WHERE iddivisa = ?";
        $params = array($this->divisa, $this->iddivisa);
        return Database::executeRow($query, $params);
    }

    public function deleteDivisa() {
        $query = "DELETE FROM divisas WHERE iddivisa = ?";
        $params = array($this->iddivisa);
        return Database::executeRow($query, $params);
    }
}