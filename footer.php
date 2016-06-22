<footer id="main-footer">
	<div class="container">
		<div class="row">
			<div class="col-sm-2"> </div>
			<?php if ( ! dynamic_sidebar( 'Footer' ) ) : ?><?php endif ?>
			<div class="col-sm-2"> </div>
		</div>
		<div class="row">
			<div class="col-sm-8 col-sm-offset-2 text-center">
				<?php get_search_form(); ?>
			</div>
		</div>
		<div class="row">
			<p class="footer-copyright col-md-12 text-center small">&copy; <?php echo date("Y") ?> <a href="<?php bloginfo('url'); ?>/" title="<?php bloginfo('description'); ?>"><?php bloginfo('name'); ?></a>. All Rights Reserved. Site design by <a href="http://www.brianholt.ca/" target="_blank">Brian Holt</a>.</p>
		</div>
	</div><!--close .container-->
</footer>

<?php wp_footer(); ?>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="<?php bloginfo('template_url'); ?>/js/bootstrap.min.js"></script>
<script type="text/javascript">var templateUrl = "<?php bloginfo('template_directory'); ?>";</script>
<script src="<?php bloginfo('template_url'); ?>/js/bootstrap-datepicker.js"></script>
<script src="<?php bloginfo('template_url'); ?>/js/timepicker.min.js"></script>
<script src="<?php bloginfo('template_url'); ?>/js/scripts.js"></script>
</body>
</html>