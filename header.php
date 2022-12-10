<?php session_start(); 
if (isset($_POST['logout'])) {
        session_destroy();
        header("Location: index.php");
    }
    $servidor = 'localhost:33065';
    $cuenta = 'root';
    $password = '';
    $bd = 'proyfinal';
    $conexion = new mysqli($servidor, $cuenta, $password, $bd);
    ?>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/daf8eb91e6.js" crossorigin="anonymous"></script>
    <style>
        .offcanvas-backdrop {
            background-color: rgba(0, 0, 0, .5) !important;
        }
        #log {
            color: #B20218;
            font-weight: bold;
            display: flex;
        }
        
        #log p {
            padding-left: 10px;
       
        }
        
        #log:hover {
            color: #74000f;
        }
        
        li a {
            vertical-align: middle;
        }
        
    </style>
        <link rel="icon" type="image/x-icon" href="img/favicon.png">
    <?php
    
    
    ?>
</head>

<body>
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark " style="background-color: #000000; height: 100px;">
        <div class="container-fluid" style="width: 100%;">
           <div class="row" style="width: 100%; padding-left: 50px; padding-right: 50px;">
               <div class="col-6 d-flex flex-row">
                    <a class="navbar-brand" href="index.php"><img src="images/BoomBoxLogo1_PNG.png" alt="" width="200px"></a>
                    <h5 class="me-auto mb-2 mb-lg-0 navbar-brand" style="color:white; padding-top:10px;"><i>"Desempolvando música"</i></h5>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    </button>
               </div>
                <div class="col-6 d-flex flex-row" style="padding-top: 5px">   
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav  mb-2 mb-lg-0 justify-content-end" style="width: 100%;">
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="index.php">Inicio</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="tienda.php" >Tienda</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="acercaDe.php" >Acerca de</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="FAQ.php" >FAQ</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " aria-current="page" href="contacto.php">Contacto</a>
                            </li>
                            <?php
                            if(isset($_SESSION['nombre'])){
                                if(!strcmp(trim($_SESSION['nombre']), "Admin")){
                                    echo '<li class="nav-item">
                                    <a class="nav-link " aria-current="page" href="admin.php">Administrar</a>
                                </li>';
                                }
                            }

                            ?>
                            <li class="nav-item">
                                <?php
                                if(!isset($_SESSION['nombre'])){
                                    echo '<a class="nav-link " id="log" aria-current="page" href="login.php"><i class="fa-solid fa-circle-user fa-2x"></i><p>Log in</p></a>';
                                }
                                else{
                                    echo '<a class="nav-link " id="log" aria-current="page" href="#"><i class="fa-solid fa-circle-user fa-2x"></i><p>'.$_SESSION['nombre'].'</p></a>
                                    </li>
                                    <li class="nav-item">
                                    <form action="'.htmlspecialchars($_SERVER["PHP_SELF"]).'" method="post" role="form" ">
                                        <button type="submit" name="logout" class="btn" aria-current="page" id="log" style="background=none;"><i class="fa-solid fa-right-from-bracket fa-2x"></i></button>
                                    </form>
                                    ';
                                }
                                ?>

                            </li>

                            <li class="nav-item">
                                <a class="nav-link " aria-current="page" href="#" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight"><i class="fa-solid fa-cart-shopping fa-2x position-relative">
                                    <span id="cantidadC" class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="font-size: .4em;">
                                    <?php
                                    if(!isset($_SESSION['nombre'])){
                                        echo "0";
                                    }
                                    else{
                                        $catTotal=0;
                                        if(!empty($_SESSION['cantidadPP'])){
                                            foreach($_SESSION['cantidadPP'] as $cuantos){
                                                $catTotal+=$cuantos;
                                            }
                                        echo $catTotal;
                                        }
                                        else{
                                            echo "0";
                                        }
                                    }
                                    ?>
                                  </span></i></a>
                            </li>

                        </ul>
                        </div>
                    </div>
              </div>
        </div>
    </nav>
    <div style="width: 100%; height: 70px; background: #000000">
    </div>
    <div class="offcanvas offcanvas-end" tabindex="-1" data-bs-backdrop="false" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
        <div class="offcanvas-header text-white" style="background:#000000">
            <h5 class="offcanvas-title" id="offcanvasRightLabel">Carrito de compras</h5>
            <button type="button" class="btn-close btn-close-white text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div id="canvasCarrito" class="offcanvas-body text-white" style="padding: 50px; background:#000000">
        <?php
            if(!isset($_SESSION['nombre'])){
                echo "<p>Para empezar a agregar productos a tu carrito, debes de <a href='login.php'>iniciar sesión</a> o de <a href='registro.php'>registrarte aquí</a>.";
            }
            else{
                if (empty($_SESSION["compras"]))
                    echo "<br><p>Carrito de compras vacío</p>";
                else {
                    echo "<p>Llevas comprado: ";
                    //var_dump($_SESSION['compras']);
                    //var_dump($_SESSION['cantidadPP']);
                    //array_push($_SESSION['compras'], $_POST['articulo']);
                    echo "<table class='table align-middle'>
                    <tbody>";
                    $i=0;
                    foreach($_SESSION['compras'] as $index){
                        if(!is_null($index)){
                            $sqlC="SELECT ArchivoIMG, NombreP, Precio FROM productos WHERE IdProd='$index';";
                            $resultado=$conexion->query($sqlC);
                            $fila=$resultado->fetch_assoc();/*
                            for($c=0; $c<count($_SESSION['compras']); $c++){
                                if(!isset($_SESSION['compras'][$c]) || is_null($index)){
                                    $i++;
                                }
                                else{
                                    break;
                                }
                            }*/
                            echo "<tr class='text-white'>
                                <td><img src='images/".$fila['ArchivoIMG']."' width='50px' height='50px'></td>
                                <td><p>".$fila['NombreP']."</p></td>
                                <td><p>".$_SESSION['cantidadPP'][$i]."</p></td>
                                <td><p>$".($fila['Precio']*$_SESSION['cantidadPP'][$i])."</p></td>
                                <td><p><button id='eliminar' onclick='eliminarP(".$i.")' class='btn btn-danger'>Eliminar</button></p></td>
                            </tr>";
                        }
                        $i+=1;
                    }
                    echo "</tbody>
                    </table>
                    <p>Costo total:";
                    $_SESSION['precioTotal']=0;
                    for($k=0; $k<(sizeof($_SESSION['cantidadPP'])); $k++){
                        $index2=$_SESSION['compras'][$k];
                        $sqlC="SELECT ArchivoIMG, NombreP, Precio FROM productos WHERE IdProd='$index2';";
                        $resultado=$conexion->query($sqlC);
                        $fila=$resultado->fetch_assoc();
                        $_SESSION['precioTotal']+=($fila['Precio']*$_SESSION['cantidadPP'][$k]);
                    }
                    echo $_SESSION['precioTotal']."</p>";
                    //print_r($_SESSION['compras']);
                    echo "<a href='pagoPrototipo.php' class='btn btn-danger btn-sm'>Proceder al pago</a>";
                    echo "</p>";
                }
            }
            ?>
        </div>
    </div>
    <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
  <div id="liveToast" class="toast text-white bg-dark" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="toast-header text-white bg-dark border-dark">
      <strong class="me-auto">PRODUCTO AÑADIDO</strong>
      <button type="button" class="btn-close btn-close-white" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
    <div class="toast-body border-dark">
      Se ha añadido el producto a tu carrito de compra
    </div>
  </div>
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script src="js/carrito.js"></script>
    <script src="js/toast.js"></script>
</body>