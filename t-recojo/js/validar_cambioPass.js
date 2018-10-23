
$(function(){

    $("#validar_pass").click(function(){
    
        valid = validar_cambio();
        if(valid){
            cambiarPassword($(this).val());
        }else{

        }

    })


})


function cambiarPassword(idConfirm){


    $.ajax({

        url:"clases/cambiarPassword.php",
        type:"POST",
        data:{password:$("#nueva_pass").val(),idConfirm:idConfirm},
        success:function(data){
            //console.log(data);
            datos = JSON.parse(data);
            exitoCambioPass("Contraseña cambiada,Ahora debe iniciar sesion nuevamente");
        }

    })

}


function validar_cambio(){

	var pass = document.getElementById("nueva_pass").value;
	var confirm_pass = document.getElementById("confirm_pass").value;

        if(pass != ""){

            if(confirm_pass != ""){

                    if(pass == confirm_pass){
                    
                        if(!isNaN(pass)){
                            avisoCambioPass("Debe incluir al menos una letra en su clave");
                            return false;
                            
                        }else {

                            if(pass.length < 8){
                                avisoCambioPass("Su contraseña debe tener por lo menos 8 caracteres");
                                return false;
                            }else{
                                return true;
                            }

                        }

                   }else{
                        avisoCambioPass("Las contraseñas no coinciden");
                        return false;
                    }

            }else{
                avisoCambioPass("Debe confirmar su contraseña");
                return false;
            }

        }else{
            avisoCambioPass("Debe poner una nueva contraseña");
            return false;
        }
    	

}

function avisoCambioPass(mensaje){

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

function exitoCambioPass(mensaje){

   if(!alertify.exitoCambioPass){
        alertify.dialog('exitoCambioPass',function factory(){
        return{
                build:function(){
                    var errorHeader = '<div class="alerta-exito"><span class="fa fa-check-circle fa-2x" '
                    +    'style="vertical-align:middle;">'
                    + '</span> contraseña cambiada</div>';
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
    alertify.exitoCambioPass(mensaje,function(){
        location.href="index.php";
    });

}