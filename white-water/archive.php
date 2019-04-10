<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package White_Water
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<?php
				the_archive_title( '<h1 class="page-title">', '</h1>' );
				the_archive_description( '<div class="archive-description">', '</div>' );
				?>
			</header><!-- .page-header -->

			<?php
			/* Start the Loop */
			while ( have_posts() ) :
						<div class="row pb-4">
						<div class="col-lg-8">

<div class="row myPost">
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
</div>
				</div>
				
			
				
			
			<?php
			

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

				// the_post();

				
				//  * Include the Post-Type-specific template for the content.
				//  * If you want to override this in a child theme, then include a file
				//  * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 
				// get_template_part( 'template-parts/content', get_post_type() );

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
