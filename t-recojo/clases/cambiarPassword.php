<?php 

	if(isset($_POST["password"]) && isset($_POST["idConfirm"])){

		include("Conexion.php");
		$conec = new Conexion();
		$password = md5($_POST["password"]);
		$idConfirm = $_POST["idConfirm"];
		$explode = explode("-", $idConfirm);
		$user = $explode[0];
		$id = $explode[1];

		$query="";

		if($user == 'client'){
			$query = "update clients set pwd_client='$password' where id='$id'";
		}else if($user == 'company'){
			$query = "update company set pwd_company='$password' where id='$id'";
		}

		$consulta = $conec->query($query);

		$data="";
		if($consulta){
			$data=array("status"=>"1");
		}else{
			$data=array("status"=>"0");
		}

		echo json_encode($data);

	}else{

		echo "error";
	}






 ?>