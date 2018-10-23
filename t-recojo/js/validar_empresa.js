$(function(){


    $("#frm_pag_empresa").click(function(){

        var mensaje=validarFrmPagEmpresa();
        if(mensaje=='bien'){
            $(".content-load").css("visibility","visible");
            insertarFrmEmpresa();
        }else{
            mensajeDeErrorEmpresa("Se produjo un exepción",mensaje);
        }

    })

})

function insertarFrmEmpresa(){
        //alert($("#txtruc_empre").val());

        $.ajax({
            url:'http://trecojo.pe/dashboard/api/v1/company',
            method:"POST",
            data:{ruc:$("#ruc_empresa").val(),
                    first_name:$("#nom_dueno_empresa").val(),
                    last_name:$("#ape_dueno_empresa").val(),
                    phone:$("#cel_empresa").val(),
                    email:$("#email_empresa").val(),
                    pwd_company:$("#pass_confirm_empresa").val(),},
            dataType: 'JSON',
            success:function(data){
                    //console.log(data);
                    $(".content-load").css("visibility","hidden");
                     if(data.status == 500){
                        mensajeDeErrorEmpresa("Error","No se puedo completar el registro");
                    }else if(data.status == 201){
                         MensajeDeExitoEmpresa("Usted se registro con exito");
                         $("#ruc_empresa").val("");
                         $("#nom_dueno_empresa").val("");
                         $("#ape_dueno_empresa").val("");
                         $("#cel_empresa").val("");
                         $("#email_empresa").val("");
                         $("#pass_empresa").val("");
                         $("#pass_confirm_empresa").val("");
                    }else if(data.error == 'Número de RUC ya registrado'){
                        mensajeDeErrorEmpresa("Error",data.error);
                    }
            }
        })

    }

function validarFrmPagEmpresa(){

    var ruc=$("#ruc_empresa").val();
        var mensaje="";
        if(!isNaN(ruc)){

            if(ruc.length == 11){

                if($("#nom_dueno_empresa").val() != ""){

                    if($("#ape_dueno_empresa").val() != ""){

                        if($("#cel_empresa").val() != ""){

                            if($("#email_empresa").val() != ""){

                                if($("#pass_empresa").val() != ""){

                                    if($("#pass_confirm_empresa").val() != ""){

                                        if($("#pass_empresa").val() == $("#pass_confirm_empresa").val()){
                                            mensaje="bien";
                                        }else{
                                            mensaje="Las contraseñas no coinciden";
                                        }
                                    }else{
                                        mensaje="Debe confirmar su contraseña";
                                    }

                                }else{
                                    mensaje="Debe poner una contraseña";
                                }

                            }else{
                                mensaje="Debe poner su correo electrónico";
                            }

                        }else{
                            mensaje="Debe poner un número de celular";
                        }

                    }else{
                        mensaje="Debe poner sus apellidos";
                    }

                }else{
                    mensaje="Debe poner su nombre";
                }

            }else{
                mensaje="Número de ruc no valido";
            }
            
        }else{
            mensaje="Solo número en la casilla ruc";
        }

        return mensaje;

}
function MensajeDeExitoEmpresa(mensaje){

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
        //console.log("empresa");
        //location.href="cliente_empresa.php?user=company&id="+id;
    });
}

function mensajeDeErrorEmpresa(cabezera,mensaje){

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
