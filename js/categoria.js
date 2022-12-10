function filtrar() {
    /*const filtro = new XMLHttpRequest();
    var filtroCat = ("input[type=radio][name=radioCat]:checked").val;
    console.log(filtroCat);
    filtro.onload = function() {
        var filtroCat = $("input[type=radio][name=radioCat]:checked").val;
        console.log(filtroCat);
    }*/
    $(document).ready(function() {
        $('button').click(function() {
            var value = $("input[type=radio][name=contact]:checked").val();
            if (value) {
                alert(value);
            }
            else {
                alert('Nothing is selected');
            }
        })
    });
}