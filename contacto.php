<?php
    include_once('header.php');
    $servidor = 'localhost:33065';
    $cuenta = 'root';
    $password = '';
    $bd = 'proyfinal';
    if(isset($_POST['logout'])) {
        session_destroy();
        header('Location: index.php');
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contacto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/contacto.css">
</head>
<body>
    <section>
        <div class="sec4">
            <div class="sec4-1">
                <h1>CONTACTO</h1>
                <p>500 Terry Francois Street, 6th Floor. San Francisco, CA 94158</p>
                <p>contact.us@boombox.com</p>
                <p>123-456-7890</p>
                <div class="redes">
                    <i class="fa-brands fa-facebook fa-2x"></i>
                    <i class="fa-brands fa-instagram fa-2x"></i>
                </div>
                <iframe width="453" height="257" src="https://www.youtube.com/embed/WPsfEeR2Z4E" title="Así es una tienda de discos de vinil en la actualidad" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            <div class="sec4-2">
                <form action="emailContacto.php" class="form mx-auto" role="form" method="post">
                    <div class="form-group my-3">
                        <input name="nombre" id="nomb" placeholder="Nombre"  type="text" required="">
                    </div>
                    <div class="form-group my-3">
                        <input name="email" id="email" placeholder="Email" type="email" required="">
                    </div>
                    <div class="form-group my-3">
                        <input name="asunto" id="asunto" placeholder="Asunto"  type="text" required="">
                    </div>
                    <div class="form-group my-3">
                        <textarea name="mensaje" placeholder="Escriba su mensaje aquí..."></textarea>
                    </div>
                    <div class="form-group my-3 text-center">
                        <button type="submit" name="submit">Enviar</button>
                    </div>
            </div>
        </div>
    </section>
    <section>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3702.452780358222!2d-102.29959358508052!3d21.878633585544243!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8429ee7c54108ea1%3A0xef2028c6e2aed66f!2sGaleana%20Sur%20119%2C%20Zona%20Centro%2C%2020000%20Aguascalientes%2C%20Ags.!5e0!3m2!1ses-419!2smx!4v1670544304312!5m2!1ses-419!2smx" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </section>
    <footer>
        <?php include_once('footer.php');?>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>
</html>