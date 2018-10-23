    

    frm_cliente.addEventListener('click',function(){

        
        var mensaje=validarFrmCliente();
        if(mensaje=='bien'){
            
            $(".content-load").css("visibility","visible");
            var h = $("#hora_reserva").val();
                $.ajax({

                    url:"clases/formato.php",
                    type:"POST",
                    data:{h:h},
                    success:function(data){
                       // console.log(data);
                        insertarCliente(data);
                       
                    }

                })


        }else{
            alertaDeError("Se produjo un exepcion",mensaje);
        }
        
    })

    frm_empresa.addEventListener('click',function(){

        var mensaje = validarFrmEmpresa();
        if(mensaje == "bien"){

            $(".content-load").css("visibility","visible");
            var h = $("#hora_reserva").val();
                $.ajax({

                    url:"clases/formato.php",
                    type:"POST",
                    data:{h:h},
                    success:function(data){
                       // console.log(data);
                       insertarEmpresa(data);
                       
                    }

                })
            
        }else{
            alertaDeError("Se produjo una error",mensaje);
        }

    })

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



function reservarViajeEmpresa(hora,id){

        $.ajax({
            url:'http://trecojo.pe/dashboard/api/v1/addRequestCompany',
            method:"POST",
            data:{company_id:id,
                    payment_type_id:$("#tipo_pago_user").val(),
                    start_address:$("#partida_reserva").val(),
                    end_address:$("#destino_reserva").val(),
                    date_arrive:$("#fecha_reserva").val()+" "+hora,
                    id_type_car:$("#tipo_auto_reserva").val()},
            dataType: 'JSON',
            success:function(data){
                   // console.log(data);
                    if(data.status == 500){
                        alertaDeError("Error","No se pudo completar la reserva");
                    }else if(data.status == 201){
                         alertagood("Su reserva fue enviada");
                    }
            }
        })

}


    function reservarViajeCliente(hora,id){

        $.ajax({
            url:'http://trecojo.pe/dashboard/api/v1/addRequestClient',
            method:"POST",
            data:{client_id:id,
                    payment_type_id:$("#tipo_pago_user").val(),
                    date_arrive:$("#fecha_reserva").val()+" "+hora,
                    start_address:$("#partida_reserva").val(),
                    end_address:$("#destino_reserva").val(),
                    id_type_car:$("#tipo_auto_reserva").val()},
            dataType: 'JSON',
            success:function(data){
                    //console.log(data);
                     if(data.status == 500){
                        alertaDeError("Error","No se pudo completar la reserva");
                    }else if(data.status == 201){
                         miAlertaPersonal("Su reserva fue enviada");
                    }
            }
        })

}


    function insertarEmpresa(hora){
        //alert($("#txtruc_empre").val());

        $.ajax({
            url:'http://trecojo.pe/dashboard/api/v1/company',
            method:"POST",
            data:{ruc:$("#txtruc_empre").val(),
                    first_name:$("#txtnom_empre").val(),
                    last_name:$("#txtape_empre").val(),
                    phone:$("#txtcel_empre").val(),
                    email:$("#txtmail_empre").val(),
                    pwd_company:$("#txtpass1_empre").val(),},
            dataType: 'JSON',
            success:function(data){
                    //console.log(data);
                    $(".content-load").css("visibility","hidden");
                     if(data.status == 500){
                        alertaDeError("Error","No se pudo completar el registro empresa");
                    }else if(data.status == 201){

                         alertaDeExitoEmpresa(data.id_user,"Usted se registro con exito empresa");
                         reservarViajeEmpresa(hora,data.id_user);
                         $("#txtruc_empre").val("");
                        $("#txtnom_empre").val("");
                        $("#txtpass1_empre").val("");
                        $("#txtpass2_empre").val("");
                        $("#txtape_empre").val("");
                        $("#txtmail_empre").val("");
                        $("#txtcel_empre").val("");
                    }else if(data.error == 'Número de RUC ya registrado'){
                        alertaDeError("Error",data.error);
                    }
            }
        })

    }

    function miAlertaPersonal(mensaje){

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


    function insertarCliente(data_hora){

        $.ajax({

            url: 'http://trecojo.pe/dashboard/api/v1/user',
            method:"POST",
            data:{
                    first_name:$("#txtnom_clien").val(),
                    last_name:$("#txtape_clien").val(),
                    phone:$("#txtcel_clien").val(),
                    email:$("#txtmail_clien").val(),
                    address:$("#txtdir_clien").val(),
                    departamento:$("#txtdepa_clien").val(),
                    provincia:$("#txtpro_clien").val(),
                    distrito:$("#txtdis_clien").val(),
                    pwd_client:$("#txtpass1_client").val()
            },
            dataType: 'JSON',
            success:function(data){
                   // console.log(data);
                   $(".content-load").css("visibility","hidden");
                    if(data.status == 500){
                         alertaDeError("Error","No se pudo completar el registro");
                    }else if(data.status == 201){
                         reservarViajeCliente(data_hora,data.id_user);
                         alertaDeExitoCliente(data.id_user,"Usted se registro con exito");
                         $("#txtnom_clien").val("");
                        $("#txtape_clien").val("");
                        $("#txtcel_clien").val("");
                        $("#txtmail_clien").val("");
                        $("#txtpass1_client").val("");
                        $("#txtpass2_client").val("");
                        $("#txtpro_clien").val("");
                        $("#txtdepa_clien").val("");
                        $("#txtdis_clien").val("");
                        $("#txtdir_clien").val("");
                    }
            }

        })

    }


function alertaDeError(cabezera,mensaje){

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

function alertaDeExitoCliente(id,mensaje){

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
        //console.log("cliente"+id);
        location.href="cliente_empresa.php?user=client&id="+id;
    });
}


function alertagood(mensaje){

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
       // console.log("empresa");
        //location.href="cliente_empresa.php?user=company&id="+id;
    });
}


function alertaDeExitoEmpresa(id,mensaje){

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
        //console.log("empresa");
        location.href="cliente_empresa.php?user=company&id="+id;
    });
}

function validarFrmCliente(){
    var mensaje="";
     if($("#txtnom_clien").val() != ""){

            if($("#txtape_clien").val() != ""){

                if($("#txtcel_clien").val() != ""){

                    if($("#txtmail_clien").val() != ""){

                        if($("#txtdir_clien").val() != ""){

                            if($("#txtdepa_clien").val() != ""){

                                if($("#txtpro_clien").val() != ""){

                                    if($("#txtdis_clien").val() != ""){

                                        if($("#txtpass1_client").val() != ""){
                                            
                                            if($("#txtpass2_client").val() != ""){

                                                if($("#txtpass1_client").val() == $("#txtpass2_client").val()){

                                                    mensaje="bien";

                                                }else{
                                                    mensaje="Las contraseñas no coinciden, inténtelo de nuevo";
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
                            mensaje="Debe poner su dirección";
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

function validarFrmEmpresa(){

    var ruc=$("#txtruc_empre").val();
        var mensaje="";
        if(!isNaN(ruc)){

            if(ruc.length == 11){

                if($("#txtnom_empre").val() != ""){

                    if($("#txtape_empre").val() != ""){

                        if($("#txtcel_empre").val() != ""){

                            if($("#txtmail_empre").val() != ""){

                                if($("#txtpass1_empre").val() != ""){

                                    if($("#txtpass2_empre").val() != ""){

                                        if($("#txtpass1_empre").val() == $("#txtpass2_empre").val()){
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
                    mensaje="Debe poner su nombres";
                }

            }else{
                mensaje="Número de ruc no valido";
            }
            
        }else{
            mensaje="solo números en la casilla ruc";
        }

        return mensaje;

}