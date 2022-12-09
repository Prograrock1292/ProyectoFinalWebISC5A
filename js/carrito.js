function carrito(product){
    const xhttp = new XMLHttpRequest();
    var toastLiveExample = document.getElementById('liveToast')
    php = "producto="+product;
    console.log(php);
    xhttp.open("POST", "js/carrito.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");    
    xhttp.send(php);
    xhttp.onload = function(){
            var toast = new bootstrap.Toast(toastLiveExample)
            toast.show()
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