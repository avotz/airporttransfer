<?php
/**
 * Single Product Price, including microdata for SEO
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/price.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;

$categories = get_the_terms( $product->ID, 'product_cat' );
$cat = 'tour';

foreach ($categories as $category) {
if($category->parent == 0){
   $cat = $category->slug;
}

}

?>

<div class="product-buttons">
	
	<?php if($cat == 'tour') : ?>
		<p class="price"><?php echo $product->get_price_html(); ?></p>
		<a href="#tour-popup" class="btn verde tour-popup-link" data-title="<?php echo $product->get_slug(); ?>">
	  
       Inquery now
      
      </a>
	<?php else: ?>
		<p class="price"><?php echo $product->get_price_html(); ?></p>
		<a href="#accommodation-popup" class="btn verde accommodation-popup-link" data-title="<?php echo $product->get_slug(); ?>">
	  
       Inquery now
      
      </a>
	<?php endif; ?>
	<?php /*woocommerce_template_loop_add_to_cart();*/ ?>     
	<?php 
		//$product = new WC_Product( $post->ID );
		/*echo apply_filters( 'woocommerce_loop_add_to_cart_link',
		    sprintf( '<a href="%s" rel="nofollow" data-product_id="%s" data-product_sku="%s" class="button %s product_type_%s readmore">%s</a>',
		        esc_url( $product->add_to_cart_url() ),
		        esc_attr( $product->id ),
		        esc_attr( $product->get_sku() ),
		        $product->is_purchasable() ? 'add_to_cart_button' : '',
		        esc_attr( $product->product_type ),
		        esc_html( $product->add_to_cart_text() )
		    ),
		$product );*/
	 ?>

</div>

