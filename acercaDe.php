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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
    <title>Acerca De</title>
    <style>
        section {
            background-color: #ffffff;
            padding: 80px 200px;
            text-align: center;
        }
        
        .mv {
            width: 100%;
            display: flex;
            justify-content: space-around;
            margin-top: 30px;
        }
    </style>
</head>
<body>
    <section>
       <h1>SOBRE NOSOTROS</h1>
       <div class="mv">
           <div class="card border-danger border-2" style="width: 22rem;">
              <img src="images/mision.png" class="card-img-top" alt="...">
              <div class="card-body">
                <h3 class="card-title text-danger">Misión</h3>
                <p class="card-text">Somos una tienda de vinilos, cassettes y CD's que se compromete a proporcionar la mayor calidad de audio para nuestros clientes. Obtenemos nuestros productos de manera legal, siendo estos totalmente auténticos. Distribuimos gustos y conocimientos sobre música, pues creemos que la vida no sería la misma sin ella.</p>
              </div>
            </div>
            <div class="card border-danger border-2" style="width: 22rem;">
              <img src="images/vision.png" class="card-img-top" alt="...">
              <div class="card-body">
                <h3 class="card-title text-danger">Visión</h3>
                <p class="card-text">Buscamos ser una de las tiendas más reconocidas en cuanto a venta de música en distintos formatos, para así mostrarle a la sociedad en general lo importante que es la música y cómo puede cambiar su rutina. Queremos dar a conocer artistas emergentes para que reciban el apoyo que merecen.</p>
              </div>
            </div>
            <div class="card border-danger border-2" style="width: 22rem;">
              <img src="images/valores.png" class="card-img-top" alt="...">
              <div class="card-body">
                <h3 class="card-title text-danger">Valores</h3>
                <p class="card-text">Nuestra política de calidad está fundamentada en valores como:</p>
                <ul class="list-group">
                    <li class="list-group-item list-group-item-danger">Atención</li>
                    <li class="list-group-item list-group-item-danger">Honestidad</li>
                    <li class="list-group-item list-group-item-danger">Confianza</li>
                    <li class="list-group-item list-group-item-danger">Respeto</li>
                    <li class="list-group-item list-group-item-danger">Empatía</li>
                    <li class="list-group-item list-group-item-danger">Tolerancia</li>
                </ul>
              </div>
            </div>
       </div>
    </section>
    <footer>
        <?php include_once('footer.php');?>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>

</html>