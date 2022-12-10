<?php
include_once('header.php');
$servidor = 'localhost:33065';
$cuenta = 'root';
$password = '';
$bd = 'proyfinal';
$conexion = new mysqli($servidor, $cuenta, $password, $bd);
if (isset($_POST['logout'])) {
    session_destroy();
    header('Location: index.php');
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/tienda.css">
    <title>Tienda</title>
    <script src="js/carrito.js"></script>
    <script src="js/categoria.js"></script>
</head>

<body>
    <section class="tienda">
        
            <?php
            $sql = 'select * from productos';
            $resultado = $conexion->query($sql);
            $i = 1;
            if ($resultado->num_rows) {
                echo "<div class='containerProd'>";
                echo "<div class='aside' style='grid-area: aside;'>
                        <h5>Filtrar por categoría:</h5>
                        <div class='form-check'>
                            <input class='form-check-input' type='radio' name='radioCat' id='flexRadioDefault1' value='Todas' checked>
                            <label class='form-check-label' for='flexRadioDefault1'>
                            Todas las categorías
                            </label>
                        </div>
                        <div class='form-check'>
                            <input class='form-check-input' type='radio' name='radioCat' id='flexRadioDefault2' value='Vinilo'>
                            <label class='form-check-label' for='flexRadioDefault2'>
                            Vinilos
                            </label>
                        </div>
                        <div class='form-check'>
                            <input class='form-check-input' type='radio' name='radioCat' id='flexRadioDefault3' value='Cassette'>
                            <label class='form-check-label' for='flexRadioDefault3'>
                            Casettes
                            </label>
                        </div>
                        <button class='btn btn-success' onclick='filtrar()'>Filtrar</button>
                    </div>";
                while ($fila = $resultado->fetch_assoc()) {
                    echo '<div class="card" style="max-width: 18rem; grid-area: product' . $i . ';">';
                    echo '<img src="images/' . $fila["ArchivoIMG"] . '" class="card-img-top" alt="' . $fila["ArchivoIMG"] . '" width="200px">
                        <div class="row no-gutters">
                            <div class="col-md-8">
                                <div class="card-body"> 
                                    <h5 class="card-title">' . $fila["NombreP"] . '<br></h5>
                                    <p class="card-text"><small class="text-muted">Categoría: ' . $fila["Categoria"] . '</small></p>
                                    <p class="card-text"><small class="text-muted">Existencias: ' . $fila["Existencia"] . '</small></p>
                                    <p class="card-text"><small class="text-muted">Precio: ' . $fila["Precio"] . '</small></p>
                                    <p class="card-text"><small class="text-muted">Cantidad: <br><select id="cantidadP'.$fila["IdProd"].'" class="form-select form-select-sm" aria-label=".form-select-sm example">'; for($j=0; $j<$fila['Existencia']; $j++){ echo '<option value="'.($j+1).'">'.($j+1).'</option>'; }; echo '</select></small></p>
                                    <input id="producto" type="hidden" value="' . $fila["IdProd"] . '" name="articulo">
                                    <button type="submit" id="anadir'.$fila["IdProd"].'" class="btn btn-success" onclick="';
                                    if(!isset($_SESSION['nombre'])){
                                        echo "location.href='login.php'";
                                    }
                                    else{
                                        echo 'carritoAdd('.$fila["IdProd"].')';
                                    }
                                    echo '">Agregar al carrito</button>
                                </div>
                            </div>
                        </div>';
                echo '</div>';
                    $i = $i + 1;
                }
                echo "</div>";
            } else {
                echo "no hay datos";
            }
            ?>
    </section>
    <footer>
        <?php include_once('footer.php'); ?>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script src="js/toast.js"></script>
</body>

</html>