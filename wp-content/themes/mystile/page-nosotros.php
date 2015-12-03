<?php include('header.php') ?>
<div class="nosotros">
	<div class="header">

	</div>
	<div class="container">
		<div class="row productos title-margin">
			<div class="col-sm-4 v-mid"><hr></div>
			<div class="col-sm-4"><h1 class="section-heading center">Nosotros</h1></div>
			<div class="col-sm-4 v-mid"><hr></div>
		</div>
		<div class="row spacing">
			<div class="col-sm-4">
				<img class="img-responsive" src="<?php echo CFS()->get("imagen_principal"); ?>" alt="nosotros">
			</div>
			<div class="col-sm-8 history">
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<p><?php the_content();?></p>
				<?php endwhile; else: ?>
				<p><?php _e('Página no encontrada.'); ?></p>
				<?php endif; ?>
			</div>
		</div>
		<div class="row mision spacing">
			<div class="col-sm-4">
				<img src="<?php bloginfo('template_url');?>/img/nosotros/mision.png" alt="mision">
				<p>
					<span class="bold">Misión:</span>
				</p>
				<p class="justify">
					<?php echo CFS()->get('mision'); ?>
				</p>
			</div>
			<div class="col-sm-4 borders">
				<img src="<?php bloginfo('template_url');?>/img/nosotros/vision.png" alt="vision">
				<p>
					<span class="bold center">Visión:</span>
				</p>
				<p class="justify">
					<?php echo CFS()->get('vision'); ?>
				</p>
			</div>
			<div class="col-sm-4">
				<img src="<?php bloginfo('template_url');?>/img/nosotros/politica.png" alt="politica">
				<p>
					<span class="bold center">Política de calidad:</span>
				</p>
				<p class="justify">
					<?php echo CFS()->get('politica'); ?>
				</p>
			</div>
		</div>
	</div>
</div>
<?php include('footer.php') ?>