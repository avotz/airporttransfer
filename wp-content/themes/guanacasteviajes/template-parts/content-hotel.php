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
                    <h2>Airport Transportation</h2>
                </div>
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12">
                        <div class="form-group">
                            <span id="lblTransferType">Transfer Type</span>
                            <select name="ddlTransferType" id="ddlTransferType" class="form-control">
								<option value="1" data-type="roundtrip">Round Trip</option>
								<option value="2" data-type="tohotel">Transfer to Hotel</option>
								<option value="" data-type="toairport">Transfer to Airport</option>

							</select>
                        </div>
                    </div>
                </div>
    
        <div class="row">
                    <div id="layerAdult" class="col-md-6 col-lg-6 col-sm-12">
                        <div class="form-group">
                            <span id="MainContent_lblAdults">Adults</span>
                            <select name="ddlAdults" id="ddlAdults" class="form-control">
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
								<option value="5">5</option>
								<option value="6">6</option>
								<option value="7">7</option>
								<option value="8">8</option>
								<option value="9">9</option>
								<option value="10">10</option>

							</select>
                        </div>
                    </div>
                    <div id="layerChildren" class="col-md-6 col-lg-6 col-sm-12">
                        <div class="form-group">
                            <span id="MainContent_lblChildren">Children</span>
                            <select name="ctl00$ctl00$MainContent$ddlChildren" id="ddlChildren" class="form-control">
								<option value="0">0</option>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
								<option value="5">5</option>

							</select>
                        </div>
                    </div>
                    <div id="layerInfant" class="col-md-4 col-lg-4 col-sm-12 hidden">
                        <div class="form-group">
                            <span id="MainContent_lblInfalts">Infants (0-1)</span>
                            <select name="ctl00$ctl00$MainContent$ddlInfants" id="ddlInfants" class="form-control">
								<option value="0">0</option>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
								<option value="5">5</option>

							</select>
                        </div>
                    </div>
                </div>   <br>
      
        <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12">
                         <a href="https://airporttransfercostarica.com/reservation-page/" class="move-to-booking">Book Transfer</a>
                        
                    </div><br>
 <p style="color: #ff6600" align="center" ><strong>Why book with us?</strong></p>
          <ul class="fa-ul">
  <li><i class="fa-li fa fa-usd fa-1x" style="color: #ff6600"></i>No hidden cost.</li>
  <li><i class="fa-li fa fa-check-square" style="color: #ff6600"></i>Instant booking confirmation.</li>
  <li><i class="fa-li fa fa-check-square" style="color: #ff6600"></i>Best price guarantee.</li>
  <li><i class="fa-li fa fa-headphones" style="color: #ff6600"></i>Customer care available 24/7.</li> 
</ul>        
<div>
Our promise is to offer great airport transfer service and superior customer service. If you need to cancel, make changes or help planning your vacation you can count on us to be there by your side.        
        </div>
          
	</div><!-- .entry-content -->
    </div>
    

	
</article><!-- #post-<?php the_ID(); ?> -->
