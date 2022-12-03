<?php
session_start();
require "captcha.php";
$servidor = 'localhost:43065';
$cuenta = 'root';
$password = '';
$bd = 'bdgrafica';
$filename = session_id();
$conexion = new mysqli($servidor, $cuenta, $password, $bd);

if ($conexion->connect_errno) {
    die('Error en la conexion');
}


if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    if (!empty($_POST["remember"])) {
        $usuariocookie = htmlentities($_POST['username']);
        $passcookie = htmlentities($_POST['password']);
        setcookie("username", $usuariocookie, time() + 3600);
        setcookie("password", $passcookie, time() + 3600);
    } else {
        setcookie("username", "");
        setcookie("password", "");
    }
    $queryintentos = mysqli_query($conexion, "SELECT intentos FROM usuarios WHERE Cuenta = '$username' limit 1");
    $intentos = mysqli_fetch_assoc($queryintentos);
    $querybloqueo = mysqli_query($conexion, "SELECT Bloqueo FROM usuarios WHERE Cuenta = '$username' limit 1");
    $bloqueo = mysqli_fetch_assoc($querybloqueo);
    if ($bloqueo['Bloqueo'] == '1') {
        echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                                    <strong>Cuenta bloqueada.</strong> <a href='recuperar.php'>Recupere su cuenta aquí</a>
                                      <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                        <span aria-hidden='true'>&times;</span>
                                      </button>
                                </div>";
    } else if ($bloqueo['Bloqueo'] == '0' or $bloqueo['Bloqueo'] == '2') {
        if ($intentos['intentos'] !== '3') {
            $querylogin = mysqli_query($conexion, "SELECT * FROM usuarios WHERE Cuenta = '$username'");
            $nr = mysqli_num_rows($querylogin);
            $buscarpass = mysqli_fetch_array($querylogin);

            if (($nr == 1) && (((password_verify($password, $buscarpass['Contrasena']))) || (strcmp($password, $buscarpass['Contrasena'])) == 0)) {
                if (count($_POST) > 0) {
                    $number = file_get_contents($filename);
                    if ($_POST['number'] == $number) {
                        if ($bloqueo['Bloqueo'] == '0') {
                            mysqli_query($conexion, "UPDATE usuarios SET intentos=0 WHERE Cuenta = '$username'");
                            $_SESSION['nombre'] = $_POST['username'];
                            $micarrito=[];
                            $_SESSION["compras"] = $micarrito;
                            $text = rand(10000, 99999);

                            $myimage = create_capacha($text);
                            file_put_contents($filename, $text);
                            header('Location: index.php');
                        } else if ($bloqueo['Bloqueo'] == '2') {
                            mysqli_query($conexion, "UPDATE usuarios SET intentos=0 WHERE Cuenta = '$username'");
                            $_SESSION['nombre'] = $_POST['username'];
                            header('Location: nuevapass.php');
                        }
                    } else {
                        echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                                    <strong>¡Captcha incorrecto!</strong> Por favor vuelva a intentarlo.
                                      <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                        <span aria-hidden='true'>&times;</span>
                                      </button>
                                </div>";
                        $text = rand(10000, 99999);

                        $myimage = create_capacha($text);
                        file_put_contents($filename, $text);
                    }
                } else {

                    $text = rand(10000, 99999);

                    $myimage = create_capacha($text);
                    file_put_contents($filename, $text);
                }
            } else {
                mysqli_query($conexion, "UPDATE usuarios SET intentos=intentos+1 WHERE Cuenta = '$username'");
                $errores = intval($intentos['intentos']);
                if ($errores == 2) {
                    //echo "<script>alert('Cuenta bloqueada')</script>";
                    mysqli_query($conexion, "UPDATE usuarios SET bloqueo=1 WHERE Cuenta = '$username'");
                    echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                                    <strong>Cuenta bloqueada.</strong> <a href='recuperar.php'>Recupere su cuenta aquí</a>
                                      <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                        <span aria-hidden='true'>&times;</span>
                                      </button>
                                </div>";
                } else {
                    echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                                    <strong>Datos incorrectos</strong> Por favor vuelva a intentarlo.
                                      <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                        <span aria-hidden='true'>&times;</span>
                                      </button>
                                </div>";
                }
            }
        } else {
            mysqli_query($conexion, "UPDATE usuarios SET bloqueo=1 WHERE Cuenta = '$username'");
            echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                                    <strong>Cuenta bloqueada.</strong> <a href='recuperar.php'>Recupere su cuenta aquí</a>
                                      <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                        <span aria-hidden='true'>&times;</span>
                                      </button>
                                </div>";
        }
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <form class="form mx-auto" role="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" style="width: 20%; margin-top: 100px;">
        <div class="form-group">
            <input name="username" id="user" placeholder="Usuario" class="form-control form-control-sm" type="text" required="">
        </div>
        <div class="form-group">
            <input name="password" id="passwordInput" placeholder="Password" class="form-control form-control-sm" type="password" required="">
        </div>
        <div class="form-group">
            <label for="captcha"><small><b>Ingrese el texto de la imagen</b></small></label>
        </div>
        <div class="form-group">
            <img src="captcha.jpg" alt="CAPTCHA" class="captcha-image">
        </div>
        <div class="form-group">
            <input type="text" id="captcha" name="number" class="form-control form-control-sm">
        </div>
        <div class="form-group">
            <input type="checkbox" name="remember"> Recordar usuario y password
        </div>
        <div class="form-group">
            <button type="submit" name="submit" class="btn btn-primary btn-block">Iniciar sesión</button>
        </div>
        <div class="form-group text-center">
            <small><a href="registro.php">Registrar cuenta</a></small>
        </div>
    </form>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


</body>

</html>