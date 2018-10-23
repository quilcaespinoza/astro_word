<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="./font-awesome/css/font-awesome.min.css">
	<link href="https://fonts.googleapis.com/css?family=Muli" rel="stylesheet">
	<link rel="stylesheet" href="./css/cambiar_pass.css">
	<link rel="stylesheet" href="./css/cabezera.css">
	<link rel="stylesheet" href="./css/pie_pagina.css">



	<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
	<script src="./alertify/alertify.js"></script>
	<link rel="stylesheet" type="text/css" href="./alertify/css/alertify.css">
	<script src="./js/validar_cambioPass.js"></script>	
	<script src="./js/eventos.js"></script>	
	
</head>
<body>

		<?php include("plantilla/cabezera.php"); ?>

		<?php 

			$user=htmlentities(addslashes($_GET["user"]));
			$id=htmlentities(addslashes($_GET["id"]));

		 ?>
			

			<div class="contenedor-change">
					
					<div class="frm-change-pass">

							<!--<form method="POST" action="cambiar_password.php" onsubmit="return validar_cambio();">-->
						 	<div class="form-group row" style="margin-bottom: 3px;">
						 		<label for="staticEmail" class="col-sm-12 col-form-label">Nueva contraseña</label>
						    <div class="col-sm-12">
						      <input type="password" class="form-control" id="nueva_pass" name="nueva_pass" placeholder="Nueva contraseña">
						    </div>
						  </div>

						  <div class="form-group row" style="margin-bottom: 3px;">
						 		<label for="staticEmail" class="col-sm-12 col-form-label">Confirmar nueva contraseña</label>
						    <div class="col-sm-12">
						      <input type="password" class="form-control" id="confirm_pass" name="confirm_pass" placeholder="Confirmar contraseña">
						    </div>
						  </div>
						  <div class="frm-botton-pass">
						  	<button type="button" id="validar_pass" value="<?php echo $user."-".$id; ?>">Cambiar contraseña</button>
						  </div>
						<!--</form>-->

					</div>


			</div>




		
	

</body>
</html>