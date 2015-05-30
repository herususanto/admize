<?php
get_header(); 
?>
<div id="maincontent">
<?php
if(get_theme_mod( 'layout_type')  === 'ls' || get_theme_mod( 'layout_type')  === 'twos') {
	get_sidebar('left');
} ?>
<div id="content" class="<?php echo get_theme_mod( 'layout_type'); ?>">
<?php admize_breadcrumbs(); ?>	
<div class="ad-nav"> 
<?php if($redux_iwebtheme['ads-beforepostlink'] !='') { 
			echo $redux_iwebtheme['ads-beforepostlink']; 
			} ?>
		</div> 
	<?php if (have_posts()) : ?>			
	<?php while(have_posts())  : the_post(); ?>
	<?php get_template_part('/includes/content'); ?>
	<?php endwhile; 
		if (function_exists("pagination")) { 
		 pagination();
		} else {
		posts_nav_link(' &#183; ', 'previous page', 'next page'); 	
	} ?>
	<?php else : ?>
	<div class="post">
		<div class="posttitle">
			<h2><?php _e('No results found for', 'iwebtheme'); ?>: <?php the_search_query(); ?></h2>
				<span class="posttime"></span>
		</div>
	</div>
	<?php endif; ?>	      										
	</div> <!-- end div #content -->			
<?php
if(get_theme_mod( 'layout_type')  === 'rs' || get_theme_mod( 'layout_type')  === 'twos') {
	get_sidebar('right');
} ?>
<?php get_footer(); ?>