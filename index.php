<?php
    include_once('header.php');

    $generacupon = mysqli_query($conexion, "SELECT * FROM cupones where cupon like '%I%' ORDER BY RAND() LIMIT 1;");
    $cupon = mysqli_fetch_array($generacupon);
    ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/index.css">
    <title>Inicio</title>

</head>

<body>
    <header>
    </header>
    <section>
        <div class="bg-image">
            <div class="bg-div">
                <div class="bg-text">
                    <h1>BIENVENIDO A</h1>
                <img src="images/BoomBoxLogo5Img.png" alt="">
                  <p><a href="tienda.php">Ir a la tienda</a></p>
                </div>
            </div>
        </div>
    </section>
    <section>
        
    </section>
    <section>
        <div class="sec3">
            <div class="sec3-1">
                <h1>SOBRE NOSOTROS</h1>
                <p>Desde el año 1980, la piedra angular de BoomBox ha sido la relación con nuestros clientes y sus gustos por la música y lo vintage. Por esa razón, BoomBox ha trabajado duro durante estos años, para asegurarnos de que los clientes disfruten al máximo nuestros álbumes y la música que llevan dentro.</p>

                <p>Te prometemos la mejor música al mejor precio. Consigue nuevos discos o viejos clásicos, aquí y ahora. ¡Únete a nuestra familia de melómanos! Contáctanos para obtener más información.</p>
            </div>
            <div class="sec3-2">
                <img src="images/sec3.JPG" alt="" width="100%"> 
            </div>
        </div>
    </section>
    <section>
        <div class="secCupon">
            <h1 style="color: white; margin-bottom: 30px">¡Usa este cupón antes de que desaparezca!</h1>
            <div style="width: 320px;">
                <div style="background: rgb(85,0,0);
                            background: linear-gradient(0deg, rgba(85,0,0,1) 0%, rgba(89,0,0,1) 0%, rgba(0,0,0,1) 60%); text-align:center; padding: 20px; box-shadow: 0px 0px 15px 2px rgba(191, 191, 191, 0.4); border-radius: 4px">
                    <img src="images/BoomBoxLogo1_PNG.png" alt="" width="200px" style="margin-bottom: 20px;">
                    <div style="background: #000000; width: 50%; text-align: center; padding: 10px; font-size: 1.3em; font-family: sans-serif; margin-top: 20px; color: white; margin: 0 auto;">
                        <?php echo $cupon['cupon'] ?>
                    </div>

                </div>
                <p style="font-family: sans-serif; color: white; text-align: center; font-weight: bold; margin-top: 10px;" ><small><?php echo $cupon['descuento'] ?>% de descuento sobre el total de tu compra</small></p>
            </div>
        </div>
    </section>
    <section>
        <div class="sec4">
            <div class="sec4-1">
                <h1>CONTACTO</h1>
                <p>500 Terry Francois Street, 6th Floor. San Francisco, CA 94158</p>
                <p>contact.us@boombox.com</p>
                <p>123-456-7890</p>
                <div class="redes">
                    <a href="https://www.facebook.com/boomboxoficial" target="_blank"><i class="fa-brands fa-facebook fa-2x"></i></a>
                    <a href="https://www.instagram.com/boomboxoficial_/" target="_blank"><i class="fa-brands fa-instagram fa-2x"></i></a>
                </div>
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
                </form>
            </div>
        </div>
    </section>
    <section>
        <div class="sec5">
           <div class="sec5-1">
               <h1>SUSCRÍBETE AHORA</h1>
                <form action="emailSub.php" method="post">
                    <div class="form-group my-3" style="text-align: center">
                            <input name="sub" id="sub" placeholder="Ingresa tu email"  type="email" required="" style="color:white">
                            <button type="submit" name="submit">Unirse</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <footer>
        <?php include_once('footer.php');?>
        <p style="text-align: center; color: white;"><?php date_default_timezone_set('America/Mexico_City');
        echo "Fecha de última actualización: ".date("F d Y H:i:s.", filemtime("index.php")); ?></p>
    </footer>
    
</body>

</html>