<?php
    session_start();
    $servidor='localhost:33065';
    $cuenta='root';
    $password='';
    $bd='proyfinal';
    //$usuario = $_SESSION['nombre'];
   
    $conexion = new mysqli($servidor,$cuenta,$password,$bd);

    if ($conexion->connect_errno){
         die('Error en la conexion');
    }

    if(isset($_POST['submit'])) {
        $password1 = $_POST['password1'];
        $password2 = $_POST['password2'];

        if ($password2 != $password1) {
            echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                        <strong>¡Las contraseñas no coinciden!</strong> Por favor vuelva a intentarlo.
                          <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'>
                          </button>
                    </div>";
        } else {
            $passFuerte = password_hash($password1,PASSWORD_DEFAULT);
            $actualizar = "UPDATE usuarios SET Contrasena='$passFuerte' WHERE Cuenta = '$usuario'";
            if(mysqli_query($conexion,$actualizar)) {
                mysqli_query($conexion,"UPDATE usuarios SET bloqueo=0 WHERE Cuenta = '$usuario'");
                echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                                    <strong>Contraseña actualizada exitosamente</strong>
                                      <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'>
                                      </button>
                                </div>";
                session_destroy();
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/daf8eb91e6.js" crossorigin="anonymous"></script>
    <title>Document</title>
</head>

<body>


    <form class="form mx-auto" role="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" style="width: 20%; margin-top: 100px;">
        <div class="form-group my-3">
            <label for="">Generar nueva contraseña para la cuenta: <?php //echo $usuario ?></label>
        </div>
        <div class="form-group my-3">
            <input name="password1" id="password1" placeholder="Contraseña" class="form-control form-control" type="password" required="">
        </div>
        <div class="form-group mt-3 mb-1">
            <input name="password2" id="password2" placeholder="Confirmar contraseña" class="form-control form-control" type="password" required="">
        </div>
        <div class="form-group my-1">
            <label for="password1" id="confirm" style="font-size: 0.8em; color: red"></label>
        </div>
        <div class="form-group mb-3 mt-2 text-center">
            <button type="submit" name="submit" class="btn btn-primary btn-block">Registrarse</button>
        </div>
    </form>
    <script>
        let passw1 = document.querySelector('#password1');
        let passw2 = document.querySelector('#password2');
        let resultado = document.querySelector('#confirm');
        
        function verificaPass() {
            resultado.innerText = passw1.value == passw2.value ? '' : 'Las contraseñas no coinciden';
        }
        
        passw1.addEventListener('keyup', () => {
            if (passw2.value.length != 0) verificaPass();
        })
        
        passw2.addEventListener('keyup', verificaPass);
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

</body>

</html>