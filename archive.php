<?php
get_header(); 
?>
<div id="maincontent">
<?php
if(get_theme_mod( 'layout_type')  === 'ls' || get_theme_mod( 'layout_type')  === 'twos') {
	get_sidebar('left');
} ?>
				<div id="content" class="<?php echo get_theme_mod( 'layout_type'); ?>">
				<?php if (have_posts()) : ?>
				<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>					
				<?php /* If this is a category archive */ if (is_category()) { ?>		
				<?php admize_breadcrumbs(); ?>	
				<?php /* If this is a tag archive */  } elseif( is_tag() ) { ?>
				<?php admize_breadcrumbs(); ?>	
				<?php /* If this is a daily archive */ } elseif (is_day()) { ?>		<?php _e('Archive for', 'iwebtheme'); ?> <?php the_time('F jS, Y'); ?>
				<?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
				<?php admize_breadcrumbs(); ?>	
				<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
				<?php admize_breadcrumbs(); ?>	
				<?php /* If this is a search */ } elseif (is_search()) { ?>
				<?php admize_breadcrumbs(); ?>	
				<?php /* If this is an author archive */ } elseif (is_author()) { ?>
				<?php admize_breadcrumbs(); ?>	
				<?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?> <?php _e('Blog Archives', 'iwebtheme'); ?> <?php } ?>
			<?php while(have_posts())  : the_post(); ?>
					<?php get_template_part('/includes/content'); ?>
					<?php endwhile; ?>
					<?php else : ?>
					<div class="post">
					<div class="posttitle">
					<h2><?php _e('404 Error&#58; Not Found', 'iwebtheme'); ?></h2>
					<span class="posttime"></span>
					</div>
					</div>
					<?php endif; ?>
					<?php 
					if (function_exists("pagination")) { 
			 pagination();
			} else {
			posts_nav_link(' &#183; ', 'previous page', 'next page'); 	
			} 
					?>
<div class="ad-bottom"> 
<?php if(get_theme_mod( 'ad_bottom') !='') { 
			echo get_theme_mod( 'ad_bottom'); 
			} ?>
		</div> 
					</div>
<?php
if(get_theme_mod( 'layout_type')  === 'rs' || get_theme_mod( 'layout_type')  === 'twos') {
	get_sidebar('right');
} get_footer(); ?>