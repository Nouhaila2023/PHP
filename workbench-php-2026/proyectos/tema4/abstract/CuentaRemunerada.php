<?php

include_once "CuentaBancaria.php";

class CuentaRemunerada extends CuentaBancaria implements Contable{


    private static $base = 1.01;
    private $tipoCliente; //1,2,3..

    public function __construct($num, $saldo, $tipo){
        parent::__construct($num, $saldo);
        $this->tipoCliente = $tipo;
    }

    /**
     * Get the value of tipoCliente
     */
    public function getTipoCliente()
    {
        return $this->tipoCliente;
    }

    /**
     * Set the value of tipoCliente
     *
     * @return  self
     */
    public function setTipoCliente($tipoCliente)
    {
        $this->tipoCliente = $tipoCliente;

        return $this;
    }


      public function tipoInteres()
    {
        switch ($this->tipoCliente) {
            case 1:
                return CuentaRemunerada::$base + 0.01;
                break;
            case 2:
                return CuentaRemunerada::$base + 0.02;
                break;
            case 3:
                return CuentaRemunerada::$base + 0.05;
                break;
            default:
                # code...
                break;
        }
    }

    public function __toString()
    {
        return "Cuenta Remunerada: " . $this->numCuenta . " - Saldo: " . $this->saldo
            . " - Tipo de interés: " . $this->tipoInteres();
    }




}