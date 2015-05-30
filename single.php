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
			<?php if(have_posts()) : ?>
			<?php while(have_posts())  : the_post(); ?>
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemscope="itemscope" itemtype="http://schema.org/Article">
				<header class="entry">
				<h1 class="entry-title" itemprop="name"><a itemprop="url" href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h1>
				<?php if(get_theme_mod( 'ad_singlepost') !='') {  ?>
				<div class="ads-beforepost">
				<?php echo stripslashes(get_theme_mod( 'ad_singlepost')); ?>
				</div>
				<?php } ?>
				<span itemprop="articleBody"><?php the_content(); ?></span>
				</header>
				<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'iwebtheme' ), 'after' => '</div>' ) ); ?>
				<span class="postmeta_box">
				<?php get_template_part('/includes/postmeta'); ?>
				<?php  if (get_the_tags()) :?> 
				<span class="tags"><?php if("the_tags") the_tags(''); ?></span><?php endif;?>
				<?php edit_post_link('Edit', ' &#124; ', ''); ?>
				</span><!-- .entry-header -->
				<div class="gap"></div>
		<div id="page-nav" class="clearfix">
			<div id="page-nav-left"><?php previous_post_link('&laquo; %link'); ?></div>
			<div id="page-nav-right"><?php next_post_link('%link &raquo;'); ?></div>
        </div>	

			<div class="comments">	<?php comments_template(); ?>	</div> 
			</article>
			<?php endwhile; ?>
			<?php else : ?>
				<div class="post">
					<h3><?php _e('404 Error&#58; Not Found', 'iwebtheme' ); ?></h3>
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