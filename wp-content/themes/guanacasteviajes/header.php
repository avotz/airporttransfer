<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package guanacasteviajes
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<header class="header fixed py-2 border-b-2 static z-10 top-0 inset-x-0 bg-white">
		<div class="flex flex-wrap justify-between px-4 items-center">
			<a href="<?php echo esc_url(home_url('/')); ?>" class="w-56"><img src="<?php echo get_template_directory_uri();  ?>/img/logo.png" alt="Airport Transfer Costa Rica"></a>
			<?php wp_nav_menu(
					array(
						'theme_location' => 'header',
						'menu_id' => 'menu',
						'container'       => 'nav',
						'container_class' => 'menu',
						'container_id'    => '',
						'menu_class'      => 'menu-ul uppercase md2:flex md2:flex-wrap md2:justify-between text-xs xl:text-base',
					)
				);
				?>
			<a href="<?php echo esc_url(home_url('/reservation-page')); ?>" class="btn-book md2:block border-2 border-white hover:border-green-500 bg-green-500 px-6 py-2 text-white hover:bg-white hover:text-green-500">Book Now</a>
			<div class="btn-menu absolute text-green-500 z-10 cursor-pointer text-3xl">
				<i class="fas fa-bars"></i>
			</div>
		</div>
		

	</header>
