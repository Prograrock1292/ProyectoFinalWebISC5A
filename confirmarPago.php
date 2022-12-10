<?php
session_start();
$servidor = 'localhost:33065';
$cuenta = 'root';
$password = '';
$bd = 'proyfinal';
$conexion = new mysqli($servidor, $cuenta, $password, $bd);
use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/SMTP.php';
    require 'PHPMailer/src/Exception.php';

    $mail = new PHPMailer(true);
$TarjetaMC = $_POST['tarjetaMC'];
$TarjetaV = $_POST['tarjetaV'];
$FechaExpMC = $_POST['fechaExpMC'];
$FechaExpV = $_POST['fechaExpV'];
$CCVMC = $_POST['ccvMC'];
$CCVV = $_POST['ccvV'];
$Nombre = $_POST['Nombre'];
$Email = $_POST['Correo'];
$Direccion = $_POST['Direccion'];
$Ciudad = $_POST['Ciudad'];
$Pais = $_POST['Pais'];
$CP = $_POST['CP'];
$Telefono = $_POST['Telefono'];
$Cupon = $_POST['Cupon'];
$Imp = 0;
$Envio = $_POST['Envio'];
$nomCorr = $_SESSION['nombre'];
$cuponSQL = "SELECT * FROM cupones WHERE cupon='$Cupon'";
$emailSQL = "select * from usuarios where Nombre='$nomCorr'"; 
    $resultadoEmail = $conexion->query($emailSQL);
            $filaEmail = $resultadoEmail->fetch_assoc();
            $correoo = ($filaEmail['Correo']);
$mail->SMTPDebug = SMTP::DEBUG_OFF;                  
        $mail->isSMTP();                                        
        $mail->Host= 'smtp.gmail.com ';                     
        $mail->SMTPAuth=true;             

        $mail->Username= 'boombox.contacto1@gmail.com';
        $mail->Password= 'jzwofcaclhoardii';

        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;           
        $mail->Port= 587;


        $mail->setFrom('boombox.contacto1@gmail.com', 'BoomBox');
        $mail->addAddress($correoo, '...');    

        $mail->addCC($correoo);   

        $mail->isHTML(true);

        $mail->Subject= 'Nota de compras';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmación de pago</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/daf8eb91e6.js" crossorigin="anonymous"></script>
</head>

<body>
    <div style="width: 50%; margin: 0 auto; text-align: center; margin: 20px 0px;">
        <?php
        $mail->Body="<html><body><div style='width: 70%; margin: 0 auto; text-align: center; margin-top: 20px;'>";
        echo "<h3>¡Gracias por su compra!</h3>
        <br> 
        <h5>Los datos de su compra son los siguientes:</h5>
        <br>
        <p>Nombre: " . $Nombre . "</p>
        <p>Correo electrónico: " . $Email . "</p>
        <p>Dirección: " . $Direccion . "</p>
        <p>Ciudad: " . $Ciudad . "</p>
        <p>País: " . $Pais . "</p>
        <p>Código Postal: " . $CP . "</p>
        <p>Teléfono: " . $Telefono . "</p>";
        $mail->Body.="<h3>¡Gracias por su compra!</h3>
                        <br> 
                        <h5>Los datos de su compra son los siguientes:</h5>
                        <br><p>Nombre: " . $Nombre . "</p>
                        <p>Correo electrónico: " . $Email . "</p>
                        <p>Dirección: " . $Direccion . "</p>
                        <p>Ciudad: " . $Ciudad . "</p>
                        <p>País: " . $Pais . "</p>
                        <p>Código Postal: " . $CP . "</p>
                        <p>Teléfono: " . $Telefono . "</p>";
        if(!empty($Cupon)){
            $resultado1 = $conexion->query($cuponSQL);
            $fila1 = $resultado1->fetch_assoc();
            $desc = ($fila1['descuento']/10);
            echo "<p>Cupón de descuento: -" . ($desc*10) . "%</p>";
            $mail->Body.="<p>Cupón de descuento: -" . ($desc*10) . "%</p>";
        }
        if (empty($TarjetaMC)) {
            echo "<p>Tarjeta de crédito (VISA): " . $TarjetaV . "</p>";
            $mail->Body.="<p>Tarjeta de crédito (VISA): " . $TarjetaV . "</p>";
        } else {
            echo "<p>Tarjeta de crédito (Master Card): " . $TarjetaMC . "</p>";
            $mail->Body.="<p>Tarjeta de crédito (Master Card): " . $TarjetaMC . "</p>";
        }
        echo "<table class='table table-striped'>
                    <tbody>";
        $mail->Body.="<p style='font-weight: bold'>Productos comprados:</p><table class='table table-striped' style='margin: 0 auto'>
                    <tbody>";
        $i = 0;
        foreach ($_SESSION['compras'] as $index) {
            if (!is_null($index)) {
                $sqlC = "SELECT ArchivoIMG, NombreP, Precio FROM productos WHERE IdProd='$index';";
                $resultado = $conexion->query($sqlC);
                $fila = $resultado->fetch_assoc();/*
                            for($c=0; $c<count($_SESSION['compras']); $c++){
                                if(!isset($_SESSION['compras'][$c]) || is_null($index)){
                                    $i++;
                                }
                                else{
                                    break;
                                }
                            }*/
                echo "<tr>
                                <td><img src='images/" . $fila['ArchivoIMG'] . "' width='50px' height='50px'></td>
                                <td><p>" . $fila['NombreP'] . "</p></td>
                                <td><p>" . $_SESSION['cantidadPP'][$i] . "</p></td>
                                <td><p>$" . ($fila['Precio'] * $_SESSION['cantidadPP'][$i]) . "</p></td>";
                $mail->Body.="<tr>
                                <td style='padding: 0px 20px'><p style='font-weight: bold'>" . $fila['NombreP'] . "</p></td>
                                <td style='padding: 0px 20px'><p style='font-weight: bold'>" . $_SESSION['cantidadPP'][$i] . "</p></td>
                                <td style='padding: 0px 20px'><p style='font-weight: bold'>$" . ($fila['Precio'] * $_SESSION['cantidadPP'][$i]) . "</p></td>";
            }
            $i += 1;
        }
        echo "</tr>
        </tbody>
        </table>";
        $mail->Body.="</tr>
        </tbody>
        </table>";
        $_SESSION['precioTotal'] = 0;
        for ($k = 0; $k < (sizeof($_SESSION['cantidadPP'])); $k++) {
            $index2 = $_SESSION['compras'][$k];
            $sqlC = "SELECT ArchivoIMG, NombreP, Precio FROM productos WHERE IdProd='$index2';";
            $resultado = $conexion->query($sqlC);
            $fila = $resultado->fetch_assoc();
            $_SESSION['precioTotal'] += ($fila['Precio'] * $_SESSION['cantidadPP'][$k]);
        }
        echo "<p>Precio original: $". $_SESSION['precioTotal'] ."</p>";
        $mail->Body.="<p>Precio original: $". $_SESSION['precioTotal'] ."</p>";
        if(!empty($Cupon)){
            $desc = $desc/10;
            $_SESSION['precioTotal'] = ($_SESSION['precioTotal'])*(1-$desc);
            echo "<p>Precio con descuento aplicado: $". $_SESSION['precioTotal'] ."</p>";
            $mail->Body.="<p>Precio con descuento aplicado: $". $_SESSION['precioTotal'] ."</p>";
        }
        if(!strcmp($Pais, "Mexico")){
            $Imp = 0.15;
        }
        else{
            $Imp = 0.18;
        }
        echo "<p>IVA: $". ($_SESSION['precioTotal']*$Imp) ."</p>";
        $mail->Body.="<p>IVA: $". ($_SESSION['precioTotal']*$Imp) ."</p>";
        $_SESSION['precioTotal'] = ($_SESSION['precioTotal'])*(1+$Imp);
        echo "<p>Gastos de envío: $". $Envio ."</p>";
        $mail->Body.="<p>Gastos de envío: $". $Envio ."</p>";
        $_SESSION['precioTotal'] += $Envio;
        echo "<p>Precio total a pagar: $". $_SESSION['precioTotal'] ."</p>";
        $mail->Body.="<p style='font-weight: bold'>Precio total a pagar: $". $_SESSION['precioTotal'] ."</p>";
        ?>
        <input type="hidden" name="Nombre" value="<?php echo $Nombre ?>">
        <input type="hidden" name="Correo" value="<?php echo $Email ?>">
        <input type="hidden" name="Direccion" value="<?php echo $Direccion ?>">
        <input type="hidden" name="Ciudad" value="<?php echo $Ciudad ?>">
        <input type="hidden" name="Pais" value="<?php echo $Pais ?>">
        <input type="hidden" name="CP" value="<?php echo $CP ?>">
        <input type="hidden" name="Telefono" value="<?php echo $Telefono ?>">
        <input type="hidden" name="PrecioT" value="<?php echo $_SESSION['precioTotal'] ?>">
        <input type="hidden" name="Tarjeta" value="<?php if (empty($TarjetaMC)) {
            echo $TarjetaV;
        } else {
            echo $TarjetaMC ;
        } ?>">
        <?php
        $j = 0;
        foreach ($_SESSION['compras'] as $index) {
            if (!is_null($index)) {
                $sqlC = "SELECT IdProd, Categoria, Existencia, Precio FROM productos WHERE IdProd='$index';";
                $resultado = $conexion->query($sqlC);
                $fila = $resultado->fetch_assoc();
                $CatUP = $fila['Categoria'];
                $sqlC = "SELECT idProducto, Cantidad, CantidadEnPesos FROM ventastotales WHERE NombreProd='$CatUP';";
                $resultado = $conexion->query($sqlC);
                $fila2 = $resultado->fetch_assoc();
                $NCantP = $fila2['Cantidad']+$_SESSION['cantidadPP'][$j];
                $NCantPes = $fila2['CantidadEnPesos']+($fila['Precio']*$_SESSION['cantidadPP'][$j]);
                $IdVenta = $fila2['idProducto'];
                $sqlC = "UPDATE ventastotales SET Cantidad='$NCantP', CantidadEnPesos='$NCantPes' WHERE idProducto='$IdVenta';";
                $resultado = $conexion->query($sqlC);
                $Exist = $fila['Existencia']-$_SESSION['cantidadPP'][$j];
                $sqlC = "UPDATE productos SET Existencia='$Exist' WHERE IdProd='$index';";
                $resultado = $conexion->query($sqlC);
                /*
                            for($c=0; $c<count($_SESSION['compras']); $c++){
                                if(!isset($_SESSION['compras'][$c]) || is_null($index)){
                                    $i++;
                                }
                                else{
                                    break;
                                }
                            }*/
                /*echo "<tr>
                                <td><img src='images/" . $fila['ArchivoIMG'] . "' width='50px' height='50px'></td>
                                <td><p>" . $fila['NombreP'] . "</p></td>
                                <td><p>" . $_SESSION['cantidadPP'][$j] . "</p></td>
                                <td><p>$" . ($fila['Precio'] * $_SESSION['cantidadPP'][$j]) . "</p></td>";*/
            }
            $j += 1;
        }
        $micarrito=[];
        $cantidadPP=[];
        $_SESSION["compras"] = $micarrito;
        $_SESSION['cantidad'] = 0;
        $_SESSION['cantidadPP'] = $cantidadPP;
        $_SESSION['precioTotal'] = 0;
        
        $mail->send();
        ?>
        
        <a class="btn btn-danger" href="index.php" >Volver a la página principal</a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>