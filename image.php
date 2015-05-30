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
<h1 class="entry-title"><?php the_title(); ?></h1>
<div class="entry" class="clearfix">

<div class="entry-meta">
								<?php
								$metadata = wp_get_attachment_metadata();
								printf( __( '<span class="meta-prep meta-prep-entry-date">Published </span> <span class="entry-date"><time class="entry-date" datetime="%1$s">%2$s</time></span> at <a href="%3$s" title="Link to full-size image">%4$s &times; %5$s</a> in <a href="%6$s" title="Return to %7$s" rel="gallery">%8$s</a>.', 'iwebtheme' ),
									esc_attr( get_the_date( 'c' ) ),
									esc_html( get_the_date() ),
									esc_url( wp_get_attachment_url() ),
									$metadata['width'],
									$metadata['height'],
									esc_url( get_permalink( $post->post_parent ) ),
									esc_attr( strip_tags( get_the_title( $post->post_parent ) ) ),
									get_the_title( $post->post_parent )
								);
							?>
								<?php edit_post_link( __( 'Edit', 'iwebtheme' ), '<span class="edit-link">', '</span>' ); ?>
								</div><!-- .entry-meta -->
							<div class="entry-content">

						<div class="entry-attachment">
							<div class="attachment">
<?php
$attachments = array_values( get_children( array( 'post_parent' => $post->post_parent, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => 'ASC', 'orderby' => 'menu_order ID' ) ) );
foreach ( $attachments as $k => $attachment ) :
	if ( $attachment->ID == $post->ID )
		break;
endforeach;

$k++;
// If there is more than 1 attachment in a gallery
if ( count( $attachments ) > 1 ) :
	if ( isset( $attachments[ $k ] ) ) :
		// get the URL of the next image attachment
		$next_attachment_url = get_attachment_link( $attachments[ $k ]->ID );
	else :
		// or get the URL of the first image attachment
		$next_attachment_url = get_attachment_link( $attachments[ 0 ]->ID );
	endif;
else :
	// or, if there's only 1 image, get the URL of the image
	$next_attachment_url = wp_get_attachment_url();
endif;
?>								<a href="<?php echo esc_url( $next_attachment_url ); ?>" title="<?php the_title_attribute(); ?>" rel="attachment">
	<?php echo wp_get_attachment_image( $post->ID,'full' ); ?></a>
								<?php if ( ! empty( $post->post_excerpt ) ) : ?>
								<div class="entry-caption">
									<?php the_excerpt(); ?>
								</div>
								<?php endif; ?>
							</div><!-- .attachment -->
						</div><!-- .entry-attachment -->
						<div class="entry-description">
							<?php the_content(); ?>
							<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'iwebtheme' ), 'after' => '</div>' ) ); ?>
						</div><!-- .entry-description -->

					</div><!-- .entry-content -->
							</div> <!-- end div .entry -->	
		<div id="page-nav" class="clearfix">
			<div id="page-nav-left"><?php previous_post_link('&laquo; %link'); ?></div>
			<div id="page-nav-right"><?php next_post_link('%link &raquo;'); ?></div>
        </div>	
			<div class="comments">	<?php comments_template(); ?>	</div> <!-- end div .comments -->		
			<?php endwhile; ?>
			<?php else : ?>
				<div class="post">
					<h3><?php _e('404 Error&#58; Not Found', 'iwebtheme' ); ?></h3>
				</div>
			<?php endif; ?>
		</div> <!-- end div #content -->
<?php
if(get_theme_mod( 'layout_type')  === 'rs' || get_theme_mod( 'layout_type')  === 'twos') {
	get_sidebar('right');
} ?>
<?php get_footer(); ?>