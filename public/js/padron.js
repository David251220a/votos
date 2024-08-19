$(document).ready(function(){  

    // var ventana_alto =$(window).height();
    // var ventana_ancho =$(window).width();

    // if(ventana_alto >= 600  && ventana_ancho >= 600){

    //     $("#pantalla_grande").css("display", "block");
    //     $("#pantalla_pequeno").css("display", "none");

    // }else{

    //     $("#pantalla_grande").css("display", "none");
    //     $("#pantalla_pequeno").css("display", "block");

    // }

    // $(window).resize(function() {
    //     var ventana_alto1 =$(window).height();
    //     var ventana_ancho1 =$(window).width();

    //     if((ventana_alto1 > 600 ) && (ventana_ancho1 > 600)){

    //         $("#pantalla_grande").css("display", "block");
    //         $("#pantalla_pequeno").css("display", "none");

    //     }else{

    //         $("#pantalla_grande").css("display", "none");
    //         $("#pantalla_pequeno").css("display", "block");

    //     }
        
    // });
    document.querySelectorAll('input').forEach(input => {
        input.addEventListener('keydown', function(event) {
            // Comprobar si la tecla presionada es Enter
            if (event.key === 'Enter') {
                event.preventDefault(); // Evitar el submit del formulario
            }
        });
    });
    
    $("#btn_ver").on('click',function(event){
        
        var isVisible = $('.ver').is(":visible");

        if(isVisible == true){

            $('.ver').css("display", "none");
            $('.centro').css("text-align", "center");

        }else{
            
            $('.ver').css("display", "block");
            $('.centro').css("text-align", "center");

        }
        
    });

    // $("#btn_ver1").on('click',function(event){
        
    //     var isVisible = $('.ver1').is(":visible");

    //     if(isVisible == true){

    //         $('.ver1').css("display", "none");
    //         $('.centro1').css("text-align", "center");

    //     }else{
            
    //         $('.ver1').css("display", "block");
    //         $('.centro1').css("text-align", "center");

    //     }
        
    // });
    
});