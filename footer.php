			<!-- footer -->
			<footer class="footer text-center" role="contentinfo">
				<div class="container">
					<div class="col-xs-12 col-sm-6 col-sm-offset-3">
						<?php echo get_theme_mod( 'footer_text_setting', '' )?>
						<div class="clearfix"></div>
					</div>
					<div class="col-xs-12 col-sm-3">
					<div class="FacebookLink FaceFooter pull-right">
							<a href="<?= get_theme_mod('facebook_site')?>"><i class="socicon-facebook"></i></a>
						</div>
					</div>
				</div>
			</footer>
			<!-- /footer -->

		</div>
		<!-- /wrapper -->

		<?php wp_footer(); ?>

		<!-- analytics -->
		<script>
			(function(f,i,r,e,s,h,l){i['GoogleAnalyticsObject']=s;f[s]=f[s]||function(){
				(f[s].q=f[s].q||[]).push(arguments)},f[s].l=1*new Date();h=i.createElement(r),
				l=i.getElementsByTagName(r)[0];h.async=1;h.src=e;l.parentNode.insertBefore(h,l)
			})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
			ga('create', 'UA-XXXXXXXX-XX', 'yourdomain.com');
			ga('send', 'pageview');
		</script>

	</body>
	</html>
