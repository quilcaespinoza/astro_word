$(function(){

    $("#btn_frm_cliente").click(function(){

        var mensaje=validarFrmPublico();
        if(mensaje=='bien'){
            $(".content-load").css("visibility","visible");
            insertarCliente();
        }else{
            mensajeDeErrorPublico("Se produjo un exepción",mensaje);
        }

    })

})


function insertarCliente(){

        $.ajax({

            url: 'http://trecojo.pe/dashboard/api/v1/user',
            method:"POST",
            data:{
                    first_name:$("#nom_client").val(),
                    last_name:$("#ape_client").val(),
                    phone:$("#telef_client").val(),
                    email:$("#email_client").val(),
                    address:$("#dir_client").val(),
                    departamento:$("#depa_client").val(),
                    provincia:$("#prov_client").val(),
                    distrito:$("#distr_client").val(),
                    pwd_client:$("#confirm_pass_client").val()
            },
            dataType: 'JSON',
            success:function(data){
                    //console.log(data);
                    $(".content-load").css("visibility","hidden");
                    if(data.status == 500){
                         mensajeDeErrorPublico("Error","No se pudo completar el registro");
                    }else if(data.status == 201){
                         alertaDeExitoPublico(data.id_user,"Usted se registro con éxito, ");
                         $("#nom_client").val("");
                         $("#ape_client").val("");
                         $("#email_client").val("");
                         $("#dir_client").val("");
                         $("#depa_client").val("");
                         $("#prov_client").val("");
                         $("#distr_client").val("");
                         $("#pass_client").val("");
                         $("#confirm_pass_client").val("");

                    }
            }

        })

    }





function validarFrmPublico(){
    var mensaje="";
     if($("#nom_client").val() != ""){

            if($("#ape_client").val() != ""){

                if($("#telef_client").val() != ""){

                    if($("#email_client").val() != ""){

                        if($("#dir_client").val() != ""){

                            if($("#depa_client").val() != ""){

                                if($("#prov_client").val() != ""){

                                    if($("#distr_client").val() != ""){

                                        if($("#pass_client").val() != ""){
                                            
                                            if($("#confirm_pass_client").val() != ""){

                                                if($("#pass_client").val() == $("#confirm_pass_client").val()){

                                                    mensaje="bien";

                                                }else{
                                                    mensaje="Las contraseñas no coinciden, intentelo de nuevo";
                                                }

                                            }else{
                                                mensaje="Debe confirmar su contraseña";
                                            }

                                        }else{
                                            mensaje="Debe poner una contraseña";
                                        }

                                    }else{
                                        mensaje="Caja distrito vacía";
                                    }

                                }else{
                                    mensaje="Caja provincia vacía";
                                }

                            }else{
                                mensaje="Caja departamento vacía";
                            }

                        }else{
                            mensaje="Debe poner su direccion";
                        }

                    }else{
                        mensaje="Debe poner su correo electrónico";
                    }

                }else{
                    mensaje="Debe poner su número de celular";
                }

            }else{
                mensaje="Debe poner sus apellidos";
            }
            
        }else{
            mensaje="Debe poner su nombre";
        }

        return mensaje;
}

function alertaDeExitoPublico(id,mensaje){

   if(!alertify.errorAlert){
        alertify.dialog('alertaExito',function factory(){
        return{
                build:function(){
                    var errorHeader = '<div class="alerta-exito"><span class="fa fa-check-circle fa-2x" '
                    +    'style="vertical-align:middle;">'
                    + '</span> Mensaje</div>';
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
       // console.log("cliente"+id);
        //location.href="cliente_empresa.php?user=client&id="+id;
    });
}
function mensajeDeErrorPublico(cabezera,mensaje){

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
       // console.log("asdasdasd");
    });

}