<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package White_Water
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main container">
			<div class="row">
				<div class="col-lg-8">
					<?php while ( have_posts() ) : the_post(); ?>
							<div class="row myPost mt-4">
							<div class="col-lg-1">
								<p class="post-date">
									<?php white_water_posted_on_day()?>	
								</p>
								<h1 class="post-date day">
									<?php white_water_posted_on_date()?>	
								</h1>
								<p class="post-date">
									<?php white_water_posted_on_month()?>	
								</p>
								
							</div>
							<div class="col-lg-6">
								<?php
									white_water_post_thumbnail();
								?>	
							</div>
							<div class="col-lg-5">
								<div class="row">
									<div class="col-12">
										<p class="grayText">TOPLINE INFORMATION</p>
										<a class="post-title" href="<?php the_permalink() ?>"><?php the_title();?></a>
									</div>
								</div>
								<div class="row pt-2">
									<div class="col-12">
										<span class="grayText">Doors: <?php echo get_post_meta($post->ID, 'start_time', true);?> (ends at <?php echo get_post_meta($post->ID, 'end_time', true);?>)</span>
									</div>
								</div>
								<div class="row pt-2 pb-2">
									<div class="col-6">
										<button class="btn btn btn-outline-secondary post-btn"><span><img class="btn-thmb" src="wp-content/themes/white-water/assets/images/getTicket.png"></span>Get tickets</span></button>
									</div>
									<div class="col-6">
										<span class="cost"><?php echo get_post_meta($post->ID, 'cost', true); ?></span>
									</div>
								</div>
								<div class="row pt-2">
									<div class="col-12">
										<p class="grayText"> THIS EVENT IS <?php echo get_post_meta($post->ID, 'age', true); ?></p>
									</div>
								</div>
							</div>
							</div>
							<?php		

							// If comments are open or we have at least one comment, load up the comment template.
							if ( comments_open() || get_comments_number() ) :
								comments_template();
							endif;

						endwhile; // End of the loop.
						?>
					</div>
					<div class="col-lg-4 mt-4">
						<?php get_sidebar();?>
					</div>
				</div>
					</main><!-- #main -->
	</div><!-- #primary -->

			
<?php

get_footer();
