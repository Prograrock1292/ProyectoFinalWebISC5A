<?php
session_start();
$categoria=$_POST['categoria'];
$servidor = 'localhost:33065';
$cuenta = 'root';
$password = '';
$bd = 'proyfinal';
$conexion = new mysqli($servidor, $cuenta, $password, $bd);
if(!strcmp($categoria, "Todas")){
    $sql = 'select * from productos;';
}
else{
    $sql = "SELECT * FROM productos WHERE Categoria='$categoria';";
}
$resultado = $conexion->query($sql);
$i = 1;
if ($resultado->num_rows) {
    echo "<div class='containerProd'>";
    echo "<div class='aside' style='grid-area: aside;'>
            <h4>Filtrar por</h4>
            <hr>
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
            <button class='btn btn-danger' onclick='filtrar()'>Filtrar</button>
            <hr>
        </div>";
    while ($fila = $resultado->fetch_assoc()) {
        echo '<div class="card border-2" style="max-width: 20rem; grid-area: product' . $i . '; overflow: hidden;">';
                    echo '<img src="images/' . $fila["ArchivoIMG"] . '" class="card-img-top" alt="' . $fila["ArchivoIMG"] . '" width="200px">
                        <div class="row no-gutters" style="z-index: 1; background-color: white;">
                <div class="col-md-8">
                    <div class="card-body"> 
                        <h5 class="card-title">' . $fila["NombreP"] . '<br></h5>
                        <p class="card-text"><small class="text-muted">Categoría: ' . $fila["Categoria"] . '</small></p>
                        <p class="card-text"><small class="text-muted">Existencias: ' . $fila["Existencia"] . '</small></p>
                        <p class="card-text"><small class="text-muted">Precio: ' . $fila["Precio"] . '</small></p>
                        <p class="card-text"><small class="text-muted">Cantidad: <br><select id="cantidadP'.$fila["IdProd"].'" class="form-select form-select-sm" aria-label=".form-select-sm example">'; for($j=0; $j<$fila['Existencia']; $j++){ echo '<option value="'.($j+1).'">'.($j+1).'</option>'; }; echo '</select></small></p>
                        <input id="producto" type="hidden" value="' . $fila["IdProd"] . '" name="articulo">
                        <button type="submit" id="anadir'.$fila["IdProd"].'" class="btn btn-danger" onclick="';
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
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="css/tienda.css">
</head>
<body>
    
</body>
</html>