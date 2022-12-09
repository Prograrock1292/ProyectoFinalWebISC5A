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
        $mail->addAddress('boombox.contacto1@gmail.com', '...');    

        $mail->addCC('boombox.contacto1@gmail.com');   

        $mail->isHTML(true);

        $mail->Subject= $_POST['asunto'];

        $mail->Body='<html><body><b>El usuario '.$_POST['nombre'].' desde el correo '.$_POST['email'].' envió un mensaje:</b><br>'.$_POST['mensaje'].'</body></html>';

        $mail->send();
        
        session_destroy();

        echo '<script>window.location.href="contacto.php";</script>';

    } catch (Exception $e) {
        //echo $mail->ErrorInfo;
}