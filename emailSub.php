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

        $mail->Username= 'boombox.contacto1@gmail.com';
        $mail->Password= 'jzwofcaclhoardii';

        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;           
        $mail->Port= 587;


        $mail->setFrom('boombox.contacto1@gmail.com', 'BoomBox');
        $mail->addAddress($_POST['sub'], '...');    

        $mail->addCC($_POST['sub']);   

        $mail->isHTML(true);

        $mail->Subject= $_POST['asunto'];

        $mail->Body='<html><body style="font-size: 1.4em"><b>¡Gracias por suscribirte!</b><br>Aquí tienes un cupón de regalo: (aun no se hacen los cupones)</body></html>';

        $mail->send();
        
        session_destroy();

        echo '<script>window.location.href="index.php";</script>';

    } catch (Exception $e) {
        //echo $mail->ErrorInfo;
}