<?php
session_start();
$index=$_POST['index'];
/*unset($_SESSION['compras'][$index]);
unset($_SESSION['cantidadPP'][$index]);*/
\array_splice($_SESSION['compras'], 1, 1);
\array_splice($_SESSION['cantidadPP'], 1, 1);
?>