<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="./font-awesome/css/font-awesome.min.css">
	<link href="https://fonts.googleapis.com/css?family=Muli" rel="stylesheet">
	<link rel="stylesheet" href="./css/cabezera.css">
	<link rel="stylesheet" href="./css/agregar_trabajador.css">
	<link rel="stylesheet" href="./css/loader.css">


	<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
	
	<script src="./js/eventos.js"></script>
	<script src="./js/agregar_trabajador.js"></script>
	<script src="./alertify/alertify.js"></script>
	<link rel="stylesheet" type="text/css" href="./alertify/css/alertify.css">
	
</head>
<body>
	<?php include("plantillas/cabezera_usuario.php"); ?>
	<?php include("plantillas/loader.php"); ?>

	<?php 

			$user=htmlentities(addslashes($_GET["user"]));
			$id=htmlentities(addslashes($_GET["id"]));

		 ?>
		 <!-- Campos ocultos -->
			<input type="hidden" value="<?php echo $id; ?>" id="hiddenId_company">
		<!-- Fin campos ocultos -->

	<div class="contenedor-trabajador" >
			
			<div class="frm-change-trabajador">
					<div class="title-trabajador">
						<h4>Agregar Trabajador</h4>
					</div>
					<div class="caja-trabajador">
						<label for="">Nombre</label>
						<input type="text" id="nom_trabajador" placeholder="Nombre">
					</div>
					<div class="caja-trabajador">
						<label for="">Apellido</label>
						<input type="text" id="ape_trabajador" placeholder="Apellido">
					</div>
					<div class="caja-trabajador">
						<label for="">Teléfono</label>
						<input type="text" id="cel_trabajador" placeholder="Teléfono">
					</div>
					<div class="caja-trabajador">
						<label for="">Email</label>
						<input type="text" id="email_trabajador" placeholder="Email">
					</div>
					<div class="caja-trabajador">
						<label for="">Provincia</label>
						<input type="text" id="pro_trabajador" placeholder="Provincia">
					</div>
					<div class="caja-trabajador">
						<label for="">Departamento</label>
						<input type="text" id="depa_trabajador" placeholder="Departamento">
					</div>
					<div class="caja-trabajador">
						<label for="">Distrito</label>
						<input type="text" id="dis_trabajador" placeholder="Distrito">
					</div>
					<div class="caja-trabajador">
						<label for="">Dirección</label>
						<input type="text" id="dir_trabajador" placeholder="Dirección">
					</div>
					<div class="caja-trabajador">
						<button class="frm-botton-trabajador" id="agregar_trabajador">Agregar</button>
					</div>
					

			</div>


	</div>




		

</body>
</html>