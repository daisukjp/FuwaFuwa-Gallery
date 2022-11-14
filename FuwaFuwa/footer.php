		</main><!-- #site-content -->

		<?php if ( is_active_sidebar( 'footer-one' ) || is_active_sidebar( 'footer-two' ) ) : ?>

			<div class="footer-widgets section-inner">

				<?php if ( is_active_sidebar( 'footer-one' ) ) : ?>
					<div class="footer-widgets-col column-one">
						<?php dynamic_sidebar( 'footer-one' ); ?>
					</div>
				<?php endif; ?>

				<?php if ( is_active_sidebar( 'footer-two' ) ) : ?>
					<div class="footer-widgets-col column-two">
						<?php dynamic_sidebar( 'footer-two' ); ?>
					</div>
				<?php endif; ?>
				
			</div><!-- .footer-widgets -->

		<?php endif; ?>

		<div class="credits section-inner">
			<p>&copy; <?php echo date( 'Y' ); ?> <a href="<?php echo esc_url( home_url() ); ?>"><?php bloginfo( 'name' ); ?></a></p>
			
		</div><!-- .credits -->

		<?php wp_footer(); ?>

		<script src="<?php echo get_stylesheet_directory_uri(); ?>/assets/js/infinite-scroll.js"></script>
	</body>
	
</html>