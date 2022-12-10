<?php
session_start();
$servidor = 'localhost:33065';
$cuenta = 'root';
$password = '';
$bd = 'proyfinal';
$conexion = new mysqli($servidor, $cuenta, $password, $bd);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/daf8eb91e6.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/pagoPronto.css">
</head>
<body>
    <header>
        
    </header>
    <section id="cuerpo" class="contacto" style="width: 40%">
        <div class="div4">
            <div class="container-md">
            <form action="confirmarPago.php" method="post" style="border: 2px solid #717171; margin-top: 20px; padding: 10px 30px; border-radius: 4px">
                <h2>Elige un método de pago</h2>
                <div class="accordion accordion-flush" id="accordionFlushExample">
                    <div class="accordion-item text-white bg-dark">
                        <h2 class="accordion-header text-white bg-dark" id="flush-headingOne">
                            <button class="accordion-button collapsed text-white bg-danger" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                <p style="margin-right: 10px; font-weight: bold; font-size: 1.2em">Pago en OXXO</p><img src="images/Oxxo_Logo.png" alt="" width="80px"> 
                            </button>
                        </h2>
                        <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                           <p style="margin: 20px; font-weight: bold; font-size: 1.2em">Número de cuenta:</p>
                           <p style="margin: 20px; font-weight: bold; font-size: 1.2em">783 720 27594</p>
                        </div>
                    </div>
                    <div class="accordion-item text-white bg-dark">
                        <h2 class="accordion-header text-white bg-dark" id="flush-headingTwo">
                            <button class="accordion-button collapsed text-white bg-danger" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                                <p style="margin-right: 10px; font-weight: bold; font-size: 1.2em">Tarjeta de crédito</p><i class="fa-brands fa-cc-mastercard fa-3x"></i>
                            </button>
                        </h2>
                        <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                <div class="input-group mb-3 ">
                                    <span class="input-group-text text-white" style="background: #151515; border-color: #151515" id="basic-addon1">No. de tarjeta</span>
                                    <input id="tarjetaMC" name="tarjetaMC" type="text" class="form-control text-white bg-dark" style="border-color: #151515" placeholder="4111 1111 1111 1111" aria-label="Username" aria-describedby="basic-addon1">
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text text-white" style="background: #151515; border-color: #151515" id="basic-addon1">Fecha expir.</span>
                                    <input id="fechaExpMC" name="fechaExpMC" type="text" class="form-control text-white bg-dark" style="border-color: #151515" placeholder="10/23" aria-label="fecha" aria-describedby="basic-addon1">
                                    <span class="input-group-text text-white" style="background: #151515; border-color: #151515" id="basic-addon2">CCV</span>
                                    <input id="ccvMC" name="ccvMC" type="password" class="form-control text-white bg-dark" style="border-color: #151515" placeholder="123" aria-label="ccv" aria-describedby="basic-addon2">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item text-white bg-dark">
                        <h2 class="accordion-header text-white bg-dark" id="flush-headingThree">
                            <button class="accordion-button collapsed text-white bg-danger" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                                <p style="margin-right: 10px; font-weight: bold; font-size: 1.2em">Tarjeta de crédito</p><i class="fa-brands fa-cc-visa fa-3x"></i>
                            </button>
                        </h2>
                        <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                <div class="input-group mb-3 ">
                                    <span class="input-group-text text-white" style="background: #151515; border-color: #151515" id="basic-addon1">No. de tarjeta</span>
                                    <input id="tarjetaV" name="tarjetaV" type="text" class="form-control text-white bg-dark" style="border-color: #151515" placeholder="4111 1111 1111 1111" aria-label="Username" aria-describedby="basic-addon1">
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text text-white" style="background: #151515; border-color: #151515" id="basic-addon1">Fecha expir.</span>
                                    <input id="fechaExpV" name="fechaExpV" type="text" class="form-control text-white bg-dark" style="border-color: #151515" placeholder="10/23" aria-label="fecha" aria-describedby="basic-addon1">
                                    <span class="input-group-text text-white" style="background: #151515; border-color: #151515" id="basic-addon2">CCV</span>
                                    <input id="ccvV" name="ccvV" type="number" class="form-control text-white bg-dark" style="border-color: #151515" placeholder="123" aria-label="ccv" aria-describedby="basic-addon2">
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                    /*if (isset($_POST['pago'])) {
                        
                    }*/
                    ?>
                </div>
                
                    <div class="mb-3 my-3">
                      <label for="">¿Dónde quieres que se envíe tu pedido?</label>
                    </div>
                     <div class="mb-3 my-3">
                      <input id="Nombre" name="Nombre" type="text" class="form-control" placeholder="Nombre completo">
                    </div>
                    <div class="mb-3 my-3">
                      <input id="Correo" name="Correo" type="email" class="form-control" placeholder="ejemplo@gmail.com">
                    </div>
                    <div class="mb-3 my-3">
                      <input id="Direccion" name="Direccion" type="text" class="form-control" placeholder="Dirección">
                    </div>
                    <div class="mb-3 my-3">
                      <select id="Pais" name="Pais" class="form-select" aria-label="Default select example">
                        <option selected>País</option>
                        <option value="Mexico">México</option>
                        <option value="USA">Estados Unidos</option>
                        <option value="Canada">Canadá</option>
                      </select>
                    </div>
                    <div class="mb-3 my-3">
                      <input id="Ciudad" name="Ciudad" type="text" class="form-control" placeholder="Ciudad">
                    </div>
                    <div class="mb-3 my-3">
                      <input id="CP" name="CP" type="text" class="form-control" placeholder="Código postal">
                    </div>
                    <div class="mb-3 my-3">
                      <input id="Telefono" name="Telefono" type="number" class="form-control" placeholder="Teléfono">
                    </div>
                    <div class="mb-3 my-3">
                      <select id="Envio" name="Envio" class="form-select" aria-label="Default select example">
                        <option selected>Tipo de envío</option>
                        <option value="0">Gratis</option>
                        <option value="200">Express ($200)</option>
                      </select>
                    </div>
                    <div class="mb-3 my-3">
                        <label for="exampleFormControlInput1">Ingrese su cupón</label>
                        <input id="Cupon" name="Cupon" type="text" class="form-control" placeholder="Cupón">
                    </div>
                    <input type="submit" name="pago" class="btn btn-primary" value="Proseguir al pago">
                </form>
            </div>
        </div>
    </section>
    <footer>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>