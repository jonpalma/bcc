<?php include('header.php') ?>
<div class="contactPage">
	<iframe class="map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3500.8495356539497!2d-106.1031493849167!3d28.664223582405292!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xd552d821102acd9f!2sBridge+Chemical+Company%2C+S.A.+De+C.V.!5e0!3m2!1ses!2smx!4v1447955228410" frameborder="0" style="border:0" allowfullscreen></iframe>
	<div class="container">
		<div class="row productos title-margin">
			<div class="col-sm-4 v-mid"><hr></div>
			<div class="col-sm-4"><h1 class="section-heading center">Contacto</h1></div>
			<div class="col-sm-4 v-mid"><hr></div>
		</div>
		<div class="row spacing">
			<div class="col-sm-4 ubicaciones">
				<div class="item no-padding info">
					<h4 class="city"><?php echo CFS()->get('nombre_ciudad'); ?></h4>
					<p><?php echo CFS()->get('info_ciudad'); ?></p>
				</div>
			</div>
			<div class="col-sm-8 contacto border-left-gray">
				<form action="<?php bloginfo('template_url');?>/mailer.php" method="post" id="contact-form">
					<div class="row center-block">			
						<div class="col-sm-6 item">
							<input class="input" type="text" id="name" name="name" placeholder="Nombre/Título">
						</div>
						<div class="col-sm-6 item">
							<input class="input" type="text" id="email" name="email" placeholder="Correo Electrónico">
						</div>
					</div>
					<div class="row center-block">
						<div class="col-sm-6 item">
							<input class="input" type="text" id="phone" name="phone" placeholder="Teléfono">
						</div>
						<div class="col-sm-6 item">
							<input class="input" type="text" id="location" name="location" placeholder="Ciudad, Estado/Domicilio">
						</div>
					</div>
					<div class="row center-block">
						<div class="col-sm-12 item">
							<input class="input" type="text" id="company" name="company" placeholder="Empresa">
						</div>
					</div>
					<div class="tarea-container">
						<textarea class="input" name="info" id="info" cols="30" rows="5" placeholder="Mensaje"></textarea>
						<button class="submit pull-right" id="form-submit">Enviar</button>
						<div id="form-output"></div>		
					</div>
				</form>	
			</div>
		</div>	
	</div>
</div>
<?php include('footer.php') ?>