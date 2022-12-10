<?php
if(isset($_SESSION['nombre'])){
    if(strcmp(trim($_SESSION['nombre']), "Admin")){
                                 header("Location: index.php");
                                }
                            }
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        #containerProd {
            margin-top: 50px;
            padding: 0px 50px;
        }
        
        #secc {
            background-color: #710000;  
            border-radius: 5px;
            margin-right: 10px;
        }
        
        #secc a {
            color: white;
            text-decoration: none;
            margin: 0px 5px;
            background-color: #530000; 
            padding: 5px;
            border-radius: 4px;
        }
        
        #graficas {
            display: flex;
            
        }
    </style>
    
</head>
<body>
<div class="position-fixed bottom-0 end-0 p-3 " style="z-index: 11" id="secc">
    <a href="#containerProd">Cambios</a>
    <a href="#altas">Altas</a>
    <a href="#graficash">Gráficas</a>
</div>
<?php
 include_once('header.php');   
 $servidor = 'localhost:33065';
 $cuenta = 'root';
 $password = '';
 $bd = 'proyfinal';
 
$conexion = new mysqli($servidor, $cuenta, $password, $bd); 

if ($conexion->connect_errno) {
    die('Error en la conexion');
} else {
    $sql1 = "SELECT NombreProd, Cantidad FROM ventastotales";
    $res1 = $conexion->query($sql1);
    $sql2 = "SELECT NombreProd, CantidadEnPesos FROM ventastotales";
    $res2 = $conexion->query($sql2);
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
        echo "<div class='row' id='containerProd'><h2 style='margin-bottom: 20px;'>Modificación de productos</h2>";
        while ($fila = $resultado->fetch_assoc()) {
            echo '<div class="card mb-3 col-6" style="margin-left: 0px;">
        <div class="row no-gutters">
          <div class="col-md-4">
            <img src="images/' . $fila["ArchivoIMG"] . '" class="card-img" alt="' . $fila["ArchivoIMG"] . '">
          </div>
          <div class="col-md-8">
            <div class="card-body"> 
              <h5 class="card-title">' . $fila["IdProd"] . '.- ' . $fila["NombreP"] . '<br><a href="edicion.php"> ¿Algo está mal? </a></h5>
              <p class="card-text"><small class="text-muted">Categoría: ' . $fila["Categoria"] . '</small></p>
              <p class="card-text"><small class="text-muted">Existencias: ' . $fila["Existencia"] . '</small></p>
              <p class="card-text"><small class="text-muted">Precio: ' . $fila["Precio"] . '</small></p>
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


<div class="container" style="margin: 30px">
    <div class="row" id="altas">
        <div class="col-8">
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
<h2 id="graficash" style="margin-left: 50px;">Gráficas</h2>
<div id="graficas">
    <div id="piechart1" style="width: 900px; height: 500px;"></div>
    <div id="piechart2" style="width: 900px; height: 500px;"></div>
</div>
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
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {
            'packages': ['corechart']
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {

            var data1 = google.visualization.arrayToDataTable([
                ['Productos', 'Cantidad de unidades vendidas'],
                <?php
                while ($fila = $res1->fetch_assoc()) {
                    echo "['" . $fila["NombreProd"] . "'," . $fila["Cantidad"] . "],";
                }
                ?>
            ]);
            
            var data2 = google.visualization.arrayToDataTable([
                ['Productos', 'Ganancias en pesos'],
                <?php
                while ($fila = $res2->fetch_assoc()) {
                    echo "['" . $fila["NombreProd"] . "'," . $fila["CantidadEnPesos"] . "],";
                }
                ?>
            ]);

            var options1 = {
                title: 'Gráfica de ventas totales hasta la fecha'
            };
            
            var options2 = {
                title: 'Gráfica de ganancias por categoría en pesos mexicanos'
            };

            var chart1 = new google.visualization.PieChart(document.getElementById('piechart1'));
            var chart2 = new google.visualization.PieChart(document.getElementById('piechart2'));

            chart1.draw(data1, options1);
            chart2.draw(data2, options2);
        }
    </script>
        
</html>
