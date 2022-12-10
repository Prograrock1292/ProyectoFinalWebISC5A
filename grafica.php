<?php
$servidor = 'localhost:33065';
$cuenta = 'root';
$password = '';
$bd = 'proyfinal';

$conexion = new mysqli($servidor, $cuenta, $password, $bd);

$sql1 = "SELECT NombreProd, Cantidad FROM ventastotales";
$res1 = $conexion->query($sql1);
$sql2 = "SELECT NombreProd, CantidadEnPesos FROM ventastotales";
$res2 = $conexion->query($sql2);

?>
<html>

<head>
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
                title: 'Gráfica de ganancias por categoría en pesos'
            };

            var chart1 = new google.visualization.PieChart(document.getElementById('piechart1'));
            var chart2 = new google.visualization.PieChart(document.getElementById('piechart2'));

            chart1.draw(data1, options1);
            chart2.draw(data2, options2);
        }
    </script>
</head>

<body>
    <div id="piechart1" style="width: 900px; height: 500px;"></div>
    <div id="piechart2" style="width: 900px; height: 500px;"></div>
</body>

</html>