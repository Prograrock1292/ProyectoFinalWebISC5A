<?php
    $servidor='localhost:43065';
    $cuenta='root';
    $password='';
    $bd='bdgrafica';
   
    $conexion = new mysqli($servidor,$cuenta,$password,$bd);

    if ($conexion->connect_errno){
         die('Error en la conexion');
    }

    if(isset($_POST['submit'])) {
        $nombre = $_POST['nombre'];
        $correo = $_POST['correo'];
        $cuenta = $_POST['cuenta'];
        $password1 = $_POST['password1'];
        $password2 = $_POST['password2'];

        if ($password2 != $password1) {
            echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                        <strong>¡Las contraseñas no coinciden!</strong> Por favor vuelva a intentarlo.
                          <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                            <span aria-hidden='true'>&times;</span>
                          </button>
                    </div>";
        } else {
            $passFuerte = password_hash($password1,PASSWORD_DEFAULT);
            $registrar = "INSERT INTO usuarios (Nombre, Correo, Cuenta, Contrasena) VALUES 
                            ('$nombre', '$correo', '$cuenta', '$passFuerte')";
            if(mysqli_query($conexion,$registrar)) {
                header('Location: login.php'); 
            } else {
                echo "Error: ".$registrar."<br>".mysql_error($conexion);
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
    <script src="https://kit.fontawesome.com/daf8eb91e6.js" crossorigin="anonymous"></script>
    <title>Document</title>
</head>

<body>


    <form class="form mx-auto" role="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" style="width: 20%; margin-top: 100px;">
        <div class="form-group">
            <input name="nombre" id="nombre" placeholder="Nombre" class="form-control form-control-sm" type="text" required="">
        </div>
        <div class="form-group">
            <input name="correo" id="correo" placeholder="Email" class="form-control form-control-sm" type="email" required="">
        </div>
        <div class="form-group">
            <input name="cuenta" id="cuenta" placeholder="Nombre de usuario" class="form-control form-control-sm" type="text" required="">
        </div>
        <div class="form-group">
            <input name="password1" id="password1" placeholder="Contraseña" class="form-control form-control-sm" type="password" required="">
        </div>
        <div class="form-group">
            <input name="password2" id="password2" placeholder="Confirmar contraseña" class="form-control form-control-sm" type="password" required="">
        </div>
        <div class="form-group">
            <button type="submit" name="submit" class="btn btn-primary btn-block">Registrarse</button>
        </div>
        <div class="form-group text-center">
            <small>¿Ya tienes una cuenta? <a href="login.php">Iniciar sesión</a></small>
        </div>
    </form>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>

</html>