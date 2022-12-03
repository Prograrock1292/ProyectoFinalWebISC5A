|<?php

    session_start();
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Document</title>
    <style>
        td,
        th {
            padding: 10px;

        }

        .containerProd {
            display: flex;
            flex-wrap: wrap;
            align-content: space-between;
        }
    </style>
</head>

<body>
    <header>
        <p>Bienvenido <?php echo $_SESSION['nombre']; ?></p>
        <br>
        <a class="btn btn-success" href="login.php">Iniciar sesion</a>
    </header>
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