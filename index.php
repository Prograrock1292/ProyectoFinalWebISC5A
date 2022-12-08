|<?php
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/index.css">
    <title>Inicio</title>

</head>

<body>
    <header>
        <?php
        if (isset($_SESSION['nombre'])) {
            echo "<p>Bienvenido " . $_SESSION['nombre'] . "</p>";
            echo '<form action="'.htmlspecialchars($_SERVER["PHP_SELF"]).'" method="post" role="form" style="width: 20%;">
            <button type="submit" name="logout" class="btn btn-primary btn-block">Cerrar sesión</button>
            </form>';
        }
        ?>
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
                <form action="" class="form mx-auto" role="form" method="post">
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
                <form action="">
                    <div class="form-group my-3" style="text-align: center">
                            <input name="sus" id="sus" placeholder="Ingresa tu email"  type="email" required="">
                            <button type="submit" name="submit">Unirse</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <footer>
        <?php include_once('footer.php');?>
    </footer>
    <?php

    $conexion = new mysqli($servidor, $cuenta, $password, $bd);

    if ($conexion->connect_errno) {
        die('Error en la conexion');
    } else {

        if (isset($_POST['submit']) && !empty($_POST['idprod'])) {
            $IdProd = $_POST['idprod'];
            $NombreP = $_POST['nombrep'];
            $Categoria = $_POST['categoria'];
            $Descripcion = $_POST['descripcion'];
            $Existencia = $_POST['existencia'];
            $Precio = $_POST['precio'];
            $ArchivoIMG = $_POST['archivoimg'];
            $sql = "INSERT INTO productos VALUES('$IdProd','$NombreP','$Categoria','$Descripcion','$Existencia','$Precio','$ArchivoIMG')";
            $conexion->query($sql);
            if ($conexion->affected_rows >= 1) {
                echo '<script> alert("registro insertado") </script>';
            }
        }
        $sql = 'select * from productos';
        $resultado = $conexion->query($sql);

        if ($resultado->num_rows) {
            echo "<div class='containerProd'>";
            while ($fila = $resultado->fetch_assoc()) {
                echo '<div class="card mb-3" style="max-width: 540px;">
                <form action=' . htmlspecialchars($_SERVER["PHP_SELF"]) . ' method="POST">
            <div class="row no-gutters">
              <div class="col-md-4">
                <img src="' . $fila["ArchivoIMG"] . '" class="card-img" alt="' . $fila["ArchivoIMG"] . '">
              </div>
              <div class="col-md-8">
                <div class="card-body"> 
                  <h5 class="card-title">' . $fila["IdProd"] . '.- ' . $fila["NombreP"] . '<br><a href="edicion.php"> ¿Algo esta mal? </a></h5>
                  <p class="card-text"><small class="text-muted">Categoría: ' . $fila["Categoria"] . '</small></p>
                  <p class="card-text">' . $fila["Descripcion"] . '</p>
                  <p class="card-text"><small class="text-muted">Existencias: ' . $fila["Existencia"] . '</small></p>
                  <p class="card-text"><small class="text-muted">Precio: ' . $fila["Precio"] . '</small></p>
                  <input type="hidden" value="' . $fila["NombreP"] . '" name="articulo">
                  <input class="btn btn-success" type="submit" value="enviar">
                </div>
              </div>
            </div>
            </form>
          </div>';
            }
            echo "</div>";
        } else {
            echo "no hay datos";
        }
    }


    //echo "Bienvenido(a) " . $_SESSION["usuario"];

    if (empty($_SESSION["compras"]) && empty($_POST["articulo"]))
        echo "<br>carrito vacio";
    else {
        echo "<p>Llevas comprado: ";
        array_push($_SESSION['compras'], $_POST['articulo']);
        print_r($_SESSION['compras']);
    }
    ?>


    <div class="container">
        <div class="row">
            <div class="col-4">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method='post'>
                    <h2>Registro de productos</h2>
                    <div class="form-group">
                        <label for="id">Id producto</label>
                        <input type="number" name="idprod" class="form-control" id="idprod" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="id">Nombre de producto</label>
                        <input type="text" class="form-control" name="nombrep" id="nombrep" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="id">Categoria</label>
                        <input type="text" name="categoria" class="form-control" id="categoria" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="id">Descripcion</label>
                        <input type="text" class="form-control" name="descripcion" id="descripcion" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="id">Existencia</label>
                        <input type="number" name="existencia" class="form-control" id="existencia" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="id">Precio</label>
                        <input type="number" name="precio" class="form-control" id="precio" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="id">Archivoimg</label>
                        <input type="text" name="archivoimg" class="form-control" id="archivoimg" placeholder="">
                    </div>
                    <button class="btn btn-success" type="submit" name="submit">Submit</button>
                    <button class="btn btn-success" type="submit" name="submit">Editar</button>
                </form>
            </div>
        </div>
    </div>
    <br><br>
    
    
</body>

</html>