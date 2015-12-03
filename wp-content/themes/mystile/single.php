<?php
// File Security Check
if ( ! empty( $_SERVER['SCRIPT_FILENAME'] ) && basename( __FILE__ ) == basename( $_SERVER['SCRIPT_FILENAME'] ) ) {
	die ( 'You do not have sufficient permissions to access this page!' );
}
?>
<?php
/**
 * Single Post Template
 *
 * This template is the default page template. It is used to display content when someone is viewing a
 * singular view of a post ('post' post_type).
 * @link http://codex.wordpress.org/Post_Types#Post
 *
 * @package WooFramework
 * @subpackage Template
 */
get_header();
global $woo_options;

/**
 * The Variables
 *
 * Setup default variables, overriding them if the "Theme Options" have been saved.
 */

$settings = array(
					'thumb_single' => 'true', 
					'single_w' => '800px', 
					'single_h' => '620px', 
					'thumb_single_align' => 'alignright',
	 				'class' => 'img-responsive news'
					);

$settings = woo_get_dynamic_values( $settings );
?>

<div class="noticias">
	<div class="container">
		<div class="row productos title-margin">
			<div class="col-sm-4 v-mid"><hr></div>
			<div class="col-sm-4"><h1 class="section-heading center">Noticias</h1></div>
			<div class="col-sm-4 v-mid"><hr></div>
		</div>

		<div class="row spacing">
			<div class="col-sm-9">

				<?php
				if ( have_posts() ) { $count = 0;
									 while ( have_posts() ) { the_post(); $count++;
				?>

				<div class="center news-summary">
		    	<?php if ( $settings['thumb_single'] == 'true' /*&& ! woo_embed( '' )*/ ) { woo_image( 'width=800px' . '&height=620px' . '&class=' . $settings['class'] ); } ?>					
			    <?php woo_post_meta(); ?><span class="tags date"><?php the_time( get_option( 'date_format' ) ); ?></span>
				    <a class="news-title" href="<?php the_permalink(); ?>"><h3 class="news-title"><?php the_title(); ?></h3></a>					
					<div class="summary"><?php the_content(); ?></div>
					<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'woothemes' ), 'after' => '</div>' ) ); ?>
				</div>

				<?php woo_subscribe_connect(); ?>

				<nav id="post-entries" class="fix">
					<div class="nav-prev fl"><?php previous_post_link( '%link', '<span class="meta-nav">&larr;</span> %title' ); ?></div>
					<div class="nav-next fr"><?php next_post_link( '%link', '%title <span class="meta-nav">&rarr;</span>' ); ?></div>
				</nav><!-- #post-entries -->

				<?php
				// Determine wether or not to display comments here, based on "Theme Options".
						if ( isset( $woo_options['woo_comments'] ) && in_array( $woo_options['woo_comments'], array( 'post', 'both' ) ) ) {
							comments_template();
						}
					} // End WHILE Loop
				} else {
				?>
				<article <?php post_class(); ?>>
					<p><?php _e( 'Sorry, no posts matched your criteria.', 'woothemes' ); ?></p>
				</article><!-- .post -->             
				<?php } ?>
			</div>
			<div class="col-sm-3 feed no-padding">
				<?php get_sidebar('news'); ?>
			</div> 	
		</div> 
	</div><!-- #content -->
</div>

<?php get_footer(); ?>