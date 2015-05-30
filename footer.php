	</div>
</div>		
<footer id="footer-wrapper" class="boxed">
	<div class="clearfix">
		<div class="one_fourth first">
		<?php if (!dynamic_sidebar('Footer Widget 1') ) : ?>
			<?php endif; ?>
		</div>
		<div class="one_fourth">
			<?php if (!dynamic_sidebar('Footer Widget 2') ) : ?>
			<?php endif; ?>
		</div>
		<div class="one_fourth">
		<?php if ( !dynamic_sidebar('Footer Widget 3') ) : ?>
			<?php endif; ?>
		</div> 
		<div class="one_fourth last">
			<?php if ( !dynamic_sidebar('Footer Widget 4') ) : ?>
			<?php endif; ?>
		</div> 
	</div>
	<div class="copyright">
	<?php echo get_theme_mod( 'copyright_text', '&copy; Copyright 2015 - Admize. All rights reserved.' ); ?>
	<span class="credit"><a href="<?php echo esc_url( __( 'http://themesprofit.com', 'iwebtheme' ) ); ?>" title="<?php esc_attr_e( 'Themesprofit', 'iwebtheme' ); ?>"><?php printf( __( 'Design by %s', 'iwebtheme' ), 'Themesprofit' ); ?></a></span>
	</div>	
	<a href="#" class="scrollup"><?php _e('&#94;', 'iwebtheme'); ?></a>	
</footer>
<?php wp_footer(); ?>
</body>
</html>