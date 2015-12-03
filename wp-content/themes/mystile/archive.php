<?php
// File Security Check
if ( ! empty( $_SERVER['SCRIPT_FILENAME'] ) && basename( __FILE__ ) == basename( $_SERVER['SCRIPT_FILENAME'] ) ) {
    die ( 'You do not have sufficient permissions to access this page!' );
}
?>
<?php get_header(); ?>

		<?php if (have_posts()) : $count = 0; ?>
        <!--
            <?php if (is_category()) { ?>
        	<header class="archive-header">
        		<h1><?php _e( 'Archive', 'woothemes' ); ?> / <?php single_cat_title( '', true ); ?></h1> 
        		<span class="archive-rss"><?php $cat_id = get_cat_ID( single_cat_title( '', false ) ); echo '<a href="' . get_category_feed_link( $cat_id, '' ) . '">' . __( 'RSS feed for this section', 'woothemes' ) . '</a>'; ?></span>
        	</header>        
        
            <?php } elseif (is_day()) { ?>
            <header class="archive-header">
            	<h1><?php _e( 'Archive', 'woothemes' ); ?> / <?php the_time( get_option( 'date_format' ) ); ?></h1>
            </header>

            <?php } elseif (is_month()) { ?>
            <header class="archive-header">
            	<h1><?php _e( 'Archive', 'woothemes' ); ?> / <?php the_time( 'F, Y' ); ?></h1>
            </header>

            <?php } elseif (is_year()) { ?>
            <header class="archive-header">
            	<h1><?php _e( 'Archive', 'woothemes' ); ?> / <?php the_time( 'Y' ); ?></h1>
            </header>

            <?php } elseif (is_author()) { ?>
            <header class="archive-header">
            	<h1><?php _e( 'Archive by Author', 'woothemes' ); ?></h1>
            </header>

            <?php } elseif (is_tag()) { ?>
            <header class="archive-header">
            	<h1><?php _e( 'Tag Archives:', 'woothemes' ); ?> <?php single_tag_title( '', true ); ?></h1>
            </header>
            
            <?php } ?>
			-->
        <?php
        	// Display the description for this archive, if it's available.
        	woo_archive_description();
        ?>
 <?php
 $settings = array(
					'thumb_single' => 'true', 
					'single_w' => '800px', 
					'single_h' => '620px', 
					'thumb_single_align' => 'alignright',
	 				'class' => 'img-responsive news'
					);
/* GET ID OF CATEGORY */
$page_object = get_queried_object(); 
$ID = $page_object->cat_ID;
$Name = $page_object->cat_name;
?>
    <div class="noticias">
	<div class="container">
		<div class="row productos title-margin">
			<div class="col-sm-4 v-mid"><hr></div>
			<div class="col-sm-4"><h1 class="section-heading center"><?php echo $Name; echo $tagName ?></h1></div>
			<div class="col-sm-4 v-mid"><hr></div>
		</div>
    
    	<div class="row spacing">
			<div class="col-sm-9">
        
	        <div class="fix"></div>
        
        	<?php woo_loop_before(); ?>
        	
        	 		<?php
		            	if ( have_posts() ) { the_post();
		            		/*the_content();*/
		            	}
		            ?>
		            
					<!--<h1><?php echo $ID ?></h1>-->
																  
				        <?php
				        	query_posts( 'showposts=30'.'&cat='.$ID );
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
        	
			<?php /* Start the Loop */ ?>
			
			
			
            
	        <?php else: ?>
	        
	            <article <?php post_class(); ?>>
	                <p><?php _e( 'Sorry, no posts matched your criteria.', 'woothemes' ); ?></p>
	            </article><!-- /.post -->
	        
	        <?php endif; ?>  
	        
	        <?php woo_loop_after(); ?>
    
			<?php woo_pagenav(); ?>
		
			
		
			</div>
			<div class="col-sm-3 feed no-padding">
				<?php get_sidebar('news'); ?>
			</div>
		</div>
    </div>
		
<?php get_footer(); ?>