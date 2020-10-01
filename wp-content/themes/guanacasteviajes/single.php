<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package guanacasteviajes
 */

get_header(); 
if ( 'hotel' === get_post_type() || 'booking-hotel' === get_post_type()) :
?>
<div id="primary" class="content-area">
		<main id="main" class="site-main">
			

		<?php
		while ( have_posts() ) : the_post();

			get_template_part( 'template-parts/content', get_post_type() );
		

		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
</div><!-- #primary -->
<?php else: ?>
	<section class="main">
           
             <div class="container mx-auto">
					<div class="blog-container flex flex-wrap justify-between">
							<div class="blog-info">
									<?php
									while ( have_posts() ) : the_post();
			
										get_template_part( 'template-parts/content', get_post_format() );
			
										the_post_navigation();
			
										// If comments are open or we have at least one comment, load up the comment template.
										if ( comments_open() || get_comments_number() ) :
											comments_template();
										endif;
			
									endwhile; // End of the loop.
									?>
							</div>
							<div class="blog-sidebar">
								<?php get_sidebar(); ?>
							</div>
						</div>
            </div>
        </section>

	
<?php
endif;

get_footer();

