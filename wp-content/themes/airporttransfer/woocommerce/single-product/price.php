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

/*$categories = get_the_terms( $product->ID, 'product_cat' );
$cat = 'tour';

foreach ($categories as $category) {
if($category->parent == 0){
   $cat = $category->slug;
}

}*/

?>

<div class="product-buttons">
	
	
	<p class="price"><?php echo $product->get_price_html(); ?></p>
	<a href="#tour-popup" class="btn verde tour-popup-link" data-title="<?php echo $product->get_title(); ?>">
	  
       Inquery now
      
      </a>
       <?php if ( $product->id == 210 ) : ?>  <!-- Catamaran -->
       <script src="https://fareharbor.com/integrations/ics/guanacasteviajes/calendar/?token=cae38b1d-7e12-4f64-b17b-d250103a72fd"></script>

      <?php endif; ?>
	

</div>

