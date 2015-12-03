<?php
// File Security Check
if ( ! function_exists( 'wp' ) && ! empty( $_SERVER['SCRIPT_FILENAME'] ) && basename( __FILE__ ) == basename( $_SERVER['SCRIPT_FILENAME'] ) ) {
	die ( 'You do not have sufficient permissions to access this page!' );
}
?><?php
/**
 * Index Template
 *
 * Here we setup all logic and XHTML that is required for the index template, used as both the homepage
 * and as a fallback template, if a more appropriate template file doesn't exist for a specific context.
 *
 * @package WooFramework
 * @subpackage Template
 */
get_header();
global $woo_options;

?>

<?php if ( $woo_options[ 'woo_homepage_banner' ] == "true" ) { ?>

<div class="homepage-banner">
	<?php
	if ( $woo_options[ 'woo_homepage_banner' ] == "true" ) { $banner = $woo_options['woo_homepage_banner_path']; }
	if ( $woo_options[ 'woo_homepage_banner' ] == "true" && is_ssl() ) { $banner = preg_replace("/^http:/", "https:", $woo_options['woo_homepage_banner_path']); }
	?>
	<img src="<?php echo $banner; ?>" alt="" />
	<h1><span><?php echo $woo_options['woo_homepage_banner_headline']; ?></span></h1>
	<div class="description"><?php echo wpautop($woo_options['woo_homepage_banner_standfirst']); ?></div>
</div>

<?php } ?>

<!-- BEGIN BANNER -->
<div style="background: url(<?php echo CFS()->get('banner'); ?>);" class="banner">
	<div class="container center transform-center-vertical">
		<h1>BRIDGE CHEMICAL COMPANY</h1>
		<h2>Ofrecemos productos químicos de la más alta calidad</h3>
	</div>
</div>
<!-- END BANNER -->

<!-- BEGIN MISIÓN/VISIÓN
<div class="mision">
<div class="container">
<div class="row">
<div class="col-sm-4 item">
<img src="<?php bloginfo('template_url');?>/img/index/icons/glue.png" alt="glue">
<p>
<span class="bold">Misión:</span><br>
<?php echo CFS()->get('mision'); ?>
</p>
</div>
<div class="col-sm-4 item">
<img src="<?php bloginfo('template_url');?>/img/index/icons/tape.png" alt="tape">
<p>
<span class="bold">Visión:</span><br>
<?php echo CFS()->get('vision'); ?>
</p>
</div>
<div class="col-sm-4 item">
<img src="<?php bloginfo('template_url');?>/img/index/icons/glue1.png" alt="glue">
<p>
<span class="bold">Política de calidad:</span><br>
<?php echo CFS()->get('politica'); ?>
</p>
</div>
</div>
</div>
</div>		
<!-- END MISIÓN/VISIÓN -->

<div class="greeting">
	<div class="container">
		<div class="row title-margin">
			<h1 class="section-heading center">Bienvenidos</h1>
			<p class="message center">
				<?php echo CFS()->get('greeting_mssg');?>
			</p>
		</div>
	</div>
	<div class="parallax-container">
		<div class="parallax"><img src="<?php echo CFS()->get('greeting_bg'); ?>" alt="parallax"></div>
		<div class="competencias container">
			<h1 class="center"><?php echo CFS()->get('competence_title');?></h1>
			<div class="row competence-list">
				<div class="col-sm-6">
					<ul>
						<?php $competenceArray = CFS()->get('competence_array_1'); ?>			  
						<?php $arrayLength = count($competenceArray); ?>
						<?php for($i = 0; $i < $arrayLength; $i++) { ?>
						<img src="<?php echo $competenceArray[$i]['icon'] ?>" alt="icon"><li><?php echo $competenceArray[$i]['competence_text'] ?></li>
						<?php } ?>
					</ul>
				</div>
				<div class="col-sm-6">
					<ul>
						<?php $competenceArray = CFS()->get('competence_array_2'); ?>			  
						<?php $arrayLength = count($competenceArray); ?>
						<?php for($i = 0; $i < $arrayLength; $i++) { ?>
						<img src="<?php echo $competenceArray[$i]['icon'] ?>" alt="icon"><li><?php echo $competenceArray[$i]['competence_text'] ?></li>
						<?php } ?>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- BEGIN PRODUCTOS -->
<div class="productos spacing overflow">
	<div class="container">
		<div class="row title-margin">
			<div class="col-sm-4 v-mid"><hr></div>
			<div class="col-sm-4"><h1 class="section-heading center">Productos</h1></div>
			<div class="col-sm-4 v-mid"><hr></div>
		</div>
		<div class="row">
			<?php mystile_homepage_featured(); ?>
		</div>
	</div>
</div>
<!-- END PRODUCTOS -->

<!-- BEGIN MARCAS -->
<div class="marcas spacing overflow">
	<div class="parallax-container">
		<div class="parallax"><img src="<?php echo CFS()->get('background_parallax'); ?>" alt="parallax"></div>
		<div class="marcas-container">
			<div class="row table-cell">
				<?php $marcasArray = CFS()->get('marcas_array'); ?>			  
				<?php $arrayLength = count($marcasArray); ?>
				<?php for($i = 0; $i < $arrayLength; $i++) { ?>
				<div class="col-sm-4 center">	
					<img src="<?php echo $marcasArray[$i]['imagen_marca'] ?>" alt="Marca">
				</div>
				<?php } ?>
			</div>	
		</div>
	</div>
	<?php mystile_homepage_recent(); ?>
</div>
<!-- END MARCAS -->	

<!-- BEGIN NOTICIAS -->
<?php 
$settings = array(
	'thumb_single' => 'true', 
	'single_w' => '800px', 
	'single_h' => '350px', 
	'thumb_single_align' => 'alignright',
	'class' => 'img-responsive news'
);
$news_counter = 0;
?>
<div id="carousel" class="carousel slide spacing" data-ride="carousel">
	<!-- Indicators -->
	<ol class="carousel-indicators">
		<?php
		if ( have_posts() ) { the_post();
							 the_content();
							}
		?>									  
		<?php
		query_posts( 'showposts=10' );
		if ( have_posts() ) {
			while ( have_posts() ) { the_post();		
									echo '<li data-target="#carousel" data-slide-to="'.$news_counter.'"';
									if($news_counter==0){
										echo ' class="active"></li>';
									} else {
										echo '></li>';
									}
									$news_counter++;
								   }
		}
		$news_counter = 0;
		wp_reset_query();
		?>	
	</ol>

	<!-- Wrapper for slides -->
	<div class="carousel-inner" role="listbox">
		<?php
		if ( have_posts() ) { the_post();
							 the_content();
							}
		?>									  
		<?php
		query_posts( 'showposts=10' );
		if ( have_posts() ) {
			while ( have_posts() ) { the_post();
		?>
		<?php 
									echo '<div  data-slide-no="'.$news_counter.'" class="item';
									if($news_counter==0){
										echo ' active">';
									} else {
										echo '">'; 
									}
									$news_counter++;
		?>
		<div class="col-xs-6 img-container">
			<div class="table-container pull-right">
				<div class="table-cell">
					<?php if ( $settings['thumb_single'] == 'true') { woo_image( 'width=' . $settings['single_w'] . '&height=' . $settings['single_h'] . '&class=' . $settings['class'] ); } ?>
				</div>
			</div>				
		</div>
		<div class="col-xs-6 text-container">
			<div class="table-container">
				<div class="table-cell">
					<a class="news-title" href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3></a>
					<?php the_excerpt(); ?>
				</div>
			</div>	
		</div>
	</div>
	<?php	}
		}
		wp_reset_query();
	?>	
</div>

<!-- Controls -->
<a class="left carousel-control" href="#carousel" role="button" data-slide="prev">
	<span class="sr-only">Previous</span>
</a>
<a class="right carousel-control" href="#carousel" role="button" data-slide="next">
	<span class="sr-only">Next</span>
</a>
</div>
<!-- END NOTICIAS -->

<div class="contacto spacing overflow">		
	<div class="container">
		<h1 class="section-heading center">Contacto</h1>
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

<!-- LOOP FOR ARTICLES -->
<?php /*mystile_homepage_content(); */?>

<!-- BLOG POSTS & SIDEBAR DISPLAY, ELSE IF NO POSTS -->
<?php woo_loop_before(); ?>

<?php if ( $woo_options[ 'woo_homepage_blog' ] == "true" ) { 
	$postsperpage = $woo_options['woo_homepage_blog_perpage'];
?>

<?php

	$the_query = new WP_Query( array( 'posts_per_page' => $postsperpage ) );

	if ( have_posts() ) : $count = 0;
?>

<?php /* Start the Loop */ ?>
<?php while ( $the_query->have_posts() ) : $the_query->the_post(); $count++; ?>

<?php
	/* Include the Post-Format-specific template for the content.
					 * If you want to overload this in a child theme then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
	get_template_part( 'content', get_post_format() );
?>

<?php 
	endwhile; 
	// Reset Post Data
	wp_reset_postdata();
?>

<?php else : ?>

<article <?php post_class(); ?>>
	<p><?php _e( 'Sorry, no posts matched your criteria.', 'woothemes' ); ?></p>
</article><!-- /.post -->

<?php endif; ?>

<?php } // End query to see if the blog should be displayed ?>

<?php woo_loop_after(); ?>

<!-- SIDEBAR -->
<?php if ( $woo_options[ 'woo_homepage_sidebar' ] == "true" ) get_sidebar(); ?>

<?php get_footer(); ?>