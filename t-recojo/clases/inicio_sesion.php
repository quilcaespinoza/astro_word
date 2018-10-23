<?php 
	
	if(isset($_POST["celular"]) && isset($_POST["pass"])){

			include("Conexion.php");
			$conec = new Conexion();
			$celular=htmlentities(addslashes($_POST["celular"]));
			$pass=htmlentities(addslashes($_POST["pass"]));
			$_pass=md5($pass);
			
			$query1="select id from company where phone ='$celular' and pwd_company='$_pass';";
				
			$query2="select id from clients where phone ='$celular' and pwd_client='$_pass';";
			

			$consulta1 = $conec->query($query1);
			$consulta2 = $conec->query($query2);

			if($consulta1->num_rows > 0){

				session_start();
				//echo "usuario existe";
				
				$id="";
				while($resultado=$consulta1->fetch_array()){
					$id=$resultado[0];
				}

				$data=array("status"=>"1","user"=>"company","id"=>$id);

				echo json_encode($data);
				//header("location:../cliente_empresa.php?user=$user&id=$id");
			}else if($consulta2->num_rows > 0){
				session_start();
				//echo "usuario existe";
				
				$id="";
				while($resultado=$consulta2->fetch_array()){
					$id=$resultado[0];
				}

				$data=array("status"=>"1","user"=>"client","id"=>$id);

				echo json_encode($data);

			}else if($consulta1->num_rows == 0 && $consulta2->num_rows == 0){
				//header("location:../empresa.php?v=empresa");
				$data=array("status"=>"0");
				echo json_encode($data);
			}

	}else{
		echo "malo";
	}
	


 ?>