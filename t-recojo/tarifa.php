<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="./css/cabezera.css">
	<link href="https://fonts.googleapis.com/css?family=Muli" rel="stylesheet">
	<link rel="stylesheet" href="./css/tarifa.css">
	<link rel="stylesheet" href="./css/pie_pagina.css">
	<link rel="stylesheet" href="./font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="./bootstrap/css/glyphicon.css">
	<link rel="stylesheet" href="./css/loader.css">

	<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="./bootstrap/js/bootstrap.min.js"></script>
	<script src="./bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
	<link rel="stylesheet" href="./bootstrap-datepicker/css/bootstrap-datepicker.css">
	<script src="./bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
	<link rel="stylesheet" href="./bootstrap-timepicker/css/bootstrap-timepicker.min.css">
	<script src="./js/eventos.js"></script>
	<script src="./js/validar_tarifa.js"></script>
	<script src="./alertify/alertify.js"></script>
	<link rel="stylesheet" type="text/css" href="./alertify/css/alertify.css">
	<script src="./js/validar_login.js"></script>
	
	
</head>
<body>
	
	<?php include("plantillas/cabezera.php"); ?>
	<?php include("plantillas/loader.php"); ?>
<div class="contenedor-pag" id="contenedor-pag">
	<div class="tarifa">
		
		<div class="texto">
			<h5>En cualquier parte de la capital, T-RECOJO es tu mejor opción para trasladarte a tu destino, comodo y seguro.</h5>
		</div>
	</div>
	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="">Añadir paradas</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">

			<div class="form-group">
			    <label for="exampleInputEmail1"><strong>Parada</strong></label>
			    <input type="email" class="form-control form-control-sm" id="colFormLabelSm" placeholder="parada">
			 </div>
			 <div class="form-group">
			    <label for="exampleInputEmail1"><strong>Tiempo por parada</strong></label>
			    <select class="form-control form-control-sm" style="width: 50%;">
				  <option>15 mins</option>
				  <option>30 mins</option>
				  <option>45 mins</option>
				  <option>60 mins</option>
				</select>
			 </div>

	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn-parada">Añadir</button>
	      </div>
	    </div>
	  </div>
	</div>
	<div class="modal fade" id="modal_cliente"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="a123">Registro de Cliente</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="cerrar_modal_client">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">

			  <div class="form-group row">
			   
			    <div class="col-sm-12">
			      <input type="text" class="form-control form-control-sm" id="txtnom_clien" placeholder="Nombre">
			    </div>
			  </div>
			  <div class="form-group row">
			   
			    <div class="col-sm-12">
			      <input type="text" class="form-control form-control-sm" id="txtape_clien" placeholder="Apellido" >
			    </div>
			  </div>
			  <div class="form-group row">
			    
			    <div class="col-sm-12">
			      <input type="text" class="form-control form-control-sm" id="txtcel_clien" placeholder="Telefono" >
			    </div>
			  </div>
			  <div class="form-group row">
			   
			    <div class="col-sm-12">
			      <input type="email" class="form-control form-control-sm" id="txtmail_clien" placeholder="Email" >
			    </div>
			  </div>
			  <div class="form-group row">
			    
			    <div class="col-sm-12">
			      <input type="password" class="form-control form-control-sm" id="txtpass1_client" placeholder="Contraseña" >
			    </div>
			  </div>
			  <div class="form-group row">
			    
			    <div class="col-sm-12">
			      <input type="password" class="form-control form-control-sm" id="txtpass2_client" placeholder="Contraseña" >
			    </div>
			  </div>
			  <div class="form-group row">
			    
			    <div class="col-sm-12">
			      <input type="text" class="form-control form-control-sm" id="txtpro_clien" placeholder="Provincia" >
			    </div>
			  </div>
			   <div class="form-group row">
			    
			    <div class="col-sm-12">
			      <input type="text" class="form-control form-control-sm" id="txtdepa_clien" placeholder="Departamento" >
			    </div>
			  </div>
			  <div class="form-group row">
			    
			    <div class="col-sm-12">
			      <input type="text" class="form-control form-control-sm" id="txtdis_clien" placeholder="Distrito" >
			    </div>
			  </div>
			  <div class="form-group row">
			    
			    <div class="col-sm-12">
			      <input type="text" class="form-control form-control-sm" id="txtdir_clien" placeholder="Direccion" >
			    </div>
			  </div>
			  

			
			 
		
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn-parada" id="frm_cliente">Registrar</button>
	      </div>
	    </div>
	  </div>
	</div>

	<div class="modal fade" id="modal_empresa" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="a43">Registrar como empresa </h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="cerrar_modal_empresa">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">

			 <div class="form-group row">
			    
			    <div class="col-sm-12">
			      <input type="text" class="form-control form-control-sm" id="txtruc_empre" placeholder="Ingrese numero de Ruc">
			    </div>
			  </div>
			  <div class="form-group row">
			    
			    <div class="col-sm-12">
			      <input type="password" class="form-control form-control-sm" id="txtpass1_empre" placeholder="Contraseña">
			    </div>
			  </div>
			  <div class="form-group row">
			    
			    <div class="col-sm-12">
			      <input type="password" class="form-control form-control-sm" id="txtpass2_empre" placeholder="Confirmar Contraseña">
			    </div>
			  </div>
<!--			  <div class="form-group row">-->
<!--			    -->
<!--			    <div class="col-sm-12">-->
<!--			      <input type="text" class="form-control form-control-sm"  placeholder="Nombre o Razon Social" readonly="">-->
<!--			    </div>-->
<!--			  </div>-->
<!--			  <div class="form-group row">-->
<!---->
<!--			    <div class="col-sm-12">-->
<!--			      <input type="text" class="form-control form-control-sm"  placeholder="Estado" readonly="">-->
<!--			    </div>-->
<!--			  </div>-->
<!--			  <div class="form-group row">-->
<!---->
<!--			    <div class="col-sm-12">-->
<!--			      <input type="text" class="form-control form-control-sm"  placeholder="Departamento" readonly="">-->
<!--			    </div>-->
<!--			  </div>-->
<!--			  <div class="form-group row">-->
<!---->
<!--			    <div class="col-sm-12">-->
<!--			      <input type="text" class="form-control form-control-sm"  placeholder="Provincia" readonly="">-->
<!--			    </div>-->
<!--			  </div>-->
<!--			  <div class="form-group row">-->
<!---->
<!--			    <div class="col-sm-12">-->
<!--			      <input type="text" class="form-control form-control-sm"  placeholder="Distrito" readonly="">-->
<!--			    </div>-->
<!--			  </div>-->
<!--			  <div class="form-group row">-->
<!--			    <div class="col-sm-12">-->
<!--			      <input type="text" class="form-control form-control-sm"  placeholder="Direccion" readonly="">-->
<!--			    </div>-->
<!--			  </div>-->

			  <div class="form-group row">
			    
			    <div class="col-sm-12">
			      <input type="text" class="form-control form-control-sm" id="txtnom_empre" placeholder="Nombres">
			    </div>
			  </div>
			  <div class="form-group row">
			    
			    <div class="col-sm-12">
			      <input type="text" class="form-control form-control-sm" id="txtape_empre" placeholder="Apellidos">
			    </div>
			  </div>
			  <div class="form-group row">
			   
			    <div class="col-sm-12">
			      <input type="email" class="form-control form-control-sm" id="txtmail_empre" placeholder="Email">
			    </div>
			  </div>
			  <div class="form-group row">
			    
			    <div class="col-sm-12">
			      <input type="text" class="form-control form-control-sm" id="txtcel_empre" placeholder="Celular">
			    </div>
			  </div>
<!--			  <div class="form-group row">-->
<!--			    <label for="inputPassword" class="col-sm-2 col-form-label label">Estado</label>-->
<!--			    <div class="col-sm-12">-->
<!--			      <input type="checkbox" >-->
<!--			    </div>-->
<!--			  </div>-->

	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn-parada" id="frm_empresa">Registrar</button>
	      </div>
	    </div>
	  </div>
	</div>
	<div class="formulario">
		<div class="mensaje-courier" id="mensaje_courier">
			<div class="header-courier" >
				<span class="fa fa-suitcase fa-2x"></span>
				<label for="">Cabezera</label>
				<div class="cerrar-courier" id="cerrar_courier">
					<span class="fa fa-times"></span>
				</div>
			</div>
			<div class="body-courier">
				<p>Solo podra enviar objetos en esta opcion</p>
			</div>
			<div class="footer-courier">
				<button id="ok_courier">ok</button>
			</div>
		</div>
		<div class="formulario-solicitar">
			<div class="courier">
				<label for="">Habilitar Courier</label>
				<input type="checkbox" id="habilitar_courier">
			</div>
			<div class="caja-completa">
				<label for="">Seleccione Tipo de pago</label>
				<select class="form-control" id="tipo_pago_user">
					<option value="1">Contado</option>
					  <option value="2">Tarjeta</option>
					  <option value="3">Otros tipos</option>
				</select> 
			</div>
			<div class="caja-completa tipo_auto">
				<label for="">Seleccione Tipo auto</label>
				<select class="form-control" id="tipo_auto_reserva">
					<option value="1">Auto</option>
					  <option value="2">Camioneta</option>
					  <option value="3">Van</option>
					  <option value="4">Mini Van</option>
				</select> 
			</div>
			<div class="caja-doble">
				<label for="">Selecciona la fecha</label>
  				<input type="text" class="form-control ch-date" readonly="" id="fecha_reserva">
  				<span class="icono"><i class="glyphicon glyphicon-calendar"></i></span>
  				
			</div>
			<div class="caja-doble">
				<label for="">Seleccione la hora</label>
				<input type="text" class="form-control ch-time" readonly="" id="hora_reserva">
				<span class="icono"><i class="glyphicon glyphicon-time"></i></span>
				<!--<input type="text" class="form-control" id="formGroupExampleInput">-->
			</div>
			<div class="caja-completa">
				<label for="formGroupExampleInput">Recoger</label>
    			<input type="text" class="form-control destino_caja"  placeholder="Punto de partida" id="partida_reserva">
    			<button title="mi ubicacion" id="mi_ubicacion"><i class="fa fa-map-marker" aria-hidden="true"></i></button>
			</div>
			<div class="caja-completa">
				<label for="formGroupExampleInput">Destino</label>
    			<input type="text" class="form-control"  placeholder="Destino" id="destino_reserva">
			</div>
			<!--<div class="caja-doble-only">
				<label for="">Asientos para adultos</label>
				<select class="form-control" id="exampleFormControlSelect1">
					<option>Mustard</option>
					  <option>Ketchup</option>
					  <option>Barbecue</option>
				</select> 
			</div>-->
			<!--<div class="caja-doble-only">
				<label for="">Maletas</label>
				<select class="form-control" id="exampleFormControlSelect1">
					<option>Mustard</option>
					  <option>Ketchup</option>
					  <option>Barbecue</option>
				</select> 
			</div>-->
			<!--<div class="caja-doble">
				<button class="parada" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-stop-circle" aria-hidden="true"></i>¿Requiere alguna parada?</button>
				
			</div>-->
			 <div class="conten-boton">
			  	<button  class="button-primario" data-toggle="modal" data-target="#modal_empresa" id="btn_empresa">Cliente empresa</button>
			  	<button class="button-primario" data-toggle="modal" data-target="#modal_cliente" id="btn_cliente">Cliente persona</button>
			 </div>

		</div>
		<div class="mapa" id="_mapa"></div>

	</div>

	<div class="seleccionar-vehiculo">

		<div class="cabezera-seleccionar">
			<h4>Nuestros Vehículos</h4>
		</div>

		<div class="det-auto">
			<label for="" class="det-auto-tipo">Servicio estandar</label>
			<div class="img-auto">
				<img src="imagenes/carro.jpeg" alt="">	
			</div>
			<div class="conten-iconos">
				<div class="det-all">
					<span class="icono-1"><i class="fa fa-male" aria-hidden="true"></i></span>
					<span class="span"><!--<i class="fa fa-suitcase" aria-hidden="true"></i>-->5</span>
				</div>
				<div class="det-all">
					<span class="icono-1"><i class="fa fa-suitcase" aria-hidden="true"></i></span>
					<span class="span"><!--<i class="fa fa-suitcase" aria-hidden="true"></i>-->5</span>
				</div>
			</div>
			
			<!--<div class="precio">
				<label class="precio-auto">S/.123</label>-->
				<!--<a href="#">
				<button class="reservar-auto">Reservar Ahora</button>
				</a>
				
			</div>-->
		</div>

		<div class="det-auto">
			<label for="" class="det-auto-tipo">Servicio estandar</label>
			<div class="img-auto">
				<img src="imagenes/carro.jpeg" alt="">	
			</div>
			<div class="conten-iconos">
				<div class="det-all">
					<span class="icono-1"><i class="fa fa-male" aria-hidden="true"></i></span>
					<span class="span"><!--<i class="fa fa-suitcase" aria-hidden="true"></i>-->5</span>
				</div>
				<div class="det-all">
					<span class="icono-1"><i class="fa fa-suitcase" aria-hidden="true"></i></span>
					<span class="span"><!--<i class="fa fa-suitcase" aria-hidden="true"></i>-->5</span>
				</div>
			</div>
			
			<!--<div class="precio">
				<label class="precio-auto">S/.123</label>
				<a href="#">
				<button class="reservar-auto">Reservar Ahora</button>
				</a>
				
			</div>-->
		</div>

		<div class="det-auto">
			<label for="" class="det-auto-tipo">Servicio estandar</label>
			<div class="img-auto">
				<img src="imagenes/carro.jpeg" alt="">	
			</div>
			<div class="conten-iconos">
				<div class="det-all">
					<span class="icono-1"><i class="fa fa-male" aria-hidden="true"></i></span>
					<span class="span"><!--<i class="fa fa-suitcase" aria-hidden="true"></i>-->5</span>
				</div>
				<div class="det-all">
					<span class="icono-1"><i class="fa fa-suitcase" aria-hidden="true"></i></span>
					<span class="span"><!--<i class="fa fa-suitcase" aria-hidden="true"></i>-->5</span>
				</div>
			</div>
			
			<!--<div class="precio">
				<label class="precio-auto">S/.123</label>
				<a href="#">
				<button class="reservar-auto">Reservar Ahora</button>
				</a>
			</div>-->
		</div>
		
	</div>
</div>

	<?php include("plantillas/pie_pagina.php"); ?>
	
	
</body>
</html>
<script src="./js/ajax.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCFvlWVseUS7WSNqH5XPfyN4R5wUE0ofAs&libraries=places"></script>
<script src="./js/mapa.js?body=1" type="text/javascript"></script>

<script>
	$('.ch-date').datepicker({
    format: "yyyy/mm/dd",
    	autoclose: true
	});

	 $('.ch-time').timepicker({
        use24hours: true,
		format: 'HH:mm'
    });
</script>