<?php
/**
 * @package WordPress
 * @subpackage Admize theme
 */
if (empty($feed_url)) { $feed_url = get_bloginfo('rss2_url'); }
?>
<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html <?php language_attributes(); ?>> <!--<![endif]-->
<head>
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />	
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div id="top-menu" class="boxed">	
	<div id="top-menu-inner" class="clearfix">
				<?php	
				if ('wp_nav_menu') {		
				wp_nav_menu(
				array(
				'container' => '', 
				'theme_location' => 'top-menu', 
				'fallback_cb' => 'admize_menu'
				));
				}	
				else { admize_menu();}	
				?>
		</div>	
</div> 
<div id="wrapper" class="boxed">
	<div id="header">
		<div id="header-inner" class="clearfix">
			<div id="logo">
				<?php if(get_theme_mod( 'logo-upload') != '') { ?>
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo get_theme_mod( 'logo-upload') ; ?>" alt="" /></a>
				<?php } else { ?>						
				<h1 class="site-title">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
				</h1>			
				<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
				<?php } ?>	
			</div>
			<!-- ads -->		
			<div class="ads-topbanner"> 
				<?php if(get_theme_mod( 'ad_topheader') !='') { 
					echo get_theme_mod( 'ad_topheader'); 
					} ?>
			</div> 
	    </div> 	
	</div>
<div id="secondary-menu" class="boxed">	
	<div id="secondary-menu-inner" class="clearfix">
		<div class="first">
				<?php	
				if ('wp_nav_menu') {		
				wp_nav_menu(
				array(
				'container' => '', 
				'theme_location' => 'topsec-menu', 
				'fallback_cb' => 'admize_menu'
				));
				}	
				else { admize_menu();}	
				?>
			</div>
		</div>	
</div>
<?php if(get_theme_mod( 'ad_toplink') !='') { ?>	
	<div class="ad-nav"> 
<?php echo get_theme_mod( 'ad_toplink'); ?>
</div> 
<?php } ?>