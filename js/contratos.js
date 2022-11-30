$(document).ready(function(){
		
    //Evento que se lanza al pulsar el botón, para agregar un contrato
    $('#btnAgregarContrato').click(function(){
        $("#tablaContratos").css("display", "none");
        $("#tabsContratos").css("display", "inline-block");
    });
    
    //Evento que se lanza al pulsar el botón, para volver a la tabla de contratos
    $('#volverTabs').click(function(){
        $("#tabsContratos").css("display", "none");
        $("#tablaContratos").css("display", "inline-block");
    });	 

});
