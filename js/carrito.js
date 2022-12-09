function carrito(product){
    const xhttp = new XMLHttpRequest();
    php = "producto="+product;
    console.log(php);
    xhttp.open("POST", "js/carrito.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");    
    xhttp.send(php);
    xhttp.onload = function(){
        document.getElementById("canvasCarrito").innerHTML = this.responseText;
        /*carrito = "producto="+product;
        console.log(carrito);
        xhttp.open("POST", "js/carrito.php", true);
        envio.setRequestHeader("Content-type", "application/x-www-form-urlencoded");  
        xhttp.send(carrito);
        peticion.open("GET", "js/carrito2.php");
        document.getElementById("canvasCarrito").innerHTML = peticion.responseText;*/
    }
}