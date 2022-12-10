var i=0;
var cant;
function cambio(){
    cant = document.getElementById("cantidad").value;
    console.log(cant);
}

function carritoAdd(product) {
    const xhttp = new XMLHttpRequest();
    const cuenta = new XMLHttpRequest();
    var toastLiveExample = document.getElementById('liveToast');
    var cantForm = document.getElementById('cantidadP'+product).value;
    php = "producto=" + product + "&cantidad=" + cantForm;
    xhttp.open("POST", "js/carrito.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send(php);
    cuenta.open("GET", "js/carrito2.php");
    cuenta.send();
    xhttp.onload = function () {
        var toast = new bootstrap.Toast(toastLiveExample);
        toast.show();
        document.getElementById("canvasCarrito").innerHTML = xhttp.responseText;
        document.getElementById("cantidadC").innerHTML = cuenta.responseText;
        /*carrito = "producto="+product;
        console.log(carrito);
        xhttp.open("POST", "js/carrito.php", true);
        envio.setRequestHeader("Content-type", "application/x-www-form-urlencoded");  
        xhttp.send(carrito);
        peticion.open("GET", "js/carrito2.php");
        document.getElementById("canvasCarrito").innerHTML = peticion.responseText;*/
    }
}

function eliminarP(index){
    const elimi = new XMLHttpRequest();
    php = "index="+index;
    const xhttp = new XMLHttpRequest();
    const cuenta = new XMLHttpRequest();
    elimi.open("POST", "js/eliminarP.php", true);
    elimi.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    elimi.send(php);
    xhttp.open("POST", "js/carrito.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send(php);
    cuenta.open("GET", "js/carrito2.php");
    cuenta.send();
    xhttp.onload = function () {
        document.getElementById("canvasCarrito").innerHTML = xhttp.responseText;
        document.getElementById("cantidadC").innerHTML = cuenta.responseText;
    }
}