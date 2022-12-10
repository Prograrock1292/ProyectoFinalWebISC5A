<?php

    $servidor = 'localhost:33065';
    $cuenta = 'root';
    $password = '';
    $bd = 'proyfinal';

    $conexion = new mysqli($servidor, $cuenta, $password, $bd);

    if ($conexion->connect_errno) {
        die('Error en la conexion');
    } else {
        if (isset($_POST['actualizar'])) {
            $IdProd = $_POST['idprod'];
            $NombreP = $_POST['nombrep'];
            $Categoria = $_POST['categoria'];
            $Descripcion = $_POST['descripcion'];
            $Existencia = $_POST['existencia'];
            $Precio = $_POST['precio'];
            $ArchivoIMG = $_POST['archivoimg'];

            $sql = "UPDATE productos SET NombreP='$NombreP', Categoria='$Categoria', Descripcion='$Descripcion', Existencia='$Existencia', Precio='$Precio', ArchivoIMG='$ArchivoIMG' WHERE IdProd = '$IdProd'";
            $conexion->query($sql);
            echo '<script> alert("registro actualizado") </script>';
            header("Location : pruebabd1.php");
            exit;
        }
        $id = $_GET["id"];
        $sql = "select * from productos WHERE IdProd = '$id'";
        $resultado = $conexion->query($sql);

        if ($resultado->num_rows) {
            echo "<a href='edicion.php' class='btn btn-danger my-4'>Regresar</a><form class='containerProd' action='" . htmlspecialchars($_SERVER["PHP_SELF"]) . "' method='post'>";
            while ($fila = $resultado->fetch_assoc()) {
                echo '<div class="card mb-3" style="">
            <div class="row no-gutters">
              <div class="col-md-4">
                <img src="images/' . $fila["ArchivoIMG"] . '" class="card-img" alt="' . $fila["ArchivoIMG"] . '">
              </div>
              <div class="col-md-8">
                <div class="card-body"> 

                  <h5 class="card-title">' . $fila["IdProd"] . '.- </h5>
                  <p class="card-text">Nombre: &emsp;&emsp;<input type = "text" name = "nombrep" placeholder = "' . $fila["NombreP"] . '"></p>
                  <p class="card-text">Categoría:&ensp;&emsp;<input type = "text" name = "categoria" placeholder = "' . $fila["Categoria"] . '"> </p>
                  <p class="card-text">Descripción: <input type = "text" name = "descripcion" placeholder = "' . $fila["Descripcion"] . '"></p>
                  <p class="card-text">Existencias: <input type = "text" name = "existencia" placeholder = "' . $fila["Existencia"] . '"></p>
                  <p class="card-text">Precio: &emsp;&emsp;<input type = "number" name = "precio" placeholder = "' . $fila["Precio"] . '"></p>
                  <p class="card-text">Imagen: &emsp;&emsp;<input type = "text" placeholder = "'. $fila["ArchivoIMG"] .'" name = "archivoimg"></p>
                  <input type = "hidden" value = "' . $fila["IdProd"] . '" name = "idprod"> 
                  
                  </form>
                <button class="btn btn-danger" type="submit" name="actualizar">Actualizar</button> 
              </div>
            </div>
          </div>';
            }
            echo "</form>";
        } else {
            echo "no hay datos";
        }
    }





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
        
        p input{
            width: 80%;
        }
        
        body {
            margin: 0px 80px;
        }
    </style>
</head>

<body>

</body>

</html>