<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<!-- 
        ,@@@@@...
     ,@@@@@@@@@@@@@@..
   ,@@@@~'        `~@@@.
  @@@@                `~
 @@@@@        (_O
@@@@@@@.       /\
@@@@@@@@@..   |\_,-'   
@@@@@@@@@@@@@='~
@@@@@@@@@@@@@@@@@@@@@@@==......__
@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@=...__
@@@@@@@@ SITE BY BRIANHOLT.CA @@@@@@@@@=...__
@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@=...__
-->
	<title><?php echo get_bloginfo('name'); wp_title(' | '); ?></title>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<link rel="icon" href="<?php bloginfo('template_url'); ?>/favicon.ico" type="image/x-icon" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo( 'name' ); ?>" href="<?php bloginfo( 'rss2_url' ); ?>" />
	<link rel="alternate" type="application/atom+xml" title="<?php bloginfo( 'name' ); ?>" href="<?php bloginfo( 'atom_url' ); ?>" />
	<link href='http://fonts.googleapis.com/css?family=Great+Vibes|Maven+Pro:400,900' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/datepicker.css">
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/timepicker.css">
	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	<?php wp_head(); ?>
</head>
<body>

<?php if (!is_single() && !is_archive() && !is_home()) : //Add the feature image unless it's the blog
			if ( is_search() ) { //Search page uses home feature image
				$thumbnail = wp_get_attachment_url(get_post_thumbnail_id(get_page_by_title('Home')->ID));
			} else {
				$thumbnail = ( has_post_thumbnail() ) ? wp_get_attachment_url(get_post_thumbnail_id($post->ID)) : wp_get_attachment_url(get_post_thumbnail_id(get_page_by_title('Home')->ID)); }?>
<section class="page-bg" style="background: url(<?php echo $thumbnail ?>) center center no-repeat; background-size: cover;">
<?php else :
			$bodyBG = wp_get_attachment_url(get_post_thumbnail_id(get_page_by_title('Home')->ID)); ?>
			<style>
				body{background:url(<?php echo $bodyBG ?>) center center no-repeat fixed; background-size: cover;}
				#main-footer {border-top: 15px solid #ffcc00;}
			</style>
<?php endif; ?>

<nav id="main-nav">
	<div class="container">
		<div id="logo">
			<a href="<?php echo home_url(); ?>" title="<?php bloginfo('description'); ?>">
				<img class="tree" src="<?php bloginfo('template_url'); ?>/images/tree.png">
				Whistler Wedding
				<img class="tree" src="<?php bloginfo('template_url'); ?>/images/tree.png">
				<br/>
				<span>Pastor</span>
			</a>
		</div>
		<button class="btn btn-menu visible-xs" data-toggle="collapse" data-target="#header-menu-div">Menu</button>
		<div id="header-menu-div" class="collapse">
			<?php wp_nav_menu( array(	'theme_location' => 'header-menu',
																'container' => '',
																'menu_id' => 'header-menu'
			) ); ?>
		</div>
	</div>
</nav>