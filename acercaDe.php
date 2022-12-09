<?php
    include_once('header.php');
    $servidor = 'localhost:33065';
    $cuenta = 'root';
    $password = '';
    $bd = 'proyfinal';
    if(isset($_POST['logout'])) {
        session_destroy();
        header('Location: index.php');
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
    <title>Preguntas Frecuentes</title>
    <style>
        section {
            background-color: #ffffff;
            padding: 80px 300px;
            margin-top: 30px;
        }
        h1, h3 {
            text-align: center;
        }
        
        h1 {
            color: #bc0000;
        }
        
        section {
            font-size: 1.2em;
        }
        section b {
            font-size: 1.3em;
        }
    </style>
</head>
<body>
    <section>
       <h1>SOBRE NOSOTROS</h1>
    </section>
    <footer>
        <?php include_once('footer.php');?>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>

</html>