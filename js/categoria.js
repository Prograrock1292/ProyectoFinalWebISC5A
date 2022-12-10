function filtrar() {
    const filtro = new XMLHttpRequest();
    var filtroApl;
    var filtroCat = document.getElementsByName("radioCat");
    //console.log(filtroCat[0].checked);
    for(let i=0; i<filtroCat.length; i++){
        if(filtroCat[i].checked==true){
            filtroApl = filtroCat[i].value;
        }
    }
    console.log(filtroApl);
    const mandar = new XMLHttpRequest();
    php = "categoria="+filtroApl;
    console.log(php);
    mandar.open("POST", "js/filtrar.php", true);
    mandar.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    mandar.send(php);
    mandar.onload = function() {
        document.getElementById('tienda').innerHTML = mandar.responseText;
    }
}