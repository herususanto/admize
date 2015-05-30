<?php
if(get_theme_mod( 'layout_type')  === 'rs' || get_theme_mod( 'layout_type')  === 'twos') {
	$sb_class = 'rs';
} ?>
<div class="sidebar <?php echo $sb_class; ?>">
<?php if (!dynamic_sidebar('Right Sidebar') ) : ?>
<?php endif; ?>	
</div>