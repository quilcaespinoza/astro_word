$(function(){

		$("#iniciar_sesion").click(function(){

			if($("#txt_numcel").val() != "" && $("#txt_pass").val() != ""){

				if($("#txt_numcel").val() == $("#txt_pass").val()){

					cambiarPass();
				}else{
					validarLogin();
				}

			}else{
				validarLogin();
			}

			
		})

});


function cambiarPass(){

	$.ajax({

		url:"clases/verificarUsuario.php",
		type:"POST",
		data:{celular:$("#txt_numcel").val(),pass:$("#txt_pass").val()},
		success:function(data){
			//console.log(data);
			datos = JSON.parse(data);

			if(datos.status == '1'){
				location.href = "cambiar_pass.php?user="+datos.user+"&id="+datos.id;
			}else if(datos.status == '0'){
				avisoLogin("Usted aun no esta registrado");
			}
		}

	})


}



function validarLogin(){

	if($("#txt_numcel").val() != ""){

		if($("#txt_pass").val() != ""){



			$.ajax({

				url:"clases/inicio_sesion.php",
				type:"POST",
				data:{celular:$("#txt_numcel").val(),
					  pass:$("#txt_pass").val()},
				success:function(data){
						
					//console.log(data);

					if(Object.keys(data).length <= 50){
						//console.log("PASO"+" "+data);
						var datos = JSON.parse(data);
						if(datos.user == undefined && datos.id == undefined ){
							avisoLogin("Número de celular o contraseña incorrecto.");
						}else{
							location.href="cliente_empresa.php?user="+datos.user+"&id="+datos.id;
						}
						

					}else{
						//console.log("no paso"+" "+data);
						avisoLogin("Número de celular o contraseña incorrecto");
					}
				}

			})






		}else{
			avisoLogin("Contraseña requerida");
		}
	}else{
		avisoLogin("Ingrese número de celular");
	}



}

function avisoLogin(mensaje){

   if(!alertify.alertaError){
        alertify.dialog('alertaError',function factory(){
        return{
                build:function(){
                    var errorHeader = '<div class="alerta-peligro"><span class="fa fa-exclamation-triangle fa-2x" '
                    +    'style="vertical-align:middle;">'
                    + '</span> Aviso</div>';
                    this.setHeader(errorHeader);
                },
                prepare:function(){
                    this.elements.dialog.style.background="#ffc107";
                    this.elements.commands.close.style.color="#000";
                    this.elements.content.style.color="#000";
                    this.elements.footer.style.background="#ffc107";
                    this.__internal.buttons[0].element.style.color="#000";   
                }
            };
        },true,'alert');
    }
    alertify.alertaError(mensaje,function(){
        
    });

}