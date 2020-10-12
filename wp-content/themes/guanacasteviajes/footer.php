<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package guanacasteviajes
 */

?>

<footer class="footer ">
			<div class="footer-top pt-12 pb-10">
				<div class="container mx-auto text-center">
					<div class="flex flex-wrap justify-between">
						<div class="footer-item w-full md:w-1/3 px-4 md:text-left mb-10">
							<h3 class="mb-4 uppercase font-medium text-white">Tours</h3>
							<ul class="text-green-100">
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
									<li><a href="<?php the_permalink(); ?>" class="py-1 block hover:underline"><?php the_title(); ?></a></li>
									
									<?php

								}
								}

								?>

							</ul>
							<?php wp_reset_postdata(); ?>
						</div>
						<div class="footer-item w-full md:w-1/3 px-4 mb-10">
							<h3 class="mb-4 uppercase font-medium text-white">Contact</h3>
							<ul class="text-green-100">
									<li><a href="#" class="">USA PHONE NUMBER: +1-404-448-1729</a></li>
									<li><a href="#" class="">COSTA RICA: +506-2573-2323 / +506-8704-3690</a></li>
									<li><a href="mailto::reservation@airporttransfercostarica.com" class="hover:underline">reservation@airporttransfercostarica.com</a></li>
									<li><a href="#" class="">75 north from Sea Wonder Academy, Sardinal, Carrillo, Guanacaste</a></li>
									
								</ul>
						</div>
						<div class="footer-item w-full md:w-1/3 px-4 md:text-right mb-10">
							<h3 class="mb-4 uppercase font-medium text-white">More Online</h3>
							<ul class="flex flex-wrap justify-center md:justify-end text-3xl text-green-100">
								<li><a href="https://www.tripadvisor.com/Attraction_Review-g309240-d2102243-Reviews-Guanacaste_Viajes_and_Tours-Liberia_Province_of_Guanacaste.html" class="p-2" target="_blank"><i class="fab fa-tripadvisor"></i></a></li>
								<li><a href="https://www.facebook.com/GuanacasteViaje" class="p-2"><i class="fab fa-facebook" target="_blank"></i></a></li>
								<li><a href="https://twitter.com/guanacasteviaje" class="p-2" target="_blank"><i class="fab fa-twitter"></i></a></li>
								<li><a href="https://www.instagram.com/guanacasteviajes/" class="p-2" target="_blank"><i class="fab fa-instagram"></i></a></li>
								<li><a href="https://www.youtube.com/channel/UCOMPdeJl_Ft5VvyfMMu2h3g" class="p-2" target="_blank"><i class="fab fa-youtube"></i></a></li>
								
							</ul>
							<p class="mt-4 mb-0 font-bold text-white pr-4"> Download our app</p>
							<div class="text-right">
								<a href='https://play.google.com/store/apps/details?id=com.airporttransfercostarica.customer&pcampaignid=pcampaignidMKT-Other-global-all-co-prtnr-py-PartBadge-Mar2515-1' class="inline-block w-64"><img alt='Get it on Google Play' src='https://play.google.com/intl/en_us/badges/static/images/badges/en_badge_web_generic.png' class="w-full" /></a>
								<a href="https://apps.apple.com/us/app/airport-transfer-costa-rica/id1502320287?ls=1" class="inline-block w-64 px-4"><img src="<?php echo get_template_directory_uri();  ?>/img/Download_on_the_App_Store_Badge.svg" alt="App Store Link" class="w-full"></a>
							</div>
							

						</div>
					</div>
				</div>
			</div>
			<div class="footer-bottom border-t-2 border-green-800 text-green-100 py-8">
					<div class="container mx-auto text-center">

							<div class="flex flex-wrap justify-between items-center">
									<div class="footer-item w-full md:w-1/3 px-4 md:text-left">
										<img src="<?php echo get_template_directory_uri();  ?>/img/logo-white.png" alt="" class="inline-block">
									</div>
									<div class="footer-item w-full md:w-1/3 px-4">
										<p>Copyright &copy; 2016-2020</p>

										
									</div>
																			<div class="footer-item w-full md:w-1/3 px-4 md:text-right">
										Avotz Web Works
		
									</div>
								</div>
				
						</div>
			</div>
			

		</footer>

<?php wp_footer(); ?>

<script>
 
    var wpcf7ElmInquireTour = document.querySelector( '#tour-popup div.wpcf7' );
    var wpcf7ElmInquireTransfer = document.querySelector( '.transfer-popup-link' );
    var wpcf7ElmContact = document.querySelector( '#wpcf7-f45-p23-o1' ); //form contact
   
    

      if(wpcf7ElmContact)
    {
          wpcf7ElmContact.addEventListener( 'wpcf7submit', function( event ) {
            ga('send', 'event', 'Contact Form', 'submit');
        }, false );
      }
       if(wpcf7ElmInquireTour)
    {
          wpcf7ElmInquireTour.addEventListener( 'wpcf7submit', function( event ) {
            ga('send', 'event', 'Inquire Tour Form', 'submit');
        }, false );
      }
        if(wpcf7ElmInquireTransfer)
    {
          wpcf7ElmInquireTransfer.addEventListener( 'click', function( event ) {
            ga('send', 'event', 'Book Transfer Button', 'submit');
        }, false );
      }
     
</script>

</body>
</html>
