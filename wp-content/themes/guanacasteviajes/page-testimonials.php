<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 * Template Name: Page Testimonials 
 * @package airporttransfer
 */

get_header(); ?>
	 <section class="main">
           
             <div class="container mx-auto">
                <?php
				while ( have_posts() ) : the_post();

					get_template_part( 'template-parts/content', 'page' );

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;

				endwhile; // End of the loop.
				?>
				<div class="testimonials">
					<div class="testimonials-container">
						<div class="testimonials-item">
							<div id="TA_selfserveprop112" class="TA_selfserveprop">
							<ul id="MGMOfUp1DQ3" class="TA_links U5emdWS8z">
							<li id="nkHCSZnpIe" class="e1k24v3SPViN">
							<a target="_blank" href="https://www.tripadvisor.com/"><img src="https://www.tripadvisor.com/img/cdsi/img2/branding/150_logo-11900-2.png" alt="TripAdvisor"/></a>
							</li>
							</ul>
							</div>
							<script src="https://www.jscache.com/wejs?wtype=selfserveprop&amp;uniq=112&amp;locationId=2102243&amp;lang=en_US&amp;rating=true&amp;nreviews=4&amp;writereviewlink=true&amp;popIdx=true&amp;iswide=true&amp;border=true&amp;display_version=2"></script>

						</div>
						<div class="testimonials-item">
							<div id="TA_cdswritereviewnew979" class="TA_cdswritereviewnew">
							<ul id="BQsqkp0ik" class="TA_links 442fddMQrYI9">
							<li id="xnAR1zWdL5k" class="oaTejnh55">
							<a target="_blank" href="https://www.tripadvisor.com/"><img src="https://www.tripadvisor.com/img/cdsi/img2/branding/medium-logo-29834-2.png" alt="TripAdvisor"/></a>
							</li>
							</ul>
							</div>
							<script src="https://www.jscache.com/wejs?wtype=cdswritereviewnew&amp;uniq=979&amp;locationId=2102243&amp;lang=en_US&amp;lang=en_US&amp;display_version=2"></script>

						</div>
					</div>
				</div>
            </div>
        </section>
	

<?php
/*get_sidebar();*/
get_footer();
