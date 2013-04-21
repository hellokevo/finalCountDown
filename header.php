<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package Toolbox
 * @since Toolbox 0.1
 */
?><!DOCTYPE html>
<!--[if IE 6]>
<html id="ie6" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 7]>
<html id="ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html id="ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 6) | !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'toolbox' ), max( $paged, $page ) );

	?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<?php if ( is_singular() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' ); ?>
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->

<?php wp_head(); ?>

<!-- include jQuery library -->
<script src="<?php bloginfo( 'template_url' ); ?>/js/jquery-1.9.1.min.js" type="text/javascript" charset="utf-8"> </script>
<!-- include Cycle plugin -->
<script src="<?php bloginfo( 'template_url' ); ?>/js/jquery.cycle.all.js" type="text/javascript" charset="utf-8"> </script>
<script type="text/javascript">$(document).ready(function(){$('.slideshow').cycle({fx:'fade'});});</script>
<script src="<?php bloginfo( 'template_url' ); ?>/js/galleria-1.2.9.js" type="text/javascript" charset="utf-8"> </script>

<script> jQuery(document).ready(function($) {
 //STICKY NAV
 var isMobile = {
 Android: function() {
 return navigator.userAgent.match(/Android/i) ? true : false;
 },
 BlackBerry: function() {
 return navigator.userAgent.match(/BlackBerry/i) ? true : false;
 },
 iOS: function() {
 return navigator.userAgent.match(/iPhone|iPad|iPod/i) ? true : false;
 },
 Windows: function() {
 return navigator.userAgent.match(/IEMobile/i) ? true : false;
 },
 any: function() {
 return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Windows());
 }
 };
//Calculate the height of <header>
 //Use outerHeight() instead of height() if have padding
 var aboveHeight = $('.top-row').outerHeight();

 //when scroll
 $(window).scroll(function(){

 //if scrolled down more than the header’s height but this isn't mobile
 if ($(window).scrollTop() > aboveHeight && !isMobile.any()){

 // if yes, add “fixed” class to the <nav>
 // add padding top to the #content 
 // (value is same as the height of the nav)
 $('.block-type-navigation').addClass('fixed').css('top','0').next()
 .css('padding-top','42px');

 } else {

 // when scroll up or less than aboveHeight,
 // remove the “fixed” class, and the padding-top
 $('.block-type-navigation').removeClass('fixed').next()
 .css('padding-top','0');
 }
 });
});
</script>

</head>

<body <?php body_class(); ?>>
	 
	 <div id="wrapper">

<div id="page" class="hfeed">
<?php do_action( 'before' ); ?>
	<header id="branding" role="banner">
		<hgroup>
			<h1 id="site-title"><a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<h2 id="site-description"><?php bloginfo( 'description' ); ?></h2>
		</hgroup>

		<nav class= "fixed block-content" id="access" role="navigation">
			<h1 class="assistive-text section-heading"><?php _e( 'Main menu', 'toolbox' ); ?></h1>
			<div class="skip-link screen-reader-text"><a href="#content" title="<?php esc_attr_e( 'Skip to content', 'toolbox' ); ?>"><?php _e( 'Skip to content', 'toolbox' ); ?></a></div>

			<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
		</nav><!-- #access -->
	</header><!-- #branding -->

	<div id="main">