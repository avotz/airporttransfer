<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package airporttransfer
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="google-site-verification" content="0WKJexcAYvBAbJ_3yC2PFLDKDunq6PsyMuKaE7K1gbs" />
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<header class="header">
		<section class="up-box">
			<div class="inner">
				<div class="up-box-container">
					<div class="up-box-contact">
						<b>USA PHONE NUMBER:</b> +1-404-448-1729<br>
						<b>COSTA RICA:</b> OFFICE: +506-2573-2323 / EMERGENCY: +506-8704-3690 <br>
						THE OFICCIAL AIRPORT TRANSFER COMPANY
					</div>
					<div class="up-box-social">
						<a href="https://www.facebook.com/GuanacasteViaje" target="_blank"><i class="fa fa-facebook"></i></a>
						<a href="https://wa.me/0050687043690" target="_blank"><i class="fa fa-whatsapp"></i></a>
						<a href="https://twitter.com/GuanacasteVjs" target="_blank"><i class="fa fa-twitter"></i></a>
						<a href="https://plus.google.com/b/103229597720510667827/103229597720510667827/about?gmbpt=true&pageId=103229597720510667827&hl=en" target="_blank"><i class="fa fa-google-plus"></i></a>
						<a href="https://www.youtube.com/channel/UCOMPdeJl_Ft5VvyfMMu2h3g" target="_blank"><i class="fa fa-youtube"></i></a>
						<a href="http://www.tripadvisor.com/Attraction_Review-g309240-d2102243-Reviews-Guanacaste_Viajes_Tours-Liberia_Province_of_Guanacaste.html" target="_blank"><i class="fa fa-tripadvisor"></i></a>
					</div>
				</div>
			</div>
			<em class="border-colors"></em>
		</section>
		<section class="down-box">
			<div class="inner">
				<div id="logo"><a href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php echo get_template_directory_uri();  ?>/img/logo.png" alt="Guanacaste Viajes"></a></div>
				<?php wp_nav_menu(
					array(
						'theme_location' => 'header',
						'menu_id' => 'menu',
						'container'       => 'nav',
						'container_class' => 'header-menu',
						'container_id'    => '',
						'menu_class'      => 'header-menu-ul',
					)
				);
				?>
				<a href="#" class="btn-menu"><i class="icon-menu"></i></a>


				<div class="relative">

					<!-- <a href="https://airporttransfercostarica.com/reservation-page/" onclick="location.replace('https://airporttransfercostarica.com/reservation-page/')" class="btn-budget transfer-popup-link" target="_blank">Book Transfer </a> -->
					<a href="https://airporttransfercostarica.com/contact-us" class="btn-budget transfer-popup-link">Book Transfer </a> 
				</div>

			</div>
		</section>
	</header>