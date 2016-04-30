<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>

	<link href="//www.google-analytics.com" rel="dns-prefetch">
	<!-- <link href="<?php echo get_template_directory_uri(); ?>/img/icons/favicon.ico" rel="shortcut icon"> -->
	<!-- <link href="<?php echo get_template_directory_uri(); ?>/img/icons/touch.png" rel="apple-touch-icon-precomposed"> -->

	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="<?php bloginfo('description'); ?>">

	<?php wp_head(); ?>

</head>
<body <?php body_class(); ?>>

	<!-- wrapper -->
	<div class="wrapper">

		<!-- header -->
		<header class="header clear" role="banner">
			<nav class="TopNav" role="navigation">
				<?php top_nav(); ?>
				<div class="clearfix"></div>
			</nav>
			<div class="container">
				<!-- logo -->
				<div class="logo col-xs-12 col-sm-6">
					<a href="<?php echo home_url(); ?>">
						<!-- svg logo - toddmotto.com/mastering-svg-use-for-a-retina-web-fallbacks-with-png-script -->
						<img src="<?php echo get_template_directory_uri(); ?>/img/logo.png" alt="Logo" class="logo-img img-responsive">
					</a>
				</div>
			</div>
			<!-- /logo -->

			<!-- nav -->
			<nav class="navbar navbar-politica" role="navigation">
				<div class="container">
					<!-- Brand and toggle get grouped for better mobile display -->
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#MainNav">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
					</div>
					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse" id="MainNav">
						<?php
						main_nav('MainNav');
						?>
					</div>
				</div>
			</nav>
		</header>


		<!-- /nav -->

	</header>
	<!-- /header -->
