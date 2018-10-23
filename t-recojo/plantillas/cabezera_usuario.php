<?php include("clases/Conexion.php"); 
$conec = new Conexion();

		?>
<div class="contenedor-cabezera">
	<div class="cabezera">
			<div class="logo">
				<a href="empresa.php?v=empresa">
					<img src="imagenes/logo.png" alt="">
				</a>
			</div>
			<div class="items">
	
				<?php $user=htmlentities(addslashes($_GET["user"])) ;

					  $id = htmlentities(addslashes($_GET["id"]));
				  ?>
				
				<a class="sesion" href="clases/cerrar_sesion.php" id="cerrar_sesion_usuario">Cerrar Sesion</a>
				<a class="color-a" href=" <?php echo 'reservar_viaje.php?user='.$user.'&id='.$id ?> ">Reservar Viajes</a>
				<a class="color-a" href=" <?php echo 'cliente_empresa.php?user='.$user.'&id='.$id ?> ">Mis Viajes</a>
				<?php if($user == 'client'){ ?>
				<a class="color-a" href=" <?php echo 'publico_login.php?user='.$user.'&id='.$id ?> ">Publico</a>
				<?php }else if($user == 'company'){ ?>
					<a class="color-a" href=" <?php echo 'agregar_trabajador.php?user='.$user.'&id='.$id ?> ">Agregar Trabajador</a>
				<?php } ?>
				<a class="color-a" href=" <?php echo 'empresa_login.php?user='.$user.'&id='.$id ?> ">Empresas</a>


			</div>
			<div class="icon-menu">
				<div class="icon-menu-res" id="abrir-nav">
					<span><i class="fa fa-bars" aria-hidden="true"></i></span>
				</div>
			</div>
			
	</div>
</div>


<div class="menu-nav-res">
	<div class="menu-nav">
		<div class="cerrar" id="cerrar-nav">
			<span><i class="fa fa-times" aria-hidden="true"></i></span>
		</div>
		<ul>
			<?php if($user=='company'){ ?>
			<li><a href=" <?php echo 'agregar_trabajador.php?user='.$user.'&id='.$id ?> "><span><i class="fa fa-angle-right" aria-hidden="true"></i></span> <span class="espacio">aa</span>Agregar Trabajador </a></li>
			<?php }else if($user=='client'){ ?>
			<li><a href=" <?php echo 'publico_login.php?user='.$user.'&id='.$id ?> "><span><i class="fa fa-angle-right" aria-hidden="true"></i></span> <span class="espacio">aa</span>Publico </a></li>
			<?php } ?>	

			<li><a href=" <?php echo 'empresa_login.php?user='.$user.'&id='.$id ?> "><span><i class="fa fa-angle-right" aria-hidden="true"></i></span> <span class="espacio">aa</span>Empresas</a></li>

			<li><a href=" <?php echo 'cliente_empresa.php?user='.$user.'&id='.$id ?> "><span><i class="fa fa-angle-right" aria-hidden="true"></i></span> <span class="espacio">aa</span>Mis Viajes <span><i class="fa fa-question-circle" aria-hidden="true"></i></span></a></li>

			<li><a  href=" <?php echo 'reservar_viaje.php?user='.$user.'&id='.$id ?> "><span><i class="fa fa-angle-right" aria-hidden="true"></i></span> <span class="espacio">aa</span>Reservar Viajes <span><i class="fa fa-money" aria-hidden="true"></i></span></a></li>

			<li><a href="clases/cerrar_sesion.php"><span><i class="fa fa-angle-right" aria-hidden="true"></i></span> <span class="espacio">aa</span>Cerrar Sesion <span><i class="fa fa-user" aria-hidden="true"></i></span></a></li>
		</ul>
	</div>
</div>


		<?php 

		if(isset($_GET["user"]) && isset($_GET["id"])){

			$user=htmlentities(addslashes($_GET["user"]));
			$id=htmlentities(addslashes($_GET["id"]));
			$query = "";
			$query2="";
			if($user == 'client'){
				$query = "select id,email from clients where id='$id'";
				$query2="select client_id,date_request,cost_amount,date_arrive,date_end,start_address,end_address from requests where client_id='$id'";
			}else if($user == 'company'){
				$query = "select id,ruc,first_name from company where id='$id'";
				$query2="select company_id,date_request,cost_amount,date_arrive,date_end,start_address,end_address from requests_companies where company_id='$id'";
			}

			$consulta = $conec->query($query);
			$usuario="";
			$nom="";

			if($consulta){

				while($resultado = $consulta->fetch_array()){
					$usuario = $resultado[1];
					if($user == 'company'){
						$nom=$resultado[2];
					}
					
				}

			}

		}
		?>
		<div class="cabezera-usuario">
			<?php if($user == 'company'){ ?>
			<label for="">ruc: <?php echo $usuario; ?></label>
			<label for=""><i class="fa fa-user-circle-o" aria-hidden="true"></i> <?php echo $nom; ?></label>

			<?php } ?>

			<?php if($user == 'client'){ ?>
			<label for=""><i class="fa fa-user-circle-o" aria-hidden="true"></i> <?php echo $usuario; ?></label>
			<input type="hidden" value="<?php echo $usuario; ?>" id="txt_mail_client">
			<?php } ?>

		</div>
		<!--"-->