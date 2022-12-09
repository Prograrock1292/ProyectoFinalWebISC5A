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
                                <a class="nav-link " aria-current="page" href="#" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight"><i class="fa-solid fa-cart-shopping fa-2x position-relative"><span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="font-size: .4em;">
                                    1
                                    <span class="visually-hidden">unread messages</span>
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
                    //array_push($_SESSION['compras'], $_POST['articulo']);
                    echo "<table class='table table-dark table-striped'>
                    <tbody>";
                    $i=0;
                    foreach($_SESSION['compras'] as $index){
                        $i+=1;
                        $sqlC="SELECT ArchivoIMG, NombreP, Precio FROM productos WHERE IdProd='$index';";
                        $resultado=$conexion->query($sqlC);
                        $fila=$resultado->fetch_assoc();
                        echo "<tr>
                            <th scope='row'>".$i."</th>
                            <td><img src='images/".$fila['ArchivoIMG']."' width='50px' height='50px'></td>
                            <td><p>".$fila['NombreP']."</p></td>
                            <td><p>".$fila['Precio']."</p></td>
                        </tr>";
                    }
                    echo "</tbody>
                    </table>";
                    //print_r($_SESSION['compras']);
                    echo "</p>";
                }
            }
            ?>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script src="js/carrito.js"></script>
</body>