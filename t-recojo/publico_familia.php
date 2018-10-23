<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="./css/cabezera.css">
	<link href="https://fonts.googleapis.com/css?family=Muli" rel="stylesheet">
	<link rel="stylesheet" href="./css/publico.css">
	<link rel="stylesheet" href="./css/pie_pagina.css">
	<link rel="stylesheet" href="./font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="./css/loader.css">

	<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="./bootstrap/js/bootstrap.min.js"></script>
	<script src="./js/eventos.js"></script>
	<script src="./js/validar_publico_familia.js"></script>
	<script src="./alertify/alertify.js"></script>
	<link rel="stylesheet" type="text/css" href="./alertify/css/alertify.css">
	<script src="./js/validar_login.js"></script>
	
</head>
<body>
	<?php include("plantillas/cabezera.php") ?>
	<?php include("plantillas/loader.php"); ?>
<div class="contenedor-pag">
	<div class="publico-content">
		<div class="img-public">
			<img src="imagenes/adaptar.jpeg" alt="">
		</div>	
		<div class="descrip-public">
			<div class="texto">
				<h3>Nos adaptamos a ti.</h3>
				<p>Trasladarse al aeropuerto, a una reunión, a casa, al trabajo, de paseo. Nosotros sabemos que cada persona o familia tiene motivos muy diferentes para viajar. Por eso te ofrecemos una solución de transporte adaptada a tus necesidades.</p>
			</div>
		</div>
		<div class="descrip-public">
			<div class="texto">
				<h3>Tú decides</h3>
				<p>A través de esta página web, whatsapp, correo electrónico tu decides como, cuando y dónde usarás nuestros servicios. Puedes establecer días, horarios, zonas,y que tipo de vehículo prefieres para cada ocasion. Solo necesitas registrarte y empezarás a disfrutar de nuestros servicios.</p>
			</div>
		</div>
		<div class="img-public">
			<img src="imagenes/decidir.jpg" alt="">
		</div>	
	</div>

	<div class="cabezera-registro">
		<div class="texto2">
			<h3>Comienza ahora</h3>
			<p>Completa el formulario y comienza a disfrutar de nuestros servicios</p>
		</div>
	</div>

	<div class="formulario-cliente">
		
		<div class="registro-cliente">
				<div class="title-frm">
					<h3>Registro de cliente</h3>
				</div>
			  <div class="form-group row">
			    <label for="staticEmail" class="col-sm-2 col-form-label label">Nombre</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control form-control-sm" id="nom_client" placeholder="Nombre">
			    </div>
			  </div>
			  <div class="form-group row">
			    <label for="inputPassword" class="col-sm-2 col-form-label label">Apellidos</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control form-control-sm" id="ape_client" placeholder="Apellido" >
			    </div>
			  </div>
			  <div class="form-group row">
			    <label for="staticEmail" class="col-sm-2 col-form-label label">Teléfono</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control form-control-sm" id="telef_client" placeholder="Telefono" >
			    </div>
			  </div>
			  <div class="form-group row">
			    <label for="inputPassword" class="col-sm-2 col-form-label label">Email</label>
			    <div class="col-sm-10">
			      <input type="email" class="form-control form-control-sm" id="email_client" placeholder="Email" >
			    </div>
			  </div>
			  <div class="form-group row">
			    <label for="inputPassword" class="col-sm-2 col-form-label label">Contraseña</label>
			    <div class="col-sm-10">
			      <input type="password" class="form-control form-control-sm" id="pass_client" placeholder="Contraseña" >
			    </div>
			  </div>
			  <div class="form-group row">
			    <label for="inputPassword" class="col-sm-2 col-form-label label">Confirmar contraseña</label>
			    <div class="col-sm-10">
			      <input type="password" class="form-control form-control-sm" id="confirm_pass_client" placeholder="Confirmar contraseña" >
			    </div>
			  </div>
			  <div class="form-group row">
			    <label for="staticEmail" class="col-sm-2 col-form-label label">Provincia</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control form-control-sm" id="prov_client" placeholder="Provincia" >
			    </div>
			  </div>
			   <div class="form-group row">
			    <label for="staticEmail" class="col-sm-2 col-form-label label">Departamento</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control form-control-sm" id="depa_client" placeholder="Departamento" >
			    </div>
			  </div>
			  <div class="form-group row">
			    <label for="staticEmail" class="col-sm-2 col-form-label label">Distrito</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control form-control-sm" id="distr_client" placeholder="Distrito" >
			    </div>
			  </div>
			  <div class="form-group row">
			    <label for="staticEmail" class="col-sm-2 col-form-label label">Dirección</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control form-control-sm" id="dir_client" placeholder="Dirección" >
			    </div>
			  </div>
			  
			  <div class="conten-boton">
			  	<button type="button" id="btn_frm_cliente">Registrar</button>
			  </div>
		</div>
		

	</div>
</div>
	<?php include("plantillas/pie_pagina.php") ?>

</body>
</html>