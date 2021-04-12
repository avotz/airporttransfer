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
 * Template Name: Page Tours 
 * @package airporttransfer
 */
$categories = get_terms(array(
	'taxonomy' => 'product_cat',
	'hide_empty' => false

));

$locations = get_terms(array(
	'taxonomy' => 'location',
	'hide_empty' => false

));

$categorySelected = get_query_var('product_cat');
$locationSelected = get_query_var('location');
$q = get_query_var('q');

get_header(); ?>
<section class="main">
	
	<div class="container mx-auto">
		<?php
		while (have_posts()) : the_post();

			get_template_part('template-parts/content', 'page');

			// If comments are open or we have at least one comment, load up the comment template.
			if (comments_open() || get_comments_number()) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>
		<div class="tours-filters">
			<form method="get" action="<?php echo esc_url(home_url('/tours/?product_cat=' . $categorySelected . '&location=' . $locationSelected.'&q=' . $q)); ?>" class="form-filters-tour">

				<div class="form-filters-tour-item">
					<label for="location">Pick up Location
						?</label>
					<select name="location" id="location" style="width: 100%">
						<option value=""></option>
						<?php foreach ($locations as $loc) : ?>
							<option value="<?php echo $loc->slug ?>" <?php if ($locationSelected == $loc->slug) echo 'selected' ?>><?php echo $loc->name ?></option>
						<?php endforeach; ?>
					</select>
				</div>
				<div class="form-filters-tour-item">
					<label for="location">Choose your type of Tour</label>
					<select name="product_cat" id="product_cat" style="width: 100%">
						<option value=""></option>
						<?php foreach ($categories as $cat) : ?>
							<option value="<?php echo $cat->slug ?>" <?php if ($categorySelected == $cat->slug) echo 'selected' ?>><?php echo $cat->name ?></option>
						<?php endforeach; ?>
					</select>
				</div>
				<div class="form-filters-tour-item">
					<label for="location">Keyword Search</label>
					<input type="text" name="q" placeholder="Adventure, river..." value="<?php echo $q ?>"">
				</div>
			</form>

		</div>
		<div class=" tours-items">


					<?php

					$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

					if ($categorySelected && $locationSelected) {
						$args = array(
							'post_type' => 'product',
							//'order' => 'ASC',
							'orderby' => array('menu_order' => 'ASC', 'title' => 'ASC'),
							'posts_per_page' => 12,
							'paged' => $paged,
							's' => $q,
							'tax_query' => array(
								'relation' => 'AND',
								array(
									'taxonomy' => 'type',
									'field'    => 'slug',
									'terms'    => 'tour',
								),
								array(
									'taxonomy' => 'product_cat',
									'field'    => 'slug',
									'terms'    => $categorySelected,
								),
								array(
									'taxonomy' => 'location',
									'field'    => 'slug',
									'terms'    => $locationSelected,

								),
							)

						);
					} elseif ($categorySelected) {
						$args = array(
							'post_type' => 'product',
							//'order' => 'ASC',
							'orderby' => array('menu_order' => 'ASC', 'title' => 'ASC'),
							'posts_per_page' => 12,
							'paged' => $paged,
							's' => $q,
							'tax_query' => array(
								'relation' => 'AND',
								array(
									'taxonomy' => 'type',
									'field'    => 'slug',
									'terms'    => 'tour',
								),
								array(
									'taxonomy' => 'product_cat',
									'field'    => 'slug',
									'terms'    => $categorySelected,
								),

							)

						);
					} elseif ($locationSelected) {
						$args = array(
							'post_type' => 'product',
							//'order' => 'ASC',
							'orderby' => array('menu_order' => 'ASC', 'title' => 'ASC'),
							'posts_per_page' => 12,
							'paged' => $paged,
							's' => $q,
							'tax_query' => array(
								'relation' => 'AND',
								array(
									'taxonomy' => 'type',
									'field'    => 'slug',
									'terms'    => 'tour',
								),
								array(
									'taxonomy' => 'location',
									'field'    => 'slug',
									'terms'    => $locationSelected,
								),

							)

						);
					} else {

						// Creating DateTime() objects from the input data.
						$dateTimeStart = new DateTime('2021-04-12 00:00:00');
						$dateTimeEnd   = new DateTime('2021-04-12 23:00:00');

						// Get all Bookings in Range
						$bookings = WC_Bookings_Controller::get_bookings_in_date_range(
								$dateTimeStart->getTimestamp(),
								$dateTimeEnd->getTimestamp(),
								'',
								false
							);
							var_dump($bookings);
						// Build Array of all the Booked Products for the given Date-Time interval.
						$exclude[] = 0;
						foreach ($bookings as $booking) {
						$exclude[] = $booking->product_id;
						}
						//var_dump($exclude);
						$args = array(
							'post__not_in'  => $exclude,
							'post_type' => 'product',
							//'order' => 'ASC',
							'orderby' => array('menu_order' => 'ASC', 'title' => 'ASC'),
							'posts_per_page' => 12,
							'paged' => $paged,
							's' => $q,
							'tax_query' => array(
								
								array(
									'taxonomy' => 'type',
									'field'    => 'slug',
									'terms'    => 'tour',
								),
								

							)


						);
					}

					$items = new WP_Query($args);
					// Pagination fix
					$temp_query = $wp_query;
					$wp_query   = NULL;
					$wp_query   = $items;

					if ($items->have_posts()) {
						while ($items->have_posts()) {
							$items->the_post();

							?>


							<article class="tours-item">
								<div class="entry-content grid-item">
									<figure class="entry-thumbnail">
										<a href="<?php the_permalink(); ?>">
											<div class="more-detail">More Details</div>
											<?php if (has_post_thumbnail()) :

												$id = get_post_thumbnail_id($post->ID);
												$thumb_url = wp_get_attachment_image_src($id, 'large', true);
												?>



											<?php endif; ?>
											<img src="<?php echo $thumb_url[0] ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>">
										</a>
									</figure>

									<div class="entry-excerpt">
										<div class="entry-header">
											<div class="tour-title">


												<h4>
													<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
												</h4>
											</div>
											<div class="rating">
												<?php if (function_exists("kk_star_ratings")) : echo kk_star_ratings($post->ID);
												endif; ?>
											</div>
											<div class="price">
												<div>
													<span class="from">From</span><span>
														<?php

														$currency = get_woocommerce_currency_symbol();

														$product = new WC_Product($post->ID);
														/*echo $product->get_price_html();
										
										woocommerce_template_loop_price(); */
														echo $currency;

														if (get_post_meta(get_the_ID(), '_wc_display_cost', true))
															echo get_post_meta(get_the_ID(), '_wc_display_cost', true);
														else
															echo get_post_meta(get_the_ID(), '_wc_booking_cost', true)

															?>
													</span>
												</div>
												<div>
													<span class="from"><i class="fas fa-clock"></i> Duration</span> <span><?php echo get_post_meta(get_the_ID(), 'duration', true);?></span>
												</div>
												
											</div>
											<?php /*echo json_encode(get_post_meta(get_the_ID(), '_wc_booking_availability', true));*/?>
										</div>

									</div>
								</div>
								<a href="<?php the_permalink(); ?>" class="absolute inset-0"></a>
							</article>



						<?php


					}
				}

				?>
				</div>
				<?php the_posts_pagination(array('mid_size' => 2));
				wp_reset_postdata(); ?>
		</div>
</section>


<?php
/*get_sidebar();*/
get_footer();
