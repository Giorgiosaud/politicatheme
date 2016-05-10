			<!-- footer -->
			<footer class="footer text-center" role="contentinfo">
				<div class="container">
					<div class="col-xs-12 FlexHeader">
						<div class="col-xs-12 col-sm-6 col-sm-offset-3">
							<?php echo get_theme_mod( 'footer_text_setting', '<p class="copyright">Universidad Central de Chile • Todos los derechos reservados</p>
<p>Edificio Vicente Kovacevic II • Avenida Santa Isabel 1278, Santiago de Chile</p><p>Fono: <a href="tel:+5625826601">(+56 2) 582 6601</a> • <a href="mailto:politicaygobierno@ucentral.cl">politicaygobierno@ucentral.cl </a></p>' )?>
							<div class="clearfix"></div>
						</div>
						<div class="col-xs-12 col-sm-3">
							<div class="FacebookLink FaceFooter pull-right">
								<a href="<?= get_theme_mod('facebook_site','#')?>"><i class="socicon-facebook"></i></a>
							</div>
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
		<script type="text/javascript">

			var map;
			function initMap() {
				if(document.getElementById('map')){
					var geocoder = new google.maps.Geocoder();
					geocodeAddress(geocoder);
				}
			}

			function geocodeAddress(geocoder) {
				var url=location.origin;
				var address = 'Edificio Vicente Kovacevic II, Avenida Santa Isabel 1278, Santiago de Chile';
				var image = {
					url: url+'/wp-content/themes/politicaygobierno/img/maps-marker-politica.png',
					// This marker is 20 pixels wide by 32 pixels high.
					size: new google.maps.Size(147, 80),
					// The origin for this image is (0, 0).
					origin: new google.maps.Point(0, 0),
					// The anchor for this image is the base of the flagpole at (0, 32).
					anchor: new google.maps.Point(70, 80)
				};
				geocoder.geocode({'address': address}, function(results, status) {
					if (status === google.maps.GeocoderStatus.OK) {
						map = new google.maps.Map(document.getElementById('map'), {
							center: results[0].geometry.location,
							zoom: 16
						});
						var marker = new google.maps.Marker({
							map: map,
							icon: image,

							position: results[0].geometry.location
						});
					} else {
						alert('Geocode was not successful for the following reason: ' + status);
					}
				});
			}


		</script>
		<script async defer
		src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBl7E5JtmepAPqWiVfg5Sblxs12lizYjCs&callback=initMap">
	</script>



</body>
</html>
