<?php

include_once "Contable.php";

class TarjetaCredito implements Contable
{

    private $saldo;
    private $numTarjeta;
    private $tipoInteresAPagar = 0.2;
    private $deuda = 0;

    public function __construct($saldo, $numT)
    {
        $this->saldo = $saldo;
        $this->numTarjeta = $numT;
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



    /**
     * Get the value of numTarjeta
     */
    public function getNumTarjeta()
    {
        return $this->numTarjeta;
    }

    /**
     * Set the value of numTarjeta
     *
     * @return  self
     */
    public function setNumTarjeta($numTarjeta)
    {
        $this->numTarjeta = $numTarjeta;

        return $this;
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
            $this->saldo -= $cant;
            $this->deuda += (-1 * $this->saldo) * $this->tipoInteresAPagar;
        }
    }
}