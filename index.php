<?php get_header() ?>



<main class="main-row">
	<div class="wrapper">
		
		
		<div class="page-container">
			<div class="page-content">
				
				
				<section id="content">
					<?php the_archive_title( '<h1>', '</h1>' ) ?>
					<?php the_archive_description( '<div>', '</div>' ) ?>
					
					<?php if( have_posts() ) : ?>
						
						<?php while( have_posts() ) :
							the_post(); ?>
							<article <?php post_class( 'blog-item' ) ?>>
								<?php the_post_thumbnail( [100, 100], ['class' => 'blog-item--thumb'] ) ?>
								<div class="blog-item--content">
									<h3 class="no-margin"><?php the_title() ?></h3>
									<p><?php echo get_the_date() ?></p>
									<p>
										<?php echo strip_tags( get_the_excerpt() ) ?>
										<a href="<?php the_permalink() ?>">Read&nbsp;more
											<span class="screen-reader-text">about <?php the_title() ?></span>
										</a>
									</p>
								</div>
							</article>
						<?php endwhile ?>
						<?php echo get_numbered_posts_pagination() ?>
						
					<?php else : ?>
						
						<p>No posts found</p>
						
					<?php endif ?>
				</section><!-- #content -->
				
				
			</div><!-- .page-content -->
			<div class="page-sidebar">
				
				
				<?php get_sidebar() ?>
				
				
			</div><!-- .page-sidebar -->
		</div><!-- .page-container -->
		
		
	</div><!-- .wrapper -->
</main><!-- .main-row -->



<?php get_footer() ?>
