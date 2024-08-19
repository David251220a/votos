
$(document).ready(function () {
    document.querySelectorAll('input').forEach(input => {
        input.addEventListener('keydown', function(event) {
            // Comprobar si la tecla presionada es Enter
            if (event.key === 'Enter') {
                event.preventDefault(); // Evitar el submit del formulario
            }
        });
    });

    $('.voto_general').keyup(function() {                                
        var importe_total = 0;
        $(".voto_general").each(
            function(index, value) {
                if ( $.isNumeric($(this).val()) ){
                    importe_total += parseInt($(this).val());
                }
            }
        );
        $("#total_votos").val(importe_total);
    });

    $('.voto_inte').keyup(function() {                                
        var importe_total = 0;
        $(".voto_inte").each(
            function(index, value) {
                if ( $.isNumeric($(this).val()) ){
                    importe_total += parseInt($(this).val());
                }
            }
        );
        $("#total_votos").val(importe_total);
    });

});

function suma(dato)
{     
    let nuevoId = dato.id.match(/[0-9]+/g);
    let numero = nuevoId[0];    
    let sumaTotal = 0; 
    let nombre = 'total_' + numero;
    let nombre_class = 'input.voto_' + numero;
    let inputs = document.querySelectorAll(nombre_class);        
    inputs.forEach(input => {
        sumaTotal += parseFloat(input.value) || 0;
    });

    document.getElementById(nombre).value = sumaTotal;       
}