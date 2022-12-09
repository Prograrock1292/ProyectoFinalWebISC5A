<?php
$servidor = 'localhost:33065';
$cuenta = 'root';
$password = '';
$bd = 'proyfinal';

$conexion = new mysqli($servidor, $cuenta, $password, $bd);

$sql = "SELECT NombreProd, Cantidad FROM ventastotales";
$res = $conexion->query($sql);
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

            var data = google.visualization.arrayToDataTable([
                ['Productos', 'Cantidad de unidades vendidas'],
                <?php
                while ($fila = $res->fetch_assoc()) {
                    echo "['" . $fila["NombreProd"] . "'," . $fila["Cantidad"] . "],";
                }
                ?>
            ]);

            var options = {
                title: 'Gráfica de ventas totales hasta la fecha'
            };

            var chart = new google.visualization.PieChart(document.getElementById('piechart'));

            chart.draw(data, options);
        }
    </script>
</head>

<body>
    <div id="piechart" style="width: 900px; height: 500px;"></div>
</body>

</html>