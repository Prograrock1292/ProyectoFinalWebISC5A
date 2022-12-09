<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/SMTP.php';
    require 'PHPMailer/src/Exception.php';

    $mail = new PHPMailer(true);

    try {

        $mail->SMTPDebug = SMTP::DEBUG_OFF;                  
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

        $mail->Subject= 'Cupon de bienvenida';
        
        $mail->AddEmbeddedImage('images/BoomBoxLogo1_PNG.png', 'my-logo', 'BoomBoxLogo1_PNG.png'); 

        $mail->Body='<html>
                        <body style="font-size: 1.4em">
                            <b>¡Gracias por suscribirte!</b>
                            <br>
                            <p>Aquí tienes un cupón de regalo:</p>
                            <div style="width: 320px">
                                <div style="background: rgb(85,0,0);
                                            background: linear-gradient(0deg, rgba(85,0,0,1) 0%, rgba(89,0,0,1) 0%, rgba(0,0,0,1) 60%); text-align:center; padding: 20px;">
                                    <img src="cid:my-logo" alt="" width="200px" style="margin-bottom: 20px;">
                                    <div style="background: #000000; width: 50%; text-align: center; padding: 10px; font-size: 1.3em; font-family: sans-serif; margin-top: 20px; color: white;  margin: 0 auto;">
                                        Cupón
                                    </div>

                                </div>
                                <p style="font-family: sans-serif; color: #4a4a4a; text-align: center; font-weight: bold"><small>25% de descuento sobre el total de tu compra</small></p>
                            </div>
                        </body>
                    </html>';

        $mail->send();
        

        echo '<script>window.location.href="index.php";</script>';

    } catch (Exception $e) {
        //echo $mail->ErrorInfo;
}