<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="./css/cabezera.css">
	<link rel="stylesheet" href="./css/empresa.css">
	<link href="https://fonts.googleapis.com/css?family=Muli" rel="stylesheet">
	<link rel="stylesheet" type="./text/css" href="bootstrap/css/glyphicon.css">
	<link rel="stylesheet" href="./font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="./css/pie_pagina.css">

	<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="./bootstrap/js/bootstrap.min.js"></script>
	<script src="./js/eventos.js"></script>
	<script src="./js/validar_empresa.js"></script>
	<script src="./alertify/alertify.js"></script>
	<link rel="stylesheet" type="text/css" href="./alertify/css/alertify.css">

	
</head>
<body>

	<?php include("plantillas/cabezera_usuario.php"); ?>
<div class="contenedor-pag">
	<div class="title1">
		<div class="texto-title">
			<h1>Gestionamos tu servicio desde el principio hasta el final.</h1>
			<!--<button class="button-primario">Trabaja con Nosotros</button>-->
		</div>
		<div class="imagen-auto">
			<img src="imagenes/Auto.jpg" alt="">
		</div>
		
	</div>
	<div class="servicios">
		<div class="cabezera-servicios">
			<h2 class="title-servicios bold">Servicios.</h2>
			<p class="title-servicios">Nuestros servicios a la orden del día.</p>
		</div>
		<div class="vacio">
			<h2 class="">Servicios.</h2>
			<p class="">Nuestros servicios a la orden del dia.</p>
		</div>
		<div class="content-service">
			<div class="img-servicio">
				<img src="imagenes/standar.jpg" alt="">
			</div>
			<div class="descripcion-servicio">
				<h3>Servicio estandar</h3>
				<p>Si usted es una persona que se moviliza frecuentemente por razones de trabajo o relaciones comerciales y sociales. Este servicio es ideal para usted.</p>
			</div>	
			
		</div>
		<div class="content-service">
			<div class="img-servicio">
				<img src="imagenes/camioneta.jpg" alt="">
			</div>	
			<div class="descripcion-servicio">
				<h3>Servicio camionetas</h3>
				<p>CAMIONETA 4 x 2 del año Capacidad 4 pasajeros y 4 equipajes medianos o grandes. Amplio de mayor comodidad y de mayor equipaje. Ideal para la familia y/o con ejecutivos con asistentes.</p>
			</div>
		</div>
		
		<div class="content-service">
			<div class="img-servicio">
				<img src="imagenes/van.jpg" alt="">
			</div>	

			<div class="descripcion-servicio">
				<h3>Servicio Vans</h3>
				<p>MINIVAN Capacidad 7 pasajeros con Equipajes Grandes / Medianos. Ó 10 pasajeros sin equipaje. Amplio, moderno, ideal para movilizar grupo de personas Aeropuerto, con varios equipajes.</p>
			</div>
		</div>

		<div class="content-service">
			<div class="img-servicio">
				<img src="imagenes/mini-van.jpeg" alt="">
			</div>	

			<div class="descripcion-servicio">
				<h3>Servicio Mini-vans</h3>
				<p>MINIVAN Capacidad 7 pasajeros con Equipajes Grandes / Medianos. Ó 10 pasajeros sin equipaje. Amplio, moderno, ideal para movilizar grupo de personas Aeropuerto, con varios equipajes.</p>
			</div>
		</div>
		
		
	</div>

	<div class="descripcion">
		<div class="descripcion-tec">
			<h4 class="title-servicios bold">De la mano con la tecnología.</h4>
			<p class="title-servicios">Utilizamos la tecnología para brindarle un mejor servicio.</p><br><br>
			<a href="#" class="a-btn">Viaja Ahora</a>
		</div>

		<div class="descripcion-tipos">
			<div class="descripcion-items">
				<label for="">Solicita</label>
				<p>Puedes solicitar tus servicios a travez de esta página web, whatsapp o correo electrónico.</p>
				<div class="img-descripcion-tipo">
					<img src="imagenes/solicitar.png" alt="">
				</div>
				
			</div>
		
			<div class="descripcion-items">
				<label for="">Courier</label>
				<p>Oh no! se olvido llevar algo?, tranquilo nosotros nos encargamos de eso, con la seguridad y confianza que usted necesita.</p>
				<div class="img-descripcion-tipo">
					<img src="imagenes/courier.png" alt="">
				</div>
			</div>			

			<div class="descripcion-items">
				<label for="">Viaja</label>
				<p>Al trabajo, a su hogar, al aeropuerto; estamos listos para llevarlo a dónde quiera, su seguridad y comonidad es nuestro trabajo.</p>
				<div class="img-descripcion-tipo">
					<img src="imagenes/viaja.jpg" alt="">
				</div>
			</div>

		</div>
	</div>
		
	<div class="formulario">
		
		
		<div class="formulario-empresa">
			
				<div class="frm">
					<h3>Regístrate como empresa</h3>
				</div>
			  <div class="form-group row">
			    <label for="staticEmail" class="col-sm-2 col-form-label label">Número de ruc</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control form-control-sm" id="ruc_empresa" placeholder="Ingrese numero de Ruc">
			    </div>
			  </div>
				<div class="form-group row">
			    <label for="inputPassword" class="col-sm-2 col-form-label label">Contraseña</label>
			    <div class="col-sm-10">
			      <input type="password" class="form-control form-control-sm" id="pass_empresa" placeholder="Contraseña">
			    </div>
			  </div>
			  <div class="form-group row">
			    <label for="inputPassword" class="col-sm-2 col-form-label label">Confirmar Contraseña</label>
			    <div class="col-sm-10">
			      <input type="password" class="form-control form-control-sm" id="pass_confirm_empresa" placeholder="Confirmar Contraseña">
			    </div>
			  </div>
			  <div class="form-group row">
			    <label for="inputPassword" class="col-sm-2 col-form-label label">Nombre</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control form-control-sm" id="nom_dueno_empresa" placeholder="Nombres">
			    </div>
			  </div>
			  <div class="form-group row">
			    <label for="staticEmail" class="col-sm-2 col-form-label label">Apellidos</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control form-control-sm" id="ape_dueno_empresa" placeholder="Apellidos">
			    </div>
			  </div>
			  <div class="form-group row">
			    <label for="inputPassword" class="col-sm-2 col-form-label label">Email</label>
			    <div class="col-sm-10">
			      <input type="email" class="form-control form-control-sm" id="email_empresa" placeholder="Email">
			    </div>
			  </div>
			  <div class="form-group row">
			    <label for="staticEmail" class="col-sm-2 col-form-label label">Celular</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control form-control-sm" id="cel_empresa" placeholder="Celular">
			    </div>
			  </div>
			  <div class="form-group row">
			    <label for="inputPassword" class="col-sm-2 col-form-label label">Estado</label>
			    <div class="col-sm-10">
			      <input type="checkbox" >
			    </div>
			  </div>
			  <div class="conten-boton">
			  	<button type="button" id="frm_pag_empresa">Registrar</button>
			  </div>
			


		</div>
		<!--<div class="mapa"></div>-->
	</div>

	<?php include("plantillas/pie_pagina.php"); ?>

	</div>
</body>
</html>
<script>

</script>