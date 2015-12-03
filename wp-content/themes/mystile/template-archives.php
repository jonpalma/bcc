<?php
// File Security Check
if ( ! empty( $_SERVER['SCRIPT_FILENAME'] ) && basename( __FILE__ ) == basename( $_SERVER['SCRIPT_FILENAME'] ) ) {
    die ( 'You do not have sufficient permissions to access this page!' );
}
?>
<?php
/**
 * Template Name: Archives Page
 *
 * The archives page template displays a conprehensive archive of the current
 * content of your website on a single page. 
 *
 * @package WooFramework
 * @subpackage Template
 */
 
 global $woo_options; 
 get_header();

 $settings = array(
					'thumb_single' => 'true', 
					'single_w' => '800px', 
					'single_h' => '620px', 
					'thumb_single_align' => 'alignright',
	 				'class' => 'img-responsive news'
					);
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
			
			<article <?php post_class(); ?>>
			    
			    <section class="entry fix">
		            
		            <?php woo_loop_before(); ?>
		            
		            <?php
		            	if ( have_posts() ) { the_post();
		            		the_content();
		            	}
		            ?>
				    <!--<h3><?php _e( 'The Last 30 Posts', 'woothemes' ); ?></h3>
					-->												  
				        <?php
				        	query_posts( 'showposts=30' );
				        	if ( have_posts() ) {
				        		while ( have_posts() ) { the_post();
				        ?>
			            <div class="center news-summary">
				            <?php $wp_query->is_home = false; ?>
	                		<?php if ( $settings['thumb_single'] == 'true' ) { woo_image( 'width=' . $settings['single_w'] . '&height=' . $settings['single_h'] . '&class=thumbnail ' . $settings['class'] ); } ?>
				            <?php woo_post_meta(); ?><span class="tags date"><?php the_time( get_option( 'date_format' ) ); ?></span>
				            <a class="news-title" href="<?php the_permalink(); ?>"><h3 class="news-title"><?php the_title(); ?></h3></a>
				        	<div class="summary"><?php the_excerpt(); ?></div>
						</div>
		        	
		        	<div class="divider front-page-hide">
						<div class="col-sm-2 col-xs-3 icons no-padding center-block center">
							<a href="http://pinterest.com/pin/create/bookmarklet/?url=<?php the_permalink(); ?>&is_video=false&description=<?php the_title(); ?>"><img src="<?php bloginfo('template_url');?>/img/noticias/icons/pint.png" alt="pinterest"></a>
							<a class="middle-margin" href="http://twitter.com/intent/tweet?status=<?php the_title(); ?>+<?php the_permalink(); ?>"><img src="<?php bloginfo('template_url');?>/img/noticias/icons/twitter.png" alt="twitter"></a>
							<a href="http://www.facebook.com/sharer/share.php?u=<?php the_permalink(); ?>&title=<?php the_title(); ?>"><img src="<?php bloginfo('template_url');?>/img/noticias/icons/facebook.png" alt="facebook"></a>
						</div>
						<div class="col-sm-1 hidden-xs line"><hr></div>
						<div class="col-sm-7 col-xs-7 line"><hr></div>
						<div class="col-sm-1 col-xs-2 no-padding leer"><a class="read-more center-block center" href="<?php the_permalink(); ?>">Leer</a></div>
						<div class="col-sm-1 hidden-xs line"><hr></div>
					</div>
			        	<?php
				        		}
				        	}
				        	wp_reset_query();
				        ?>	
				    
				    <?php woo_loop_after(); ?>										  
					
					<!--
					<div id="archive-categories" class="fl" style="width:50%">												  
					    <h3><?php _e( 'Categories', 'woothemes' ); ?></h3>	  
					    <ul>											  
					        <?php wp_list_categories( 'title_li=&hierarchical=0&show_count=1' ); ?>	
					    </ul>											  
					</div><!--/#archive-categories-->			     												  

					<!--
					<div id="archive-dates" class="fr" style="width:50%">												  
					    <h3><?php _e( 'Monthly Archives', 'woothemes' ); ?></h3>
																		  
					    <ul>											  
					        <?php wp_get_archives( 'type=monthly&show_post_count=1' ); ?>	
					    </ul>
					</div><!--/#archive-dates-->	 												  

				</section><!-- /.entry -->
			    			
			</article><!-- /.post -->  
			
			</div>
			
			<div class="col-sm-3 feed no-padding">
				<?php get_sidebar('news'); ?>
			</div> 		
		</div>

	</div>
    </div><!-- /#content -->
		
<?php get_footer(); ?>