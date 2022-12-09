<?php 
session_start();
$servidor = 'localhost:33065';
$cuenta = 'root';
$password = '';
$bd = 'proyfinal';
$conexion = new mysqli($servidor, $cuenta, $password, $bd);
$producto=$_POST['producto'];
array_push($_SESSION['compras'], $producto);
echo "<script>alert(".$producto.")</script>";
echo "<p>Llevas comprado: ";
                    echo "<table class='table table-dark table-striped'>
                    <tbody>";
                    $i=0;
                    foreach($_SESSION['compras'] as $index){
                        $sqlC="SELECT ArchivoIMG, NombreP, Precio FROM productos WHERE IdProd='$index';";
                        $resultado=$conexion->query($sqlC);
                        $fila=$resultado->fetch_assoc();
                        echo "<tr>
                            <th scope='row'><img src='images/".$fila['ArchivoIMG']."' width='50px' height='50px'></th>
                            <td><p>".$fila['NombreP']."</p></td>
                            <td><p>".$fila['Precio']."</p></td>
                        </tr>";
                    }
                    echo "</tbody>
                    </table>";
                    //print_r($_SESSION['compras']);
                    echo "</p>";
?>