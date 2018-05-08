<footer class="footer-row">
	<div class="wrapper">
		
		
		<nav class="footer-nav">
			<?php wp_nav_menu( ['theme_location'=>'footer', 'depth'=>1] ) ?>
		</nav><!-- .footer-nav -->
		
		
		<p class="no-margin">&copy; Copyright <?php echo date( 'Y' ) ?> <?php bloginfo( 'name' ) ?>.
			Site by <a href="https://romanmartinez.me" target="_blank">Roman Martinez</a></p>
		
		
	</div><!-- .wrapper -->
</footer><!-- .footer-row -->



<?php wp_footer() ?>
</body>
</html>
