$(function(){

	$("#btn_empresa").click(function(){
		
		var mensaje = habilitar_botones();
		if(mensaje == 'habilita'){
			return true;
		}else{
			avisoFrm("Debe llenar todos los campos");
			return false;
		}

	})


	$("#btn_cliente").click(function(){
		
		var mensaje = habilitar_botones();
		if(mensaje == 'habilita'){
			return true;
		}else{
			avisoFrm("Debe llenar todos los campos");
			return false;
		}

	})

})


function avisoFrm(mensaje){

   if(!alertify.alertaError){
        alertify.dialog('alertaError',function factory(){
        return{
                build:function(){
                    var errorHeader = '<div class="alerta-error"><span class="fa fa-times-circle fa-2x" '
                    +    'style="vertical-align:middle;">'
                    + '</span> Aviso</div>';
                    this.setHeader(errorHeader);
                },
                prepare:function(){
                    this.elements.dialog.style.background="#dc3545"
                    this.elements.footer.style.background="#dc3545";
                    this.__internal.buttons[0].element.style.color="#dc3545";   
                }
            };
        },true,'alert');
    }
    alertify.alertaError(mensaje,function(){
        
    });

}

function habilitar_botones(){

	var mensaje="";
	if($("#fecha_reserva").val() != ""){

		if($("#partida_reserva").val() != ""){

			if($("#destino_reserva").val() != ""){

				mensaje="habilita";

			}else{
				mensaje="deshabilita";
			}

		}else{
			mensaje="deshabilita";
		}

	}else{
		mensaje="deshabilita";
	}

	

	return mensaje;

}