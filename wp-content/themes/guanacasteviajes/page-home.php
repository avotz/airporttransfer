<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 * Template Name: Page Home 
 * @package guanacasteviajes
 */

get_header();
?>
<section class="banner relative z-0">
		<div class="banner-mini-booking absolute top-0 right-0 hidden lg:block w-1/3 z-10">
			<iframe src="https://booking.airporttransfercostarica.com/booking/widget" id="eto-iframe-booking-widget" allow="geolocation" width="100%" height="250" scrolling="no" frameborder="0" style="width:1px; min-width:100%; border:0;">This option will not work correctly. Unfortunately, your browser does not support inline frames.</iframe>
			<script src="https://booking.airporttransfercostarica.com/assets/plugins/iframe-resizer/iframeResizer.min.js"></script>
			<script>iFrameResize({log:false, targetOrigin:'*', checkOrigin:false}, "iframe#eto-iframe-booking-widget");</script>
		</div>
	<div class="banner-slider">

	<?php echo do_shortcode('[metaslider id="30813"]'); ?>
			
		</div> 
	</section>
	<section id="reservation-transfer" class="reservation-transfer text-center py-8 " >
		<h2 class="text-4xl mb-12 mt-4 relative hasBorder" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="300">Book your Airport Transfer Here</h2>
		<div class="container mx-auto">

		<!-- <div id="bro_reservation" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="300"></div>
		<input id="cid" type="hidden" value="AOKdZADhufaic11ZFe5UWg%3d%3d" /><input id="dbaid" type="hidden" value="PW5zWkTv9KRUJHxtYK4OKQ%3d%3d" /> <script type="text/javascript"> (function () { var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true; po.src = 'https://bookridesonline.com/web/reservation.js'; var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s); })(); </script>

		</div> -->
		 <a href="<?php echo esc_url(home_url('/book-now')); ?>">
		<img class="inline-block" src="<?php echo get_template_directory_uri();  ?>/img/reservation-section.jpg" alt="" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="300">
		</a> 
		<?php/* echo do_shortcode("[easytaxioffice type='booking-widget']"); */?>
		
	</section>
	<section class="featured-tours" >
		<div class="container mx-auto text-center">
			<h2 class="text-4xl mb-12 mt-4 relative hasBorder" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="300">Featured Tours</h2>
			<p class="md:text-xl" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="300">Travelling to Costa Rica is an exciting experience, allowing you to see the beautiful landscape, amazing beaches and vibrant towns and cities.  Here at Guanacaste Viajes & Tours, we want to ensure you have the best possible experience.</p>
		</div>
		<div class="flex flex-wrap justify-between mt-8 mx-4">
			
		<?php

			
				$args = array(
					'post_type' => 'product',
					//'order' => 'ASC',
					'orderby' => array('menu_order' => 'ASC', 'title' => 'ASC'),
					'posts_per_page' => 5,
					'tax_query' => array(
						array(
							'taxonomy' => 'product_cat',
							'field'    => 'slug',
							'terms'    => 'best-seller',
						),
						
					)

				);
				

				$items = new WP_Query($args);
				// Pagination fix
				$temp_query = $wp_query;
				$wp_query   = NULL;
				$wp_query   = $items;

				if ($items->have_posts()) {
					while ($items->have_posts()) {
						$items->the_post();

						?>
					
					<div class="featured-tours-item w-full px-2 <?php echo (($wp_query->current_post +1) == ($wp_query->post_count)) ? '' : 'md:w-1/2'?>" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="300">
						<div class="wrapper overflow-hidden relative">
								<?php if (has_post_thumbnail()) :

								$id = get_post_thumbnail_id($post->ID);
								$thumb_url = wp_get_attachment_image_src($id, 'large', true);
								?>

								<?php endif; ?>
							
								<div class="featured-tours-item-img" style="background-image: url('<?php echo $thumb_url[0] ?>')">
									<div class="featured-tours-item-content">
										<div class="featured-tours-item-info text-white text-center absolute inset-x-0 m-auto px-10">
											<h3 class="text-3xl md:text-4xl text-white"><?php the_title(); ?></h3>
											<?php the_excerpt(); ?>
											<a href="<?php the_permalink(); ?>" class="inline-block px-4 py-2 uppercase">Details <i class="fas fa-angle-right"></i></a>
										</div>
									</div>
									<a href="<?php the_permalink(); ?>" class="featured-tours-item-link inset-0 absolute"></a>
								</div>
							
							
						</div>
					</div>


					



					<?php


				}
				}

				?>
				</div>
				<?php the_posts_pagination(array('mid_size' => 2));
				wp_reset_postdata(); ?>
		
	</section>
	<section class="tripadvisor pt-10 pb-16">
		<div class="container mx-auto text-center">
			<h2 class="text-4xl mb-12 mt-4 relative hasBorder" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="300">What Our Clients Say</h2>
			<div class="tripadvisor-slider text-left">

			<?php
				$args = array(
					'post_type' => 'testimonial',
					//'order' => 'DESC',
					'orderby' => array('menu_order' => 'ASC', 'post_date' => 'DESC'),
					'posts_per_page' => 12,
					

				);
				

				$items = new WP_Query($args);
				// Pagination fix
				$temp_query = $wp_query;
				$wp_query   = NULL;
				$wp_query   = $items;

				if ($items->have_posts()) {
					while ($items->have_posts()) {
						$items->the_post();

						?>
						<div class="tripadvisor-slide bg-gray-200">
							<div class="wrapper">
								<div class="comment mt-12 mx-8 mb-2 ">
									<?php the_content(); ?>
								</div>
								<div class="date mt-12 mx-8 mb-2 uppercase">
								<?php echo rwmb_meta( 'rw_testimonial_date' ); ?>
								</div>
								<div class="rate mt-4 mx-8 mb-2 uppercase text-center">
									<img src="<?php echo get_template_directory_uri();  ?>/img/stars-trip.png" alt="stars">
								</div>
							</div>
						</div>
						

					<?php


					}
				}

				?>
				</div>
				<?php wp_reset_postdata(); ?>
				
				
	
			
		</div>

	</section>
	<section class="news pt-10 pb-16">
			<div class="container mx-auto text-center">
				<h2 class="text-4xl mb-12 mt-4 relative hasBorder" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="300">Latest From Our Blog</h2>
				<p class="text-xl" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="300">Find out the most relevant in Costa Rica with Guanacaste Viajes!</p>

				<div class="flex flex-wrap justify-between mt-8">
				<?php
				$args = array(
					'post_type' => 'post',
					//'order' => 'ASC',
					'orderby' => array('menu_order' => 'ASC', 'title' => 'ASC'),
					'posts_per_page' => 3,
					

				);
				

				$items = new WP_Query($args);
				// Pagination fix
				$temp_query = $wp_query;
				$wp_query   = NULL;
				$wp_query   = $items;

				if ($items->have_posts()) {
					while ($items->have_posts()) {
						$items->the_post();

						?>
						<div class="news-item w-full md:w-1/3 px-2 mb-4" data-aos="zoom-in" data-aos-duration="1000" data-aos-delay="300">
						<div class="wrapper overflow-hidden relative">
								
								<div class="news-item-img relative">
									<?php if (has_post_thumbnail()) :

									$id = get_post_thumbnail_id($post->ID);
									$thumb_url = wp_get_attachment_image_src($id, 'large', true);
									?>

									<?php endif; ?>
									<img src="<?php echo $thumb_url[0] ?>" alt="<?php the_title(); ?>" class="w-full">
									<a href="<?php the_permalink(); ?>" class="news-item-link inset-0 absolute"></a>
								</div>
								<div class="news-item-category absolute text-white uppercase">
								<?php  $categories_list = get_the_category_list( esc_html__( ', ', 'guanacasteviajes' ) );
									if ( $categories_list ) {
										/* translators: 1: list of categories. */
										printf( '<span class="cat-links">' . esc_html__( '%1$s', 'guanacasteviajes' ) . '</span>', $categories_list ); // WPCS: XSS OK.
									}
									?>
								</div>
								
							
							
						</div>
						<div class="news-item-title text-left mt-2 mb-30 relative">
								<h3 class="text-xl md:text-3xl text-black"><?php the_title(); ?></h3>
							
						</div>
					</div>

					

					<?php


					}
				}

				?>
				</div>
				<?php 
				wp_reset_postdata(); ?>

					
				
				<div class="text-center mt-12">
						<a href="<?php echo esc_url(home_url('/news')); ?>" class="inline-block px-6 py-2 bg-green-500 uppercase text-white border-2 border-white hover:border-green-500 hover:bg-white hover:text-green-500">View All</a>
				</div>
				
			</div>
	
		</section>
		<section class="logos border-2 boder-gray-100 pt-10 pb-8">
			<div class="container mx-auto text-center">
				<div class="flex flex-wrap justify-between max-w-lg mx-auto items-center">
					<div class="logos-item w-1/2 md:w-1/4 px-4">
					<a href="https://www.tripadvisor.com/Attraction_Review-g309240-d2102243-Reviews-Guanacaste_Viajes_and_Tours-Liberia_Province_of_Guanacaste.html" target="_blank">
						<img src="<?php echo get_template_directory_uri();  ?>/img/TC_2020_L_WHITE_BG_CMYK-256x301-f306522.png?_t=1599534873.png" alt="" class="w-full">
					</a>
						
					</div>
					
					<div class="logos-item w-1/2 md:w-1/4 px-4">
					<a href=" " target="_blank">
						<img src="<?php echo get_template_directory_uri();  ?>/img/WTTC-SafeTravels-Stamp-Template.jpg" alt="" class="w-full">
					</a>
						
					</div>
					
					
						<div class="logos-item w-1/2 md:w-1/4 px-4">
							<img src="<?php echo get_template_directory_uri();  ?>/img/visa-mastercard-amex-discover-icon.png" alt="" class="w-full">
						</div>
						<div class="logos-item w-1/2 md:w-1/4 px-4">
							<a href="#" class="sitelock" onclick="window.open('https://www.sitelock.com/verify.php?site=airporttransfercostarica.com','SiteLock','width=600,height=600,left=160,top=170');" ><img class="img-responsive" alt="SiteLock" title="SiteLock" src="//shield.sitelock.com/shield/airporttransfercostarica.com" /></a>
							<!-- <img src="<?php echo get_template_directory_uri();  ?>/img/sitelock.jpg" alt="" class="w-full"> -->
						</div>
				</div>
			</div>

		</section>

<?php
//get_sidebar();
get_footer();
