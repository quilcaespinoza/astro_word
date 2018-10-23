<?php 

	class Consulta{

		include("Conexion.php");

		public function sesionRegistro($id,$client){

				$query="";
				if($client == 'client'){
					$query="select id,email from clients";
				}else if($client == 'company'){
					$query ="select id,email from company";
				}

		}



	}
	



 ?>