<?php
class ClassEquips
{
    private $idNumOs;
    private $modelo;
    private $marca;
    private $serialNumber;
    private $obs;
    private $defeito;
    private $osStatus;
    private $valor;

    // GETTERS
    function getIdNumOs()
    {
        return $this->idNumOs;
    }

    function getModelo()
    {
        return $this->modelo;
    }

    function getMarca()
    {
        return $this->marca;
    }
    
    function getSerialNumber()
    {
        return $this->serialNumber;
    }

    function getObs()
    {
        return $this->obs;
    }

    function getDefeito()
    {
        return $this->defeito;
    }

    function getOsStatus()
    {
        return $this->osStatus;
    }

    function getValor()
    {
        return $this->valor;
    }

    //SETTERS
    function setIdNumOs($idNumOs)
    {
        $this->idNumOs = $idNumOs;
    }

    function setModelo($modelo)
    {
        $this->modelo = $modelo;
    }

    function setMarca($marca)
    {
        $this->marca = $marca;
    }

    function setSerialNumber($serialNumber)
    {
        $this->serialNumber = $serialNumber;
    }

    function setObs($obs)
    {
        $this->obs = $obs;
    }

    function setDefeito($defeito)
    {
        $this->defeito = $defeito;
    }

    function setOsStatus($osStatus)
    {
        $this->osStatus = $osStatus;
    }
    
    function setValor($valor)
    {
        $this->valor = $valor;
    }

}
