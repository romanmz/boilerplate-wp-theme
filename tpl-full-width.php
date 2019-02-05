<?php // Template Name: Full Width ?>
<?php get_header() ?>
<?php the_post() ?>



<main class="main-row">
	<div class="wrapper">
		
		
		<article id="content" <?php post_class() ?>>
			<h1><?php the_title() ?></h1>
			<?php the_content() ?>
			<?php echo get_content_pagination() ?>
		</article><!-- #content -->
		
		
	</div><!-- .wrapper -->
</main><!-- .main-row -->



<?php get_footer() ?>
