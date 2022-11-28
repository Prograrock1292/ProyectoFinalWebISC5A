|<?php
    
    $servidor = 'localhost:33065';
    $cuenta = 'root';
    $password = '';
    $bd = 'bdgrafica';

    //conexion a la base de datos
    $conexion = new mysqli($servidor, $cuenta, $password, $bd);

    if ($conexion->connect_errno) {
        die('Error en la conexion');
    } else {
        //conexion exitosa

        /*revisar si traemos datos a insertar en la bd  dependiendo
         de que el boton de enviar del formulario se le dio clic*/

        if (isset($_POST['submit']) && !empty($_POST['idprod'])) {
            //obtenemos datos del formulario
            $IdProd = $_POST['idprod'];
            $NombreP = $_POST['nombrep'];
            $Categoria = $_POST['categoria'];
            $Descripcion = $_POST['descripcion'];
            $Existencia = $_POST['existencia'];
            $Precio = $_POST['precio'];
            $ArchivoIMG = $_POST['archivoimg'];

            //hacemos cadena con la sentencia mysql para insertar datos
            $sql = "INSERT INTO productos VALUES('$IdProd','$NombreP','$Categoria','$Descripcion','$Existencia','$Precio','$ArchivoIMG')";
            $conexion->query($sql);  //aplicamos sentencia que inserta datos en la tabla usuarios de la base de datos
            if ($conexion->affected_rows >= 1) { //revisamos que se inserto un registro
                echo '<script> alert("registro insertado") </script>';
            } //fin

            //continaumos con la consulta de datos a la tabla usuarios
        }
        //vemos datos en un tabla de html
        $sql = 'select * from productos'; //hacemos cadena con la sentencia mysql que consulta todo el contenido de la tabla
        $resultado = $conexion->query($sql); //aplicamos sentencia

        if ($resultado->num_rows) { //si la consulta genera registros
            /*echo '<div style="margin-left: 20px;">';
            echo '<table class="table table-hover" style="width:50%;">';

            echo '<tr>';
            echo '<th>idprod</th>';
            echo '<th>nombrep</th>';
            echo '<th>categoria</th>';
            echo '<th>descripcion</th>';
            echo '<th>existencia</th>';
            echo '<th>precio</th>';
            echo '<th>archivoimg</th>';
            echo '</tr>';
            while ($fila = $resultado->fetch_assoc()) { //recorremos los registros obtenidos de la tabla
                echo '<tr>';
                echo '<td>' . $fila['IdProd'] . '</td>';
                echo '<td>' . $fila['NombreP'] . '</td>';
                echo '<td>' . $fila['Categoria'] . '</td>';
                echo '<td>' . $fila['Descripcion'] . '</td>';
                echo '<td>' . $fila['Existencia'] . '</td>';
                echo '<td>' . $fila['Precio'] . '</td>';
                echo '<td>' . $fila['ArchivoIMG'] . '</td>';
                echo '</tr>';
            }
            echo '</table">';
            echo '</div>';*/
            echo "<div class='containerProd'>";
            while ($fila = $resultado->fetch_assoc()) { //recorremos los registros obtenidos de la tabla
            echo '<div class="card mb-3" style="max-width: 540px;">
            <div class="row no-gutters">
              <div class="col-md-4">
                <img src="'.$fila["ArchivoIMG"].'" class="card-img" alt="'.$fila["ArchivoIMG"].'">
              </div>
              <div class="col-md-8">
                <div class="card-body"> 
                  <h5 class="card-title">'.$fila["IdProd"].'.- '.$fila["NombreP" ].'</h5>
                  <p class="card-text"><small class="text-muted">Categoría: '.$fila["Categoria"].'</small></p>
                  <p class="card-text"><small class="text-muted">Existencias: '.$fila["Existencia"].'</small></p>
                  <p class="card-text"><small class="text-muted">Precio: '.$fila["Precio"].'</small></p>
                  <a href="actualizar.php?id='. $fila["IdProd"].'"> Editar </a> | <a href="eliminar.php?id='. $fila["IdProd"].'"> Eliminar </a>
                </div>
              </div>
            </div>
          </div>';
            }
            echo "</div>";
        } else {
            echo "no hay datos";
        }
    } //fin 





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