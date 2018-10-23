$(function(){

	$("#abrir-nav").click(function(){
		setTimeout(function() {
		    $(".menu-nav-res").fadeIn(250);
		},250);
		$(".menu-nav").css('right','0px');
	})

	$("#cerrar-nav").click(function(){
		$(".menu-nav").css('right','-320px');
		setTimeout(function() {
		    $(".menu-nav-res").fadeOut(250);
		},250);
	})

	$("#btn_salir_login").click(function(){

		location.href = "index.php";
	})

	$("#cerrar_modal_client").click(function(){

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

			 //alertify.alert("Alerta","This es una alerta dialog.", function(){});

		})

	$("#cerrar_modal_empresa").click(function(){

		$("#txtruc_empre").val("");
		$("#txtnom_empre").val("");
		$("#txtpass1_empre").val("");
		$("#txtpass2_empre").val("");
		$("#txtape_empre").val("");
		$("#txtmail_empre").val("");
		$("#txtcel_empre").val("");
		//alertaDeError2("Error de Aplon","Este es un mensaje");


	})
	var bandera=true;
	$(".sesion").click(function(){
		if(bandera){
			setTimeout(function() {
		    	$(".inicio-sesion").fadeIn(125);
			},125);
			bandera=false;
		}else{
			setTimeout(function() {
		    	$(".inicio-sesion").fadeOut(125);
			},125);
			limpiarCajaSesion();
			bandera=true;
		}
		
		return false;
	})

	$("#cerrar_inicio_sesion").click(function(){
		setTimeout(function() {
		    $(".inicio-sesion").fadeOut(125);
		},125);
		limpiarCajaSesion();
		bandera=true;
	})

	$("#modal-inicio-sesion").click(function(){
		
		setTimeout(function() {
		    	$(".inicio-sesion").fadeIn(125);
			},125);
		//alert(2);
		return false;
	})
	$(document).on("click",function(e) {

       
        var container = $("#div-inicio-sesion");
        var mensaje=$("#mensaje_courier");

            if (!container.is(e.target) && container.has(e.target).length === 0) { 
            	setTimeout(function() {
				    $(".inicio-sesion").fadeOut(125);
				},125);
				limpiarCajaSesion();
				bandera=true;
            }
  
   });

	$("#cerrar_sesion_usuario").click(function(){
		location.href = "clases/cerrar_sesion.php";
	})


	$("#habilitar_courier").click(function(){

		if($(this).is(':checked')){
				
				setTimeout(function(){
					$("#mensaje_courier").fadeIn(125);
					
				},125);
				$(".tipo_auto").css("display","none");

		}else{
			setTimeout(function(){
					$("#mensaje_courier").fadeOut(125);
				},125);
			$(".tipo_auto").css("display","block");
		}

	})
	$("#cerrar_courier").click(function(){
		setTimeout(function(){
					$("#mensaje_courier").fadeOut(125);
				},125)
	})
	$("#ok_courier").click(function(){
		setTimeout(function(){
					$("#mensaje_courier").fadeOut(125);
				},125)
	})






})    

function limpiarCajaSesion(){
	$("#txt_ruc_mail").val("");
	$("#txt_pass").val("");
}


/*alertaDeExito("Alerta de Exito","Este es un mensaje de exito");*/


