<?php
if(get_theme_mod( 'layout_type')  === 'ls' || get_theme_mod( 'layout_type')  === 'twos') {
	$sb_class = 'ls';
} ?>
<div class="sidebar <?php echo $sb_class; ?>">
<?php if (!dynamic_sidebar('Left Sidebar') ) : ?>
<?php endif; ?>	
</div>