<?php
get_header(); 
?>
<div id="maincontent" class="inner">
<?php
if(get_theme_mod( 'layout_type')  === 'ls' || get_theme_mod( 'layout_type')  === 'twos') {
	get_sidebar('left');
} ?>
	<div id="content" class="<?php echo get_theme_mod( 'layout_type'); ?>">	
	<?php admize_breadcrumbs(); ?>	
		<?php if(have_posts()) : ?><?php while(have_posts())  : the_post(); ?>
		<article id="pagepost-<?php the_ID(); ?>" <?php post_class(); ?> itemscope="itemscope" itemtype="http://schema.org/Article">				
					<h1 class="entry-title" itemprop="name headline"><a itemprop="url" href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h1>
					<div class="entry" class="clearfix">																
						<span itemprop="articleBody"><?php the_content(); ?></span>
						<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'iwebtheme' ), 'after' => '</div>' ) ); ?>
					</div> 
			<span class="postmeta_box">
			<?php get_template_part('/includes/postmeta'); ?><?php edit_post_link('Edit', ' &#124; ', ''); ?>
			</span>
			<div class="comments">
				<?php comments_template(); ?>
			</div>
		</article>
			<?php endwhile; ?>
			<?php else : ?>
				<div class="post">
					<h3><?php _e('404 Error&#58; Not Found', 'iwebtheme'); ?></h3>
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