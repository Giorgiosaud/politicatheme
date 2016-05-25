
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>

	<link href="//www.google-analytics.com" rel="dns-prefetch">

	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="<?php bloginfo('description'); ?>">

	<?php wp_head(); ?>
	<script src='https://www.google.com/recaptcha/api.js'></script>

</head>
<body <?php body_class(); ?>>

	<!-- wrapper -->
	<div class="wrapper">

		<!-- header -->
		<header class="header clear" role="banner">
			<nav class="navbar TopNav" role="navigation">
				<div class="container">
					<!-- Brand and toggle get grouped for better mobile display -->
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#TopNav">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
					</div>
					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse No-Margin-Padding" id="TopNav">
						<?php
						top_nav('TopNav');
						?>
					</div>
				</div>
			</nav>



			<div class="container">
				<div class="col-xs-12 FlexHeader No-Margin-Padding">
					<!-- logo -->
					<div class="logo">
						<? if(!has_custom_logo()){?>
						<a href="<?php echo home_url(); ?>">
							<img src="<?php echo get_template_directory_uri(); ?>/img/logo.png" alt="Logo" class="logo-img img-responsive">
						</a>
						<?php }else{?>
						<?php the_custom_logo();}?>
					</div>
					<div class="Searcher">
					       <div class="spec">  
						       <form class="navbar-form navbar-right form-inline" action="<?echo get_home_url('')?>" role="search">
								<div class="form-group flex-group">
									<input type="text" id="search" name="s" class="form-control">
									<button type="submit" class="SearchButton"><span class="glyphicon glyphicon-search" aria-hidden="search"></span></button>
								</div>
							</form>
						</div>
					</div>
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
					<div class="collapse navbar-collapse No-Margin-Padding" id="MainNav">
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
