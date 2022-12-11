<?php
    include_once('header.php');
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
       <h1>PREGUNTAS FRECUENTES</h1>
       <h3 style="margin-bottom: 80px;">Nosotros te ayudamos</h3>
        <div class="accordion" id="accordionExample">
          <div class="accordion-item">
            <h2 class="accordion-header" id="headingOne">
              <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                <b>¿Llegan a ofrecer exclusivas de artistas o descargas especiales?</b>
              </button>
            </h2>
            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
              <div class="accordion-body">
                En BoomBox sabemos que nuestra comunidad de melómanos está enfocada en el alto coleccionismo, así que siempre buscamos traer los productos mas exclusivos hasta tus manos con el menor riesgo de quedarte sin aquella pieza que tanto has estado buscando.
              </div>
            </div>
          </div>
          
          <div class="accordion-item">
            <h2 class="accordion-header" id="headingTwo">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                <b>¿Existe una política de devolución de los álbumes físicos que pedí?</b>
              </button>
            </h2>
            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
              <div class="accordion-body">
                Por supuesto. A veces sabemos que un producto no es lo que uno estaba esperando, así que BoomBox ofrece una política de devolución bastante fácil de aplicar: si no han pasado mas de 30 días desde que realizaste tu compra, puedes devolver el producto a nuestras sucursales o por correo y te regresamos tu dinero.
              </div>
            </div>
          </div>
          
          <div class="accordion-item">
            <h2 class="accordion-header" id="headingThree">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                <b>¿Pueden incluir las letras de las canciones en la compra de los álbumes?</b>
              </button>
            </h2>
            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
              <div class="accordion-body">
                Muchos de nuestros clientes no solo disfrutan del producto principal que es el vinilo, el CD o el cassette, sabemos que disfrutan de una experiencia completa. Por eso en BoomBox hacemos todo lo posible por garantizarles que al menos el 90% de nuestros productos vengan con algún tipo de extra que incluya la letra de las canciones presentes en los álbumes.
              </div>
            </div>
          </div>
          
          <div class="accordion-item">
            <h2 class="accordion-header" id="headingFour">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                <b>¿Manejan un sistema de apartados o de compras por preventas en sus productos?</b>
              </button>
            </h2>
            <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
              <div class="accordion-body">
                Sabemos que algunos de los productos que ofrece el mercado son más fáciles de conseguir recomprándolos, por lo que en BoomBox ofrecemos la posibilidad de comprar productos en preventa para que, al momento en el que salga al público en general nosotros podamos enviártelo a tu domicilio.
              </div>
            </div>
          </div>
          
          <div class="accordion-item">
            <h2 class="accordion-header" id="headingFive">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                <b>Si estoy buscando un producto que no tienen en la tienda, ¿pueden conseguirlo?</b>
              </button>
            </h2>
            <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#accordionExample">
              <div class="accordion-body">
                En BoomBox sabemos que el coleccionismo es uno de los principales motivos por los que adquirir los productos que les ofrecemos, así que en caso de buscar algún producto en específico el cual no aparece en la tienda en línea no dudes en ponerte en contacto con nosotros y con gusto te atenderemos. En caso de conseguir la pieza buscada nos comunicaremos con usted para que pueda pasar a pagarla y recogerla en nuestra sucursal principal.
              </div>
            </div>
          </div>
          
          <div class="accordion-item">
            <h2 class="accordion-header" id="headingSix">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                <b>¿Puedo encontrar álbumes/proyectos de artistas emergentes o de géneros poco conocidos?</b>
              </button>
            </h2>
            <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix" data-bs-parent="#accordionExample">
              <div class="accordion-body">
                Claro que sí, en BoomBox somos amantes del descubrimiento de música nueva. Ayudamos tanto a artistas emergentes como a artistas que experimentan, para que así puedan ser escuchados por cada vez más oyentes. Si eres o conoces a alguien como los artistas que acabamos de mencionar, no dudes en ponerte en contacto con nosotros.
              </div>
            </div>
          </div>
        </div>
    </section>
    <footer>
        <?php include_once('footer.php');?>
        <p style="text-align: center; color: white;"><?php date_default_timezone_set('America/Mexico_City');
        echo "Fecha de última actualización: ".date("F d Y H:i:s.", filemtime("FAQ.php")); ?></p>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>

</html>