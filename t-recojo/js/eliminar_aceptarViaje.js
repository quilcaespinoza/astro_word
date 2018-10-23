$(function(){


	$(".aceptar-viaje").click(function(){
		//console.log($(this).val());
		aceptar_viaje( $(this).val(),$(this).attr("id"));
        //
	
		  
	})

	$(".cancelar-viaje").click(function(){
		confirmarViaje("¿Seguro que desea cancelar este viaje?",$(this).val(),$(this).attr("id"));
       
	})

})


function confirmarViaje(mensaje,idConfirm,boton){
var status;
   if(!alertify.alertaBorrar){
        alertify.dialog('alertaBorrar',function factory(){
        return{
                build:function(){
                    var errorHeader = '<div class="alerta-peligro"><span class="fa fa-exclamation-triangle fa-2x fa-2x" '
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
                    this.__internal.buttons[0].element.style.color="#000";      
                }
            };
        },true,'confirm');
    }
    alertify.alertaBorrar(mensaje,function(){
        
    	
    	asinAjax("clases/eliminar_viaje.php",idConfirm)
        .done(function(data){

                data = JSON.parse(data);
                if(data.status == '1'){
                    alertify.success('Viaje eliminado');
                    location.href = "cliente_empresa.php?user="+data.user+"&id="+data.idUser;
                }else if(data.status == '0'){
                    alertify.error('No se completo la acción');
                }

            });
          

    },function(){ 

    	
    	alertify.error('Cancelado');

    });

}

function asinAjax(url,data){

    var ajax = $.ajax({

        "url":url,
        "method":"POST",
        "data":{idConfirm:data}

    })

    return ajax;
}


function aceptar_viaje(idConfirm,boton){

   
	$.ajax({

		url:"clases/aceptar_viaje.php",
		type:"POST",
		data:{idConfirm:idConfirm},
		success:function(data){
			
           var data = JSON.parse(data);
            if(data.status == '1'){
                $("#"+boton).css("display","none");
                $("."+boton).css("display","block");
                alertify.success("Viaje confirmado");
            }else if(data.status == '0'){
                alertify.error("Su viaje no se pudo confirmar");
            }
             
		}

	});

}


