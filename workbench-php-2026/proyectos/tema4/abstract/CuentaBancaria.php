<?php

include_once "Contable.php";


abstract class CuentaBancaria implements Contable{

    protected $numCuenta;
    protected $saldo;

    public function __construct($num, $saldo){
        $this->numCuenta = $num;
        $this->saldo = $saldo;
    }


  /**
     * Get the value of numCuenta
     */
    public function getNumCuenta()
    {
        return $this->numCuenta;
    }

    /**
     * Set the value of numCuenta
     *
     * @return  self
     */
    public function setNumCuenta($numCuenta)
    {
        $this->numCuenta = $numCuenta;

        return $this;
    }

    /**
     * Get the value of saldo
     */
    public function getSaldo()
    {
        return $this->saldo;
    }

    /**
     * Set the value of saldo
     *
     * @return  self
     */
    public function setSaldo($saldo)
    {
        $this->saldo = $saldo;

        return $this;
    }

     public abstract function tipoInteres();


    public function __toString()
    {
        return "Cuenta: " . $this->numCuenta . " - Saldo: " . $this->saldo;
    }


    public function depositar($cant)
    {
        $this->saldo += $cant;
    }

    public function retirar($cant)
    {
        if ($this->saldo - $cant >= 0) {
            $this->saldo -= $cant;
        } else {
            throw new Exception("No saldo suficiente");
        }
    }











}


