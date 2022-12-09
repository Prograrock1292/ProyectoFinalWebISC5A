<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/SMTP.php';
    require 'PHPMailer/src/Exception.php';

    $mail = new PHPMailer(true);

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
        $mail->addAddress($_POST['email'], '...');    

        $mail->addCC($_POST['email']);   

        $mail->isHTML(true);

        $mail->Subject= $_POST['asunto'];

        $mail->Body='Use la siguiente contraseña como recuperación de su cuenta: '.$newpass;

        $mail->send();
        
        session_destroy();

        echo '<script>window.location.href="login.php";</script>';

    } catch (Exception $e) {
        //echo $mail->ErrorInfo;
}