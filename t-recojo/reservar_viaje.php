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
	<link rel="stylesheet" href="./css/cliente_empresa.css">
	<link rel="stylesheet" href="./css/loader.css">

	<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="./bootstrap/js/bootstrap.min.js"></script>
	<script src="./bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
	<link rel="stylesheet" href="./bootstrap-datepicker/css/bootstrap-datepicker.css">
	<script src="./bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
	<link rel="stylesheet" href="./bootstrap-timepicker/css/bootstrap-timepicker.min.css">
	<script src="./js/eventos.js"></script>
	<script src="./alertify/alertify.js"></script>
	<link rel="stylesheet" type="text/css" href="./alertify/css/alertify.css">
</head>
<body>
	
	<?php include("plantillas/cabezera_usuario.php"); ?>
	<?php include("plantillas/loader.php"); ?>
	<?php 
		$user = htmlentities(addslashes($_GET["user"]));
		$id = htmlentities(addslashes($_GET["id"]));

	 ?>
<div class="contenedor-pag">
	<div class="tarifa">
		
		<div class="texto">
			<h5>En cualquier parte de la capital, T-RECOJO es tu mejor opción para trasladarte a tu destino, comodo y seguro.</h5>
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
				<select class="form-control" id="tipo_pago">
					<option value="1">contado</option>
					  <option value="2">tarjeta</option>
					  <option value="3">otros tipos</option>
				</select> 
			</div>
			<div class="caja-completa tipo_auto">
				<label for="">Seleccione Tipo auto</label>
				<select class="form-control" id="tipo_auto">
					<option value="1">Auto</option>
					  <option value="2">Camioneta</option>
					  <option value="3">Van</option>
					  <option value="4">Mini Van</option>
				</select> 
			</div>
			<?php if($user == 'company'){ 

				
				$query="select clients.id, clients.first_name, clients.last_name from clients INNER JOIN company_users on clients.id = company_users.id_user
                 where company_users.id_company = $id";
				$consulta = $conec->query($query);
					if($consulta->num_rows > 0){
				?>
				<div class="caja-completa">
					<label for="">Seleccione Trabajador</label>
					<select class="form-control" id="select_trabajador">

						<?php while($filas = $consulta->fetch_array()){ ?>
									
							<option value="<?php echo $filas[0] ?>"><?php echo $filas[1]." ".$filas[2]; ?></option>
							

						<?php } ?>
					</select> 
				</div>
				<?php 
						} 

							}

				?>
			<div class="caja-doble">
				<label for="">Selecciona la fecha</label>
  				<input type="text" class="form-control ch-date" id="txt_fecha" readonly="">
  				<span class="icono"><i class="glyphicon glyphicon-calendar"></i></span>
  				
			</div>
			<div class="caja-doble">
				<label for="">Seleccione la hora</label>
				<input type="text" class="form-control ch-time" id="txt_hora" readonly="">
				<input type="hidden" id="id_empresa_cliente" value="<?php echo $id; ?>">
				<span class="icono"><i class="glyphicon glyphicon-time"></i></span>
				<!--<input type="text" class="form-control" id="formGroupExampleInput">-->
			</div>
			<div class="caja-completa">
				<label for="formGroupExampleInput">Recoger</label>
    			<input type="text" class="form-control destino_caja"  placeholder="punto de partida" id="partida">
    			<button title="mi ubicacion" id="mi_ubicacion"><i class="fa fa-map-marker" aria-hidden="true"></i></button>
			</div>
			<div class="caja-completa">
				<label for="formGroupExampleInput">Destino</label>
    			<input type="text" class="form-control"  placeholder="destino" id="destino">
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

			 	<?php 
			 		$user = htmlentities(addslashes($_GET["user"]));

			 	 ?>

			  	<button class="button-primario" id="reservar_como_empresa" <?php if($user=='client'){ ?> style="display: none;"<?php }?>    >Reservar Ahora</button>
			  	<button class="button-primario" id="reservar_como_cliente" <?php if($user=='company'){ ?> style="display: none;"<?php }?>   >Reservar Ahora</button>

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

	<?php include("plantillas/ie_pagina.php"); ?>

</body>
</html>
<script src="js/reservar_viaje.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCFvlWVseUS7WSNqH5XPfyN4R5wUE0ofAs&libraries=places"></script>
<script src="./js/ubicacion.js?body=1" type="text/javascript"></script>


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