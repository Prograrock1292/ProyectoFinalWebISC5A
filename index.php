<?php
    include_once('header.php');
    $servidor = 'localhost:43065';
    $cuenta = 'root';
    $password = '';
    $bd = 'bdgrafica';
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
                  <p><a href="#">Leer más</a></p>
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
        <div class="sec5">
           <div class="sec5-1">
               <h1>SUSCRÍBETE AHORA</h1>
                <form action="emailSub.php" method="post">
                    <div class="form-group my-3" style="text-align: center">
                            <input name="sub" id="sub" placeholder="Ingresa tu email"  type="email" required="">
                            <button type="submit" name="submit">Unirse</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <footer>
        <?php include_once('footer.php');?>
    </footer>
    
</body>

</html>