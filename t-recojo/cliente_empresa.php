<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="./css/cabezera.css">
	<link href="https://fonts.googleapis.com/css?family=Muli" rel="stylesheet">
	<link rel="stylesheet" href="./font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="./css/cliente_empresa.css">
	<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
	<script src="./js/validar_empresa.js"></script>
	<script src="./js/eliminar_aceptarViaje.js"></script>
	<script src="./alertify/alertify.js"></script>
	<link rel="stylesheet" type="text/css" href="./alertify/css/alertify.css">

</head>
<body>
	<?php include("plantillas/cabezera_usuario.php"); ?>

		
	<div class="contenedor-pag">
			<?php  ?>
		
			<?php 
				
				$user=htmlentities(addslashes($_GET["user"]));
				$id=htmlentities(addslashes($_GET["id"]));
				$query2 = "";
				if($user == 'client'){
				
					$query2="select id,client_id,date_request,cost_amount,date_arrive,date_end,start_address,end_address,status_travel from requests where client_id='$id' ORDER BY date_request DESC";//
				}else if($user == 'company'){
				
					$query2="select id,company_id,date_request,cost_amount,date_arrive,date_end,start_address,end_address,status_travel from requests_companies where company_id='$id' ORDER BY date_request DESC";//
				}

			 ?>


				<div class="contenedor">
					
					<div class="contenedor-table">

						<table class="table table-sm" style="min-width: 900px;">
						  <thead>
						    <tr>
						      <th >#</th>
						      <th ><center>fecha Reserva<center></th>
						      <th ><center>Costo</center></th>
						      <th ><center>Fecha llegada</center></th>
						      <th ><center>Fecha Fin</center></th>
						      <th ><center>Partida</center></th>
						      <th ><center>Destino</center></th>
						      <th ><center>Cancelar</center></th>
						      <th ><center>Aceptar</center></th>
						      
						    </tr>
						  </thead>
						  <tbody>
						 <?php 
						 $consulta2 = $conec->query($query2);
			                $fila=1;
			                if($consulta2->num_rows > 0){
			                ?>
			                <?php while ($resultado2 = $consulta2->fetch_array()) {
			            
			                 ?>
			                <tr>
			                  <th><?php echo $fila++; ?></th>
			                  <td><center><?php echo $resultado2[2]; ?></center></td>
			                  <td><center><?php echo "s/.".$resultado2[3]; ?></center></td>
			                  <td><center><?php echo $resultado2[4]; ?></center></td>
			                  <td><center><?php echo $resultado2[5]; ?></center></td>
			                  <td><center><?php echo $resultado2[6]; ?></center></td>
			                  <td><center><?php echo $resultado2[7]; ?></center></td>
			                  <td><center><?php echo "<button class='cancelar-viaje' id='cancelar_reserva$resultado2[0]' value='$resultado2[0]-$resultado2[1]-$user'><i class='fa fa-times-circle'></i></button>"; ?></center></td>
			                  <td><center>
			                  	<?php 

			                  		if($resultado2[3] == "" && $resultado2[8] == "0" || $resultado2[3] == "0.00"){
			                  			
			                  			
			                  			
			                  		}else if($resultado2[3] != "" && $resultado2[8] == "0"){

			                  			echo "<button class='aceptar-viaje' id='aceptar_reserva$resultado2[0]' value='$resultado2[0]-$resultado2[1]-$user'><i class='fa fa-check-circle'></i></button><div style='font-size:18px;color:#28a745' class='aceptar_reserva$resultado2[0] check'><span><i class='fa fa-check-circle'></i></span></div>";
			                  			
			                  		}else if($resultado2[3] != "" && $resultado2[8] == "1"){
			                  				echo "<div style='font-size:18px;color:#28a745'><span><i class='fa fa-check-circle'></i></span></div>";
			                  		}
			                  		

			                  	 ?>
			                  </center></td>

			                </tr>
			                <?php } }?>

			            
						  </tbody>
						</table>
					</div>

				</div>
	</div>
	
</body>
</html>