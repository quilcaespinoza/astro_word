$(function(){

	$("#reservar_como_empresa").click(function(){

		var mensaje =validarFrm();
		if(mensaje == 'bien'){
            $(".content-load").css("visibility","visible");
			var h = $("#txt_hora").val();
				$.ajax({

					url:"clases/formato.php",
					type:"POST",
					data:{h:h},
					success:function(data){
						//console.log(data);
						reservarViajeUsuarioEmpresa(data);
					}

				})

			}else{
				MensajedeError("se produjo una exepcion",mensaje);
			}
				
	})

	$("#reservar_como_cliente").click(function(){

		var mensaje =validarFrm();
		if(mensaje == 'bien'){
            $(".content-load").css("visibility","visible");
			var h = $("#txt_hora").val();
				$.ajax({

					url:"formato.php",
					type:"POST",
					data:{h:h},
					success:function(data){
						//console.log(data);
						reservarViajeUsuarioEmpresa(data);
                         $("#txt_fecha").val("");
                         $("#partida").val("");
                         $("#destino").val("");
                         $("#tipo_pago option[value='1']").attr("selected",true);
                         $("#tipo_auto option[value='1']").attr("selected",true);
                         $("#select_trabajador option[value='1']").attr("selected",true);
					}

				})
				
			}else{
				MensajedeError("se produjo una exepcion",mensaje);
			}
	})


})


function reservarViajeUsuarioEmpresa(hora){

		$.ajax({
            url:'http://trecojo.pe/dashboard/api/v1/addRequestCompany',
            method:"POST",
            data:{company_id:$("#id_empresa_cliente").val(),
                    payment_type_id:$("#tipo_pago").val(),
                    start_address:$("#partida").val(),
                    end_address:$("#destino").val() ,
                    date_arrive:$("#txt_fecha").val()+" "+hora,
                    id_type_car:$("#tipo_auto").val()},
            dataType: 'JSON',
            success:function(data){
                    //console.log(data);
                    $(".content-load").css("visibility","hidden");
                    if(data.status == 500){
                        MensajedeError("Error","No se pudo completar el registro");
                    }else if(data.status == 201){
                         MensajedeExito("Su reserva fue enviada");
                         $("#txt_fecha").val("");
                         $("#partida").val("");
                         $("#destino").val("");
                         $("#tipo_pago option[value='1']").attr("selected",true);
                         $("#tipo_auto option[value='1']").attr("selected",true);
                    }
            }
        })

}

function reservarViajeUsuarioCliente(hora){

		$.ajax({
            url:'http://trecojo.pe/dashboard/api/v1/addRequestClient',
            method:"POST",
            data:{client_id:$("#id_empresa_cliente").val(),
                    payment_type_id:$("#tipo_pago").val(),
                    date_arrive:$("#txt_fecha").val()+" "+hora,
                    start_adress:$("#partida").val(),
                    end_address:$("#destino").val(),
                    id_type_car:$("#tipo_auto").val()},
            dataType: 'JSON',
            success:function(data){
                    //console.log(data);
                    $(".content-load").css("visibility","hidden");
                     if(data.status == 500){
                        MensajedeError("Error","No se pudo completar el registro");
                    }else if(data.status == 201){
                         MensajedeExito("Su reserva fue enviada");


                                $("#txt_fecha").val("");

                                $("#txt_hora").val("");

                                 $("#partida").val("");

                                 $("#destino").val("");
                    }
            }
        })


}


function MensajedeError(cabezera,mensaje){

   if(!alertify.alertaError){
        alertify.dialog('alertaError',function factory(){
        return{
                build:function(){
                    var errorHeader = '<div class="alerta-error"><span class="fa fa-times-circle fa-2x" '
                    +    'style="vertical-align:middle;">'
                    + '</span>'+' '+cabezera+'</div>';
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
        //console.log("asdasdasd");
    });

}

function MensajedeExito(mensaje){

   if(!alertify.errorAlert){
        alertify.dialog('alertaExito',function factory(){
        return{
                build:function(){
                    var errorHeader = '<div class="alerta-exito"><span class="fa fa-check-circle fa-2x" '
                    +    'style="vertical-align:middle;">'
                    + '</span>Mensaje</div>';
                    this.setHeader(errorHeader);
                },
                prepare:function(){
                    this.elements.dialog.style.background="#28a745"
                    this.elements.footer.style.background="#28a745";
                    this.__internal.buttons[0].element.style.color="#28a745";   
                }
            };
        },true,'alert');
    }
    alertify.alertaExito(mensaje,function(){
        //location.href="index.php";
        //console.log("cliente"+id);
        //location.href="cliente_empresa.php?user=client&id="+id;
    });
}

function validarFrm(){

	var mensaje="";

	if($("#txt_fecha").val() != ""){

		if($("#txt_hora").val() != ""){

			if($("#partida").val() != ""){

				if($("#destino").val() != ""){

						mensaje="bien";

				}else{
					mensaje="La caja destino no debe quedar vacia";
				}

			}else{
				mensaje="La caja partida no debe quedar vacia";
			}

		}else{
			mensaje="Debe poner una hora espesifica";
		}

	}else{
		mensaje="Debe elegir una fecha";
	}

	return mensaje;

}