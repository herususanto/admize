<form method="get" id="searchform" action="<?php echo esc_url(home_url('/') ); ?>">
	<div>
	<input type="search" value="Search..." name="s" id="s" onfocus="if (this.value == 'Search...') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Search...';}" />
	</div>
</form>
