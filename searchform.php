<div role="search" class="search-form">
	<form action="<?php echo home_url() ?>" method="get">
		<input type="search" title="Search for:" placeholder="Search…" name="s" value="<?php esc_attr_e( get_query_var( 's' ) ) ?>">
		<button type="submit" class="button">Search</button>
	</form>
</div>
