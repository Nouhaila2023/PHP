<?php

include_once "CuentaBancaria.php";

class CuentaCorriente extends CuentaBancaria{

    public function tipoInteres(){
        return 1.005;
    }

    public function __toString(){
        return "Cuenta Corriente: " . $this->numCuenta . " - Saldo: " . $this->saldo . " - Tipo de interes: " . $this->tipoInteres();
    }




}




