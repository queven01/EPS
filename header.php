<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package EPS_Theme
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
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'EPS_Theme' ); ?></a>

	<header id="masthead" class="site-header">
		<div class="site-header-container">	
			<div class="site-branding">
				<?php
				
				if ( has_custom_logo() ) : 
					the_custom_logo();
				else : ?>
					<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>					
				<?php endif;
				$EPS_Theme_description = get_bloginfo( 'description', 'display' );
				if ( $EPS_Theme_description || is_customize_preview() ) :
					?>
					<p class="site-description"><?php echo $EPS_Theme_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
				<?php endif; ?>
			</div><!-- .site-branding -->

			<nav id="site-navigation" class="main-navigation">
				<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
					<span class="bar"></span>
					<span class="bar"></span>
					<span class="bar"></span>
				</button>
				<!-- <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'EPS_Theme' ); ?></button> -->
				<?php
				// wp_nav_menu(
				// 	array(
				// 		'theme_location' => 'menu-1',
				// 		'menu_id'        => 'primary-menu',
				// 	)
				// );
				?>
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'menu-1',
						'menu_class'     => 'mega-menu', // You can add any class here to customize
					)
				);
				?>
			</nav><!-- #site-navigation -->
		</div>
	</header><!-- #masthead -->
