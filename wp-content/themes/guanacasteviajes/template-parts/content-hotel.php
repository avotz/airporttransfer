<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package airporttransfer
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<div class="product-header">
    <div class="main-hotel-photo">
        <figure class="main-hotel-photo-figure">
        <?php if ( has_post_thumbnail() ) :

                $id = get_post_thumbnail_id($post->ID);
                $thumb_url = wp_get_attachment_image_src($id,'large', true);
                ?>
                
            
            
            <?php endif; ?>
            
            <div class="woocommerce-product-gallery__wrapper tour-banner" style="background-image: url('<?php echo $thumb_url[0] ?>');">
                
            </div> 
        </figure>
        
    </div>

    <div id="slider-gallery" class="slider-gallery owl-carousel">
            <?php $photos = rwmb_meta( 'rw_gallery_thumb', 'type=image&size=tour-slider-gallery' ); 
                if ( $photos ) {
                    
                foreach ( $photos as $photo ){
                            
                        ?>
                        <div class="woocommerce-product-gallery__image">
                            <a href="<?php echo $photo['url'] ?>"> <img src="<?php echo $photo['url'] ?>" alt="Title"></a>
                        </div>
                        
                           
                        
                        <?php } 

        
                }
            ?>
       
    </div>
    <div class="product-title-container">
    <?php the_title( '<h1 class="product_title entry-title">', '</h1>' ); ?>
    </div>
    
    
</div>
	<div class="container mx-auto">
    <div class="entry-content hotel-content">
		<div class="hotel-content-main">
        <h2 class="entry-title hasBorder inline-block">Information</h2>
        <?php
			the_content();

			
		?>
        </div>  
            <div class="hotel-content-sidebar">
               <div class="">
                    <h2 class="text-3xl ">Airport Transportation</h2>
                </div>
			<iframe src="https://booking.airporttransfercostarica.com/booking/widget" id="eto-iframe-booking-widget" allow="geolocation" width="100%" height="250" scrolling="no" frameborder="0" style="width:1px; min-width:100%; border:0;">This option will not work correctly. Unfortunately, your browser does not support inline frames.</iframe>
<script src="https://booking.airporttransfercostarica.com/assets/plugins/iframe-resizer/iframeResizer.min.js"></script>
<script>iFrameResize({log:false, targetOrigin:'*', checkOrigin:false}, "iframe#eto-iframe-booking-widget");</script>	
				
 <p style="color: #ff6600" align="center" ><strong>Why book with us?</strong></p>
          <ul class="fa-ul">
  <li><i class="fa-li fa fa-usd fa-lg" style="color: #ff6600"></i>No hidden cost.</li>
  <li><i class="fa-li fa fa-check-square fa-lg" style="color: #ff6600"></i>Instant booking confirmation.</li>
  <li><i class="fa-li fa fa-credit-card fa-lg" style="color: #ff6600"></i>Best price guarantee.</li>
  <li><i class="fa-li fa fa-headphones fa-lg" style="color: #ff6600"></i>Customer care available 24/7.</li> 
</ul>        
<div>
Our promise is to offer great airport transfer service and superior customer service. If you need to cancel, make changes or help planning your vacation you can count on us to be there by your side.        
        </div>
          
	</div><!-- .entry-content -->
    </div>
    

	
</article><!-- #post-<?php the_ID(); ?> -->
