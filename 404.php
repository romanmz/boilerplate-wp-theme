<?php get_header() ?>



<main class="main-row">
	<div class="wrapper">
		
		
		<div class="page-container">
			<div class="page-content">
				
				
				<article id="content">
					<?php
					// On private pages, prompt users to login with their account
					$post = get_queried_object();
					if( gettype( $post ) == 'object' && get_class( $post ) == 'WP_Post' && $post->post_status == 'private' ) : ?>
						
						<h1>Restricted Content</h1>
						<p>You need to be logged in to be able to view this page.</p>
						<?php wp_login_form() ?>
						
					<?php else : ?>
						
						<h1>Page not found</h1>
						<p>You can use the site navigation or this search form to find what you're looking for.</p>
						<?php get_search_form() ?>
						
					<?php endif ?>
				</article><!-- #content -->
				
				
			</div><!-- .page-content -->
			<div class="page-sidebar">
				
				
				<?php get_sidebar() ?>
				
				
			</div><!-- .page-sidebar -->
		</div><!-- .page-container -->
		
		
	</div><!-- .wrapper -->
</main><!-- .main-row -->



<?php get_footer() ?>
