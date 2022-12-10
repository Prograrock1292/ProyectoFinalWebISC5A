<?php
session_start();
if(!isset($_SESSION['nombre'])){
    echo "0";
}
else{
    $catTotal=0;
    if(!empty($_SESSION['cantidadPP'])){
        foreach($_SESSION['cantidadPP'] as $cuantos){
            $catTotal+=$cuantos;
        }
    echo $catTotal;
    }
    else{
        echo "0";
    }
}
?>