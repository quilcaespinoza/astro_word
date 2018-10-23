<?php 

	class Conexion extends mysqli{

		private $host = 'localhost';
		private $user = 'root';
		private $pass = '';
		private $bd = 'itaxi';

		public function __construct(){

			parent::__construct($this->host,$this->user,$this->pass,$this->bd);
			$this->set_charset('utf-8');
			if($this->connect_errno){
				die('erro en la conexion'.mysqli_connect_errno());
			}else{
				$mensaje="conectado";
			}

			//echo $mensaje;

		}


	}

 ?>