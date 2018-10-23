<?php 

	if(isset($_POST["idConfirm"])){

		include("Conexion.php");
		$conec = new Conexion();
		$idConfirm = $_POST["idConfirm"];
		$explode = explode("-",$idConfirm);
		$idViaje = $explode[0];
		$idUser = $explode[1];
		$user = $explode[2];

		$query="";

		if($user == 'client'){

			$query = "update requests set status_travel='1' where id='$idViaje' and client_id='$idUser'";
		}else if($user == 'company'){

			$query = "update requests_companies set status_travel='1' where id='$idViaje' and company_id='$idUser'";
		}

		$consulta = $conec->query($query);
		$status="";
		if($consulta){
			$status="1";
		}else{
			$tatus="0";
		}
		$array=array("status"=>$status);
		echo json_encode($array);
		//echo $idViaje." ".$idUser." ".$user;

	}else{
		echo "mal";
	}







 ?>