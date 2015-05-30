<?php if(has_post_thumbnail()) : ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
	<span class="postmeta_box front">
		<?php get_template_part('/includes/postmeta'); ?>
	</span>
	<div class="thumbnail">
		<?php if ( has_post_thumbnail() ) {
		the_post_thumbnail();
		} ?>
	</div>
	<div class="entry">
	<?php the_content( __( 'Read More', 'iwebtheme' ) ); ?>
	</div>
	<div class="postmeta_box">
	<?php _e('Posted under: ', 'iwebtheme'); ?><span itemprop="articleSection" class="postcateg"><?php the_category(', '); ?></span>
	</div>
</article>
<?php else : ?>	
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
<span class="postmeta_box front">
		<?php get_template_part('/includes/postmeta'); ?>
</span>	
		<div class="entry">		
		<?php the_content( __( 'Read More', 'iwebtheme' ) ); ?>
		</div>
</article>
<?php endif; ?>