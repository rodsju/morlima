	<div id="footWidgets">

		<div class="column">
		  <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer: Column 1') ) : ?> <?php endif; ?>
		</div><!-- /1st column -->

		<div class="column">
		  <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer: Column 2') ) : ?> <?php endif; ?>
		</div><!-- /2nd column -->

		<div class="column">
		  <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer: Column 3') ) : ?> <?php endif; ?>
		</div><!-- /3rd column -->

		<div class="column last">
		  <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer: Column 4') ) : ?> <?php endif; ?>
		</div><!-- /4th column -->

		<div class="cleaner">&nbsp;</div>

	</div><!-- /#footWidgets -->

	<div id="footer">
		<p class="copy"><?php _e('Copyright', 'wpzoom') ?> &copy; <?php echo date("Y",time()); ?> <?php bloginfo('name'); ?>. <?php _e('All Rights Reserved', 'wpzoom') ?>.</p>
	</div><!-- /#footer -->

</div><!-- /#container -->

<?php if (is_single()) { ?><script type="text/javascript" src="https://apis.google.com/js/plusone.js"></script><?php } // Google Plus button ?>

<?php wp_footer(); ?>
</body>
</html>