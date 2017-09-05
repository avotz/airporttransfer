<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
$categories = get_terms( array(
	'taxonomy' => 'product_cat',
	'hide_empty' => false
	
) );

$locations = get_terms( array(
	'taxonomy' => 'location',
	'hide_empty' => false
	
) );

$categorySelected = get_query_var('product_cat');
$locationSelected = get_query_var('location');


get_header('shop'); ?>
<section class="main">
	<em class="border-colors"></em>
	 <div class="inner">
		<header class="entry-header">
			<h1 class="entry-title-archive">Tours</h1>
		</header><!-- .entry-header -->
		<div class="tours-filters">
			<form method="get" action="<?php echo esc_url( home_url( '/tours/?product_cat='. $categorySelected .'&location='. $locationSelected ) ); ?>" class="form-filters-tour">
				
				<div class="form-filters-tour-item">
					<label for="location">Where you staying
?</label>
					<select name="location" id="location" style="width: 100%">
						 <option value=""></option>
						<?php foreach ($locations as $loc) : ?>
							<option value="<?php echo $loc->slug ?>" <?php if($locationSelected == $loc->slug ) echo 'selected' ?> ><?php echo $loc->name ?></option>
						<?php endforeach; ?>
					</select>
				</div>
				<div class="form-filters-tour-item">
				<label for="location">Choose your type of adventure</label>
					<select name="product_cat" id="product_cat" style="width: 100%">
						<option value=""></option>
						<?php foreach ($categories as $cat) : ?>
							<option value="<?php echo $cat->slug ?>" <?php if($categorySelected == $cat->slug ) echo 'selected' ?> ><?php echo $cat->name ?></option>
						<?php endforeach; ?>
					</select>
				</div>
			</form>
			
		</div>
		 <div class="tours-items">
		
	
		<?php
			
			 $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

			if($categorySelected && $locationSelected){
				$args = array(
				  'post_type' => 'product',
				  //'order' => 'ASC',
				  'orderby' => array('menu_order' => 'ASC', 'title' => 'ASC'),
				  'posts_per_page' => 12,
				   'paged' => $paged,
				   'tax_query' => array(
						'relation' => 'AND',
		
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
			   
			}elseif($categorySelected){
				$args = array(
				  'post_type' => 'product',
				  //'order' => 'ASC',
				  'orderby' => array('menu_order' => 'ASC', 'title' => 'ASC'),
				  'posts_per_page' => 12,
				   'paged' => $paged,
				   'tax_query' => array(
						
						array(
							'taxonomy' => 'product_cat',
							'field'    => 'slug',
							'terms'    => $categorySelected,
						),
						
					)
 
				);
			  
			}elseif($locationSelected){
				$args = array(
				  'post_type' => 'product',
				  //'order' => 'ASC',
				  'orderby' => array('menu_order' => 'ASC', 'title' => 'ASC'),
				  'posts_per_page' => 12,
				   'paged' => $paged,
				   'tax_query' => array(
						
						array(
							'taxonomy' => 'location',
							'field'    => 'slug',
							'terms'    => $locationSelected,
						),
						
					)
 
				);
			}else{
				$args = array(
				  'post_type' => 'product',
				  //'order' => 'ASC',
				  'orderby' => array('menu_order' => 'ASC', 'title' => 'ASC'),
				  'posts_per_page' => 12,
				   'paged' => $paged
				   
				  
				);
			}

			$items = new WP_Query( $args );
			 // Pagination fix
			  $temp_query = $wp_query;
			  $wp_query   = NULL;
			  $wp_query   = $items;
			  
			if( $items->have_posts() ) {
			  while( $items->have_posts() ) {
				 $items->the_post();
			   
				?>

				  
					 <article class="tours-item" >
						<div class="entry-content grid-item">
							<figure class="entry-thumbnail">
							<a href="<?php the_permalink(); ?>">
								 <?php if ( has_post_thumbnail() ) :

									  $id = get_post_thumbnail_id($post->ID);
									  $thumb_url = wp_get_attachment_image_src($id,'large', true);
									  ?>
									  
								   
									
								  <?php endif; ?>
								  <img src="<?php echo $thumb_url[0] ?>"  alt="<?php the_title(); ?>" title="<?php the_title(); ?>">
							  </a>
							</figure>
							<div class="price">
							<span>From 
							   <?php 
							  
								$currency = get_woocommerce_currency_symbol();

							   $product = new WC_Product( $post->ID ); 
							 /*echo $product->get_price_html();
							  
							 woocommerce_template_loop_price(); */
							  echo $currency;
							  
							  if(get_post_meta( get_the_ID(), '_wc_display_cost', true ))
								echo get_post_meta( get_the_ID(), '_wc_display_cost', true );
							  else 
								echo get_post_meta( get_the_ID(), '_wc_booking_cost', true )
							  // echo word_count(get_the_excerpt(), '24'); ?>
							  </span>
							</div>
							<div class="entry-excerpt">
								<div class="entry-header">
								<div class="tour-title">
								
					
								<h4>
								<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
								</h4>
								</div>
								</div>
								
							</div>
						</div>
					</article>
				
				 
				  
				<?php
			   
				 
			  }
			}
			
		  ?>
		  </div>
		  <?php  the_posts_pagination( array( 'mid_size' => 2 ) ); 
				wp_reset_postdata(); ?>
	</div>
</section>
<?php get_footer( 'shop' ); ?>
