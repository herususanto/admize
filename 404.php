<?php
get_header(); 
?>
<div id="maincontent">
<?php
if(get_theme_mod( 'layout_type')  === 'ls' || get_theme_mod( 'layout_type')  === 'twos') {
	get_sidebar('left');
} ?>
				<div id="content" class="<?php echo get_theme_mod( 'layout_type'); ?>">
					<div class="post clearfix">
						<h2><?php _e('404 Error&#58; Not Found', 'iwebtheme'); ?>
						</h2>
						<div class="entry">
						<p><?php _e('Sorry, but the page you are trying to reach does not exist.', 'iwebtheme'); ?></p>
						</div>
					</div>
				</div>
<?php
if(get_theme_mod( 'layout_type')  === 'rs' || get_theme_mod( 'layout_type')  === 'twos') {
	get_sidebar('right');
} ?>
<?php get_footer(); ?>