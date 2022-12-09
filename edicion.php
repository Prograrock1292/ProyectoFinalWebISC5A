|<?php

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
            <div class="row no-gutters">
              <div class="col-md-4">
                <img src="images/' . $fila["ArchivoIMG"] . '" class="card-img" alt="' . $fila["ArchivoIMG"] . '">
              </div>
              <div class="col-md-8">
                <div class="card-body"> 
                  <h5 class="card-title">' . $fila["IdProd"] . '.- ' . $fila["NombreP"] . '</h5>
                  <p class="card-text"><small class="text-muted">Categoría: ' . $fila["Categoria"] . '</small></p>
                  <p class="card-text"><small class="text-muted">Existencias: ' . $fila["Existencia"] . '</small></p>
                  <p class="card-text"><small class="text-muted">Precio: ' . $fila["Precio"] . '</small></p>
                  <p class="card-text"><small class="text-muted">Nombre de la imagen: ' . $fila["ArchivoIMG"] . '</small></p>
                  <a href="actualizar.php?id=' . $fila["IdProd"] . '"> Editar </a> | <a href="eliminar.php?id=' . $fila["IdProd"] . '"> Eliminar </a>
                </div>
              </div>
            </div>
          </div>';
            }
            echo "</div>";
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
    </style>
</head>

<body>

</body>

</html>