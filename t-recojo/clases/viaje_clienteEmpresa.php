<?php 

	

			include("Conexion.php");
			$conec = new Conexion();

			$id=$_REQUEST["id"];
			if($_REQUEST["user"] == 'client'){

				$query="select client_id,date_request,cost_amount,date_arrive,date_end,start_address,end_address,provincia,distrito from requests where client_id='$id'";
			}else if($user == 'company'){
				
					$query="select company_id,date_request,cost_amount,date_arrive,date_end,start_address,end_address,provincia,distrito from requests_companies where company_id='$id'";
				}


			$consulta = $conec->query($query);
			$filas=array();

			if($consulta){

				while($resultado=$consulta->fetch_array()){

					$filas["data"][]= array_map("utf8_encode",$resultado);

				}

				echo json_encode($filas);

			}

		
	




 ?>