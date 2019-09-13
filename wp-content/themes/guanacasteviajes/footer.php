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
								<li><a href="#" class="py-1 block">Diamante Adventure Zip Line</a></li>
								<li><a href="#" class="py-1 block">Manuel Antonio National Park Deluxe</a></li>
								<li><a href="#" class="py-1 block">Damas Mangrove Boat Tour</a></li>
								<li><a href="#" class="py-1 block">Vandara Combo Adventure & Hot Spring</a></li>
								<li><a href="#" class="py-1 block">Arenal Sky Adventure Tour & Tabacon Hot Spring</a></li>
							</ul>
						</div>
						<div class="footer-item w-full md:w-1/3 px-4 mb-10">
							<h3 class="mb-4 uppercase font-medium text-white">Contact</h3>
							<ul class="text-green-100">
									<li><a href="#">USA PHONE NUMBER: +1-404-448-1729</a></li>
									<li><a href="#">COSTA RICA: +506-2573-2323 / +506-8704-3690</a></li>
									<li><a href="#">info@airportransfer.com</a></li>
									
								</ul>
						</div>
						<div class="footer-item w-full md:w-1/3 px-4 md:text-right mb-10">
							<h3 class="mb-4 uppercase font-medium text-white">More Online</h3>
							<ul class="flex flex-wrap justify-center md:justify-end text-3xl text-green-100">
								<li><a href="#" class="p-2"><i class="fab fa-tripadvisor"></i></a></li>
								<li><a href="#" class="p-2"><i class="fab fa-facebook"></i></a></li>
								<li><a href="#" class="p-2"><i class="fab fa-twitter"></i></a></li>
								<li><a href="#" class="p-2"><i class="fab fa-instagram"></i></a></li>
								<li><a href="#" class="p-2"><i class="fab fa-youtube"></i></a></li>
								
							</ul>

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
										<p>Copyright &copy; 2019</p>
									</div>
									<div class="footer-item w-full md:w-1/3 px-4 md:text-right">
										Avotz Web Works
		
									</div>
								</div>
				
						</div>
			</div>
			

		</footer>

<?php wp_footer(); ?>

</body>
</html>