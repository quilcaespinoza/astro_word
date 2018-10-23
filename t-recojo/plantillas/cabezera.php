<div class="contenedor-cabezera">
	<div class="cabezera">
			<div class="logo">
				<a href="empresa.php?v=empresa">
					<img src="imagenes/logo.png" alt="">
				</a>
			</div>
			<div class="items">
				

				
				<a class="sesion" href=""
				
				<?php if(isset($_GET["v"])){
						if($_GET["v"] == 'change'){

							?>
						style="display: none;"

						<?php } } ?>

				   >Iniciar Sesion</a>
				
				<a class="color-a" href="tarifa.php?v=tarifa" 
				<?php if(isset($_GET["v"])){
						if($_GET["v"] == "tarifa"){
					?> 

						style="font-weight: 600;" 

					<?php } }else{?>  <?php } ?> >
				Reserva y registrese
				</a>
				<a class="color-a" href="nosotros.php?v=about"
					<?php if(isset($_GET["v"])){
						if($_GET["v"] == "about"){
					?> 

						style="font-weight: 600;" 

					<?php } }else{?> <?php } ?>
				>Quiénes Somos</a>
				<a class="color-a" href="publico_familia.php?v=publico"
					<?php if(isset($_GET["v"])){
						if($_GET["v"] == "publico"){
					?> 

						style="font-weight: 600;" 

					<?php } }else{?>	
				<?php } ?> >Público y Familia</a>

				

				<a class="color-a" href="empresa.php?v=empresa"
					<?php if(isset($_GET["v"])){
						if($_GET["v"] == "empresa"){
					?> 

						style="font-weight: 600;" 

					<?php } }else{?> <?php } ?>
				>Empresas</a>

			</div>
			<div class="icon-menu">
				<div class="icon-menu-res" id="abrir-nav">
					<span><i class="fa fa-bars" aria-hidden="true"></i></span>
				</div>
			</div>
			
	</div>
</div>

<div class="inicio-sesion" id="div-inicio-sesion">
				
					<div class="cerrar-inicio-sesion" id="cerrar_inicio_sesion">
						<span><i class="fa fa-times" aria-hidden="true"></i></span>
					</div>
				    <input type="text" id="txt_numcel" name="txt_ruc_mail" placeholder="Numero de celular">
				    <input type="password" id="txt_pass" name="txt_pass" placeholder="Contraseña">
				    <a href="">Ir a administración</a><br>
				    <button type="button" id="iniciar_sesion">Entrar</button>
					 <!--<button type="button" id="btn_salir_login">Salir</button>-->
			 	
			</div>

<div class="menu-nav-res">
	<div class="menu-nav">
		<div class="cerrar" id="cerrar-nav">
			<span><i class="fa fa-times" aria-hidden="true"></i></span>
		</div>
		<ul>
			<li><a href="empresa.php"><span><i class="fa fa-angle-right" aria-hidden="true"></i></span> <span class="espacio">aa</span>Empresa</a></li>
			<li><a href="publico_familia.php"><span><i class="fa fa-angle-right" aria-hidden="true"></i></span> <span class="espacio">aa</span>Publico y Familia</a></li>
			<li><a href="nosotros.php"><span><i class="fa fa-angle-right" aria-hidden="true"></i></span> <span class="espacio">aa</span>Quienes Somos <span><i class="fa fa-question-circle" aria-hidden="true"></i></span></a></li>
			<li><a href="tarifa.php"><span><i class="fa fa-angle-right" aria-hidden="true"></i></span> <span class="espacio">aa</span>Tarifa <span><i class="fa fa-money" aria-hidden="true"></i></span></a></li>
			<li><a href="#" id="modal-inicio-sesion"><span><i class="fa fa-angle-right" aria-hidden="true"></i></span> <span class="espacio">aa</span>Iniciar Sesion <span><i class="fa fa-user" aria-hidden="true"></i></span></a></li>
		</ul>
	</div>
</div>