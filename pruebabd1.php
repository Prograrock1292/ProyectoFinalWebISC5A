|<?php
    
    $servidor='localhost:33065';
    $cuenta='root';
    $password='';
    $bd='bdprueba1';
     
    //conexion a la base de datos
    $conexion = new mysqli($servidor,$cuenta,$password,$bd);

    if ($conexion->connect_errno){
         die('Error en la conexion');
    }

    else{
         //conexion exitosa

         /*revisar si traemos datos a insertar en la bd  dependiendo
         de que el boton de enviar del formulario se le dio clic*/

         if(isset($_POST['submit'])&& !empty($_POST['id'])){
                //obtenemos datos del formulario
                $IdProd = $_POST['idprod'];
                $NombreP = $_POST['nombrep'];
                $Categoria = $_POST['categoria'];
                $Descripcion = $_POST['descripcion'];
                $Existencia = $_POST['existencia'];
                $Precio = $_POST['precio'];
                $ArchivoIMG = $_POST['archivoimg'];
                
                //hacemos cadena con la sentencia mysql para insertar datos
                $sql = "INSERT INTO productos (idproducto,nombreproducto,categoria,descripcion,existencia,precio,archivoimg) VALUES('IdProd','NombreP','Categoria','Descripcion','Existencia','Precio','ArchivoIMG')";
                $conexion->query($sql);  //aplicamos sentencia que inserta datos en la tabla usuarios de la base de datos
                if ($conexion->affected_rows >= 1){ //revisamos que se inserto un registro
                    echo '<script> alert("registro insertado") </script>';
                }//fin
             
              //continaumos con la consulta de datos a la tabla usuarios
         //vemos datos en un tabla de html
         $sql = 'select * from productos';//hacemos cadena con la sentencia mysql que consulta todo el contenido de la tabla
         $resultado = $conexion -> query($sql); //aplicamos sentencia

         if ($resultado -> num_rows){ //si la consulta genera registros
              echo '<div style="margin-left: 20px;">';
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
                while( $fila = $resultado -> fetch_assoc()){ //recorremos los registros obtenidos de la tabla
                    echo '<tr>';
                        echo '<td>'. $fila['idprod'] . '</td>';
                        echo '<td>'. $fila['nombrep'] . '</td>';
                        echo '<td>'. $fila['categoria'] . '</td>';
                        echo '<td>'. $fila['descripcion'] . '</td>';
                        echo '<td>'. $fila['existencia'] . '</td>';
                        echo '<td>'. $fila['precio'] . '</td>';
                        echo '<td>'. $fila['archivoimg'] . '</td>';
                    echo '</tr>';
                }   
                echo '</table">';
             echo '</div>';
         }
         else{
             echo "no hay datos";
         }
        
         }//fin 

        
         
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
        
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-4">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method='post'>
                    <h2>Registro de productos</h2>
                    <div class="form-group">
                        <label for="id">Id producto</label>
                        <input type="number" name="id" class="form-control" id="id" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="id">Nombre de producto</label>
                        <input type="text" class="form-control" name="nombre" id="nombre" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="id">Categoria</label>
                        <input type="text" name="id" class="form-control" id="id" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="id">Descripcion</label>
                        <input type="text" class="form-control" name="nombre" id="nombre" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="id">Existencia</label>
                        <input type="text" name="id" class="form-control" id="id" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="id">Precio</label>
                        <input type="number" name="id" class="form-control" id="id" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="id">Archivoimg</label>
                        <input type="text" name="id" class="form-control" id="id" placeholder="">
                    </div>
                    <button class="btn btn-success" type="submit" name="submit">Submit</button>
                </form>
            </div> <!-- fin col -->
        </div> <!-- fin row -->
    </div> <!-- fin container -->
    <br><br>
</body>

</html>
