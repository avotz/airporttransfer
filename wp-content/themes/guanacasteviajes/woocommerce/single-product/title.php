<?php
/**
 * Single Product title
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/title.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see        https://docs.woocommerce.com/document/template-structure/
 * @author     WooThemes
 * @package    WooCommerce/Templates
 * @version    1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}?>
<div class="product-title-container">
	<?php
the_title( '<h1 class="product_title entry-title">', '</h1>' );

?>
<a href="#slider-gallery" class="btn btn-product-readmore anchor block border-2 border-transparent hover:border-yellow-500 bg-yellow-500 px-6 py-2 text-white hover:bg-white hover:text-yellow-500 uppercase">Read more <i class="fa fa-angle-down"></i></a>
</div>

