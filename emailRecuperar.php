<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/SMTP.php';
    require 'PHPMailer/src/Exception.php';

    $mail = new PHPMailer(true);

    $seed = str_split('abcdefghijklmnopqrstuvwxyz'
                     .'ABCDEFGHIJKLMNOPQRSTUVWXYZ'
                     .'0123456789!@#$%^&*()');
    shuffle($seed);
    $newpass = '';
    foreach (array_rand($seed, 10) as $k) $newpass .= $seed[$k];

    $servidor='localhost:33065';
    $cuenta='root';
    $password='';
    $bd='proyfinal';

    $conexion = new mysqli($servidor,$cuenta,$password,$bd);

    if ($conexion->connect_errno){
         die('Error en la conexion');
    }
    
    $correo = $_POST['correo'];
    mysqli_query($conexion,"UPDATE usuarios SET bloqueo=2 WHERE Correo = '$correo'");
    mysqli_query($conexion,"UPDATE usuarios SET intentos=0 WHERE Correo = '$correo'");
    mysqli_query($conexion,"UPDATE usuarios SET Contrasena = '$newpass' WHERE Correo = '$correo'");

    try {

        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                  
        $mail->isSMTP();                                        
        $mail->Host= 'smtp.gmail.com ';                     
        $mail->SMTPAuth=true;             

        $mail->Username= 'bautista.ruben.1a.m@gmail.com';
        $mail->Password= 'ispiirsnisinpegs';

        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;           
        $mail->Port= 587;


        $mail->setFrom('bautista.ruben.1a.m@gmail.com', 'Ruben');
        $mail->addAddress($_POST['correo'], '...');    

        $mail->addCC($_POST['correo']);   

        $mail->isHTML(true);

        $mail->Subject= 'Recuperacion de password';

        $mail->Body='Use la siguiente contraseña como recuperación de su cuenta: '.$newpass;

        $mail->send();
        
        session_destroy();

        echo '<script>window.location.href="login.php";</script>';

    } catch (Exception $e) {
        //echo $mail->ErrorInfo;
}