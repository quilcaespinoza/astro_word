<?php 

if(isset($_POST["h"])){

	$hora = $_POST["h"];
     echo date( "H:i", strtotime($hora));
     
}else{
	//echo "mal";
}





 ?>