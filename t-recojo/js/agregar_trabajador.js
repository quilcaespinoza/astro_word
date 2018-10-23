$(function(){

    $("#agregar_trabajador").click(function(){

        var validar = validarFrmCliente();
        if(validar == 'bien'){
            $(".content-load").css("visibility","visible");
            agregarTrabajador();
        }else{
            alertaTrabajador(validar);
             //$(".content-load").css("visibility","visible");
        }

    })


})


function agregarTrabajador(){

    $.ajax({

        url:"http://localhost:8000/api/v1/add_clients_company_api",
        type:"POST",
        data: {

            first_name:$("#nom_trabajador").val(),
            last_name:$("#ape_trabajador").val(),
            phone:$("#cel_trabajador").val(),
            email:$("#email_trabajador").val(),
            address:$("#dir_trabajador").val(),
            departamento:$("#depa_trabajador").val(),
            provincia:$("#pro_trabajador").val(),
            distrito:$("#dis_trabajador").val(),
            id_company:$("#hiddenId_company").val()

        },
       dataType: 'JSON',
       success:function(data){
            $(".content-load").css("visibility","hidden");
            if(data.status == 500){
                alertaTrabajador("No se pudo agregar el registro");
            }else if(data.status == 201){
                mensajeTrabajador("Registro agregado correctamente")
            }
       }

    })

}


function validarFrmCliente(){
    var mensaje="";
     if($("#nom_trabajador").val() != ""){

            if($("#ape_trabajador").val() != ""){

                if($("#cel_trabajador").val() != ""){

                    if($("#email_trabajador").val() != ""){

                        if($("#dir_trabajador").val() != ""){

                            if($("#depa_trabajador").val() != ""){

                                if($("#pro_trabajador").val() != ""){

                                    if($("#dis_trabajador").val() != ""){

                                        mensaje="bien";

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

function mensajeTrabajador(mensaje){

   if(!alertify.mensajeTrabajador){
        alertify.dialog('mensajeTrabajador',function factory(){
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
    alertify.mensajeTrabajador(mensaje,function(){
       
    });
}

function alertaTrabajador(mensaje){

   if(!alertify.alertaTrabajador){
        alertify.dialog('alertaTrabajador',function factory(){
        return{
                build:function(){
                    var errorHeader = '<div class="alerta-error"><span class="fa fa-times-circle fa-2x" '
                    +    'style="vertical-align:middle;">'
                    + '</span> Error</div>';
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
    alertify.alertaTrabajador(mensaje,function(){
        
    });

}
