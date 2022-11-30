$(document).ready(function(){
		
    //Evento que se lanza al pulsar el botón, para agregar un Usuario
    $('#btnAgregarnuevousuario').click(function(){

        datos=$('#frmnuevousuario').serialize();
        var pass1 = document.getElementById("pass1").value;
        var pass2 = document.getElementById("pass2").value;
        //Verificación de contraseñas
        if(pass1 === pass2){

               $.ajax({
                   type:"POST",
                   data:datos,
                   url:"../procesos/agregarUsuario.php",
                   success:function(r){
                       if(r){
                           $('#frmnuevousuario')[0].reset();
                           location.reload();
                           alertify.success("Agregado con Éxito :D");
                       }else{
                           alertify.error("Fallo al agregar :(");
                       }			            
                   }
               });
        }else{
               alertify.error("Las contraseñas no coinciden.");
        }
    });	 

    //Evento que se lanza al pulsar el botón, para actualizar un Usuario
	$('#btnActualizarUsuario').click(function(){

        datos=$('#frmnuevousuarioU').serialize();
        var pass1 = document.getElementById("pass1U").value;
        var pass2 = document.getElementById("pass2U").value;
        //Verificación de contraseñas
       if(pass1 === pass2){

           $.ajax({
               type:"POST",
               data:datos,
               url:"../procesos/actualizarUsuario.php",
               success:function(r){
                   if(r){
                        location.reload();
                        alertify.success("Actualizado con Éxito :D");
                   }else{
                       alertify.error("Fallo al actualizar :(");
                   }			            
               }
           });
        }else{
           alertify.error("Las contraseñas no coinciden.");
        }
    });	
    
    //Evento que detecta si se modifica la contraseña
	$("#pass1U").on("change keyup paste", function(){
		cambiarPass();
	});

});


//Elimina un usuario (Tiene confirmación!!!)
function eliminarDatosUsuario(id_usuario){
	alertify.confirm('Eliminar un Usuario', '¿Seguro que quieres eliminar este usuario ?', function(){ 
		$.ajax({
			type:"POST",
			data:"id_usuario=" + id_usuario,
			url:"../procesos/eliminarUsuario.php",
			success:function(r){
				if(r){
					location.reload();
					alertify.success("Eliminado con exito !");
				}else{
					alertify.error("No se pudo eliminar...");
				}
			}
		});
	}
	, function(){
	});
}

//Se agrega el formulario para actualizar un usuario especifico con sus datos iniciales
function agregaFrmActualizarUsuario(idusuario){
		
	$.ajax({
		type:"POST",
		data:"idusuario=" + idusuario,
		url:"../procesos/obtenDatosUsuario.php",
		success:function(r){
			datos=jQuery.parseJSON(r);
			$('#idU').val(datos['id_usuario']);
			$('#nombreU').val(datos['nombre']);
			$('#pass1U').val(datos['pass']);
			$('#pass2U').val(datos['pass']);
			$('#mailU').val(datos['mail']);
            $('#perfilU').val(datos['perfil']);
			$('#passchange').val("0");
		}
	});
}

//Función que detecta que se ha tecleado en el campo contraseña
function cambiarPass(){
	let contenedor = document.getElementById('passchange');
	contenedor.value = "1";
}