<!DOCTYPE html>
<html lang="en">
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
 $servidor = 'localhost:33065';
 $cuenta = 'root';
 $password = '';
 $bd = 'proyfinal';
 
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
            <img src="images/' . $fila["ArchivoIMG"] . '" class="card-img" alt="' . $fila["ArchivoIMG"] . '">
          </div>
          <div class="col-md-8">
            <div class="card-body"> 
              <h5 class="card-title">' . $fila["IdProd"] . '.- ' . $fila["NombreP"] . '<br><a href="edicion.php"> ¿Algo esta mal? </a></h5>
              <p class="card-text"><small class="text-muted">Categoría: ' . $fila["Categoria"] . '</small></p>
              <p class="card-text">' . $fila["Descripcion"] . '</p>
              <p class="card-text"><small class="text-muted">Existencias: ' . $fila["Existencia"] . '</small></p>
              <p class="card-text"><small class="text-muted">Precio: ' . $fila["Precio"] . '</small></p>
              <input type="hidden" value="' . $fila["IdProd"] . '" name="articulo">
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13"
        crossorigin="anonymous"></script>
</html>
