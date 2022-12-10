function filtrar() {
    const filtro = new XMLHttpRequest();
    var filtroCat = ("input[type=radio][name=radioCat]:checked").val;
    console.log(filtroCat);
    filtro.onload = function() {
        /*var filtroCat = $("input[type=radio][name=radioCat]:checked").val;
        console.log(filtroCat);*/
    }
}