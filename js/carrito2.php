<?php
echo "<p>Llevas comprado: ";
//array_push($_SESSION['compras'], $_POST['articulo']);
echo "<table class='table table-dark table-striped'>
<tbody>";
$i=0;
foreach($_SESSION['compras'] as $index){
    $i+=1;
    $sqlC="SELECT ArchivoIMG, NombreP, Precio FROM productos WHERE IdProd='$index';";
    $resultado=$conexion->query($sqlC);
    $fila=$resultado->fetch_assoc();
    echo "<tr>
        <th scope='row'>".$i."</th>
        <td><img src='images/".$fila['ArchivoIMG']."' width='50px' height='50px'></td>
        <td><p>".$fila['NombreP']."</p></td>
        <td><p>".$fila['Precio']."</p></td>
    </tr>";
}
echo "</tbody>
</table>";
//print_r($_SESSION['compras']);
echo "</p>";
?>