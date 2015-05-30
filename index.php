<?php
get_header(); 
?>
<div id="maincontent">
<?php
if(get_theme_mod( 'layout_type')  === 'ls' || get_theme_mod( 'layout_type')  === 'twos') {
	get_sidebar('left');
} ?>
	<div id="content" class="<?php echo get_theme_mod( 'layout_type'); ?>">
		<?php if(have_posts()) : ?>
		<?php $postcount=0; ?>		
		<?php while(have_posts())  : the_post(); ?>
			<?php get_template_part('/includes/content'); ?>
			<?php $postcount++; ?>
			<?php if($postcount==1){ ?>
				<?php if(get_theme_mod( 'ad_afterfirstpost') !='') { ?>
			<div class="ads-recfront"> 		 
				<?php echo get_theme_mod( 'ad_afterfirstpost'); ?>			
			</div>
			<div class="clear"></div>
			<?php } ?>	
			<?php } ?>
		<?php endwhile; 
		if (function_exists("pagination")) { 
			 pagination();
			} else {
			posts_nav_link(' &#183; ', 'previous page', 'next page'); 	
			} ?>
		<?php else : ?>
		<div class="post">
			<div class="posttitle">
				<h2><?php _e('404 Error&#58; Not Found', 'iwebtheme' ); ?></h2>
				<span class="posttime"></span>
			</div>
		</div>
		<?php endif; ?>	
		<div class="ad-bottom"> 
<?php if(get_theme_mod( 'ad_bottom') !='') { 
			echo get_theme_mod( 'ad_bottom'); 
			} ?>
		</div> 
	</div>
<?php
if(get_theme_mod( 'layout_type')  === 'rs' || get_theme_mod( 'layout_type')  === 'twos') {
	get_sidebar('right');
} ?>
<?php get_footer(); ?>