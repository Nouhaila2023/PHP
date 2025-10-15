

<?php

/* 5. Tenemos una variable $numero que tiene un número de 0 a 99. Mostrarlo escrito.
Por ejemplo, para 56 mostrar: cincuenta y seis. */

$numero = rand(1, 99);

function primero($numero){
    switch($numero){
        case 1:
            return "uno";
            break;
        case 2:
            return "dos";
            break;
        case 3:
            return "tres";
            break;
        case 4:
            return "cuatro";
            break;
        case 5:
            return "cinco";
            break;
        case 6:
            return "seis";
            break;
        case 7:
            return "siete";
            break;
        case 8:
            return "ocho";              
            break;
        case 9:
            return "nueve";
            break;
        case 10:
            return "diez";
            break;
        default:
            return "El número $numero tiene más de tres cifras.";
    }
}

function segundo($numero){
    switch($numero){
        case 2:
            return "veinte";
            break;
        case 3:
            return "treinta";
            break;
        case 4:
            return "cuarenta";
            break;
        case 5:
            return "cincuenta";
            break;
        case 6:
            return "sesenta";
            break;
        case 7:
            return "setenta";
            break;
        case 8:
            return "ochenta";              
            break;
        case 9:
            return "noventa";
            break;
        default:
            return "El número $numero tiene más de tres cifras.";
    }
}

function tercero($numero){
    if($numero > 10 && $numero < 20){
        switch($numero){
            case 11:
                return "once";
                break;
            case 12:
                return "doce";
                break;
            case 13:
                return "trece";
                break;
            case 14:
                return "catorce";
                break;
            case 15:
                return "quince";
                break;
            case 16:
                return "dieciséis";
                break;
            case 17:
                return "diecisiete";
                break;
            case 18:
                return "dieciocho";              
                break;
            case 19:
                return "diecinueve";
                break;
            default:
                return "El número $numero tiene más de tres cifras.";
        }
   
    }
}

$dejito1 = floor($numero / 10);
$dejito2 = $numero % 10;

echo "El número $numero en letras es: ";

if($dejito1 == 0 && $dejito2 != 0){
    echo primero($dejito2);

}elseif($dejito1 == 1 && $dejito2 == 0){
    echo primero(10);

}elseif($dejito1 == 1 && $dejito2 != 0){
    echo tercero($numero);

}elseif($dejito1 > 1){
    if ($dejito2 != 0) {
        echo segundo($dejito1) . " y " . primero($dejito2);
    } else {
        echo segundo($dejito1);
    }
}else{
    echo "cero";
}
?>