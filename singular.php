<?php get_header() ?>
<?php the_post() ?>



<main class="main-row">
	<div class="wrapper">
		
		
		<div class="page-container">
			<div class="page-content">
				
				
				<article id="content" <?php post_class() ?>>
					<h1><?php the_title() ?></h1>
					<?php the_content() ?>
					<?php echo get_content_pagination() ?>
				</article><!-- #content -->
				
				
			</div><!-- .page-content -->
			<div class="page-sidebar">
				
				
				<?php get_sidebar() ?>
				
				
			</div><!-- .page-sidebar -->
		</div><!-- .page-container -->
		
		
	</div><!-- .wrapper -->
</main><!-- .main-row -->



<?php get_footer() ?>
