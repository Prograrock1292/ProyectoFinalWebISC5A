<?php 
session_start();
$servidor = 'localhost:33065';
$cuenta = 'root';
$password = '';
$bd = 'proyfinal';
$conexion = new mysqli($servidor, $cuenta, $password, $bd);
if(isset($_POST['producto'])){
    $producto=$_POST['producto'];
    $canti=$_POST['cantidad'];
    array_push($_SESSION['compras'], $producto);
    array_push($_SESSION['cantidadPP'], $canti);
}
echo "<p>Llevas comprado: ";
                    //var_dump($_SESSION['compras']);
                    //var_dump($_SESSION['cantidadPP']);
                    //array_push($_SESSION['compras'], $_POST['articulo']);
                    echo "<table class='table table-dark table-striped'>
                    <tbody>";
                    $i=0;
                    foreach($_SESSION['compras'] as $index){
                        if(!is_null($index)){
                            $sqlC="SELECT ArchivoIMG, NombreP, Precio FROM productos WHERE IdProd='$index';";
                            $resultado=$conexion->query($sqlC);
                            $fila=$resultado->fetch_assoc();/*
                            for($c=0; $c<count($_SESSION['compras']); $c++){
                                if(!isset($_SESSION['compras'][$c]) || is_null($index)){
                                    $i++;
                                }
                                else{
                                    break;
                                }
                            }*/
                            echo "<tr>
                                <td><img src='images/".$fila['ArchivoIMG']."' width='50px' height='50px'></td>
                                <td><p>".$fila['NombreP']."</p></td>
                                <td><p>".$_SESSION['cantidadPP'][$i]."</p></td>
                                <td><p>".($fila['Precio']*$_SESSION['cantidadPP'][$i])."</p></td>
                                <td><p><button id='eliminar' onclick='eliminarP(".$i.")'>Eliminar</button></p></td>
                            </tr>";
                        }
                        $i+=1;
                    }
                    echo "</tbody>
                    </table>
                    <p>Costo total:";
                    $_SESSION['precioTotal']=0;
                    for($k=0; $k<(sizeof($_SESSION['cantidadPP'])); $k++){
                        $index2=$_SESSION['compras'][$k];
                        $sqlC="SELECT ArchivoIMG, NombreP, Precio FROM productos WHERE IdProd='$index2';";
                        $resultado=$conexion->query($sqlC);
                        $fila=$resultado->fetch_assoc();
                        $_SESSION['precioTotal']+=($fila['Precio']*$_SESSION['cantidadPP'][$k]);
                    }
                    echo $_SESSION['precioTotal']."</p>";
                    //print_r($_SESSION['compras']);
                    echo "<a href='pagoPrototipo.php' class='btn btn-danger btn-sm'>Proceder al pago</a>";
                    echo "</p>";
?>