<?php session_start(); 
if (isset($_POST['logout'])) {
        session_destroy();
        header("Location: index.php");
    }?>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        .offcanvas-backdrop {
            background-color: rgba(0, 0, 0, .5) !important;
        }
    </style>
        <link rel="icon" type="image/x-icon" href="img/favicon.png">
    <?php
    
    
    ?>
</head>

<body>
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark" style="background-color: #0c3858;">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">Boombox</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php" style="font-size: 18px;">Inicio</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="font-size: 18px;">
                            Certificaciones
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="certificaciones.php#java">Java</a></li>
                            <li><a class="dropdown-item" href="certificaciones.php#cpp">C++</a></li>
                            <li><a class="dropdown-item" href="certificaciones.php#php">PHP</a></li>
                            <li><a class="dropdown-item" href="certificaciones.php#swift">Swift</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contacto.php" style="font-size: 18px;">Contacto</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="acercade.php" style="font-size: 18px;">Acerca de</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="offcanvas offcanvas-end" tabindex="-1" data-bs-backdrop="false" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
        <div class="offcanvas-header text-white bg-dark">
            <h5 class="offcanvas-title" id="offcanvasRightLabel">Inicio de sesión</h5>
            <button type="button" class="btn-close btn-close-white text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body text-white bg-dark" style="padding: 50px;">
            <div>
                <h5>Ingrese sus datos:</h5><br>
                <form class="form" role="form" action="login.php" method="post">
                    <div class="form-group" style="margin-bottom: 30px">
                        <input name="email" id="emailInput" placeholder="Email" class="form-control form-control-lg bg-dark text-white border-2" type="text" required="">
                    </div>
                    <div class="form-group" style="margin-bottom: 30px">
                        <input name="palabra_secreta" id="passwordInput" placeholder="Contraseña" class="form-control form-control-lg bg-dark text-white border-2" type="password" required="">
                    </div>
                        <input type="submit" name="login" class="btn btn-success btn-block btn-lg" value="Iniciar sesión">
                    </div>
                    <br>
                    <div class="form-group text-center">
                        <small><a href="registro.php" data-toggle="modal" data-target="#modalPassword" style="color: aliceblue">Registrar cuenta</a></small>
                    </div>
                </form>
            </div>

        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>