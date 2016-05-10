<?php
namespace jorgelsaud\PoliticayGobierno;
use WP_Query;
class Sliders{
	private $slides;
	private $id;

	public function __construct($post_types,$qty,$id)
	{
		$this->id=$id;
		$this->post_types=$post_types;
		$this->qty=$qty;
		$this->getSlides();

	}
	private function getSlides(){
		// return 1;
		$args = array (
			'post_type'              => $this->post_types,
			'post_status'            => array( 'publish' ),
			'posts_per_page'         => $this->qty,
			'order'                  => 'DESC',
			'orderby'                => 'date',
			'meta_query'             => array(
				array(
					'key'       => 'is_slider',
					'value'     => '1',
					'compare'   => '==',
					),
				),
			);
		$this->slides=[];
		// die(var_dump($this->slides));
		$slider_posts_query = new WP_Query( $args );
		if ( $slider_posts_query->have_posts() ) {
			while ( $slider_posts_query->have_posts() ) {
				$slider_posts_query->the_post();
				$cat=get_the_category()[0]->name;
				$slide=new Slide($cat,get_field('titulo_slide'),get_field('imagen_slider'),get_permalink());
				array_push($this->slides,$slide);
			}
		} else {
	// no posts found
		}
		wp_reset_postdata();
		// return $this->slides;
	}
	public function home(){
		ob_start();
		?>
		<div class="Flex MainSlider">
			<div class="col-xs-12 col-sm-9 No-Margin-Padding Flex">
				<div id="<?php echo $this->id?>" class="carousel slide" data-ride="carousel">
					<!-- Indicators -->
					<ol class="carousel-indicators">
						<?php
						foreach ($this->slides as $key => $slide) {
							?>
							<li data-target="#<?php echo $this->id ?>" data-slide-to="<?php echo $key?>" class="<?php if($key==0){echo 'active';}?>"></li>
							<?
						}
						?>
					</ol>

					<!-- Wrapper for slides -->
					<div class="carousel-inner" role="listbox">
						<?php
						foreach ($this->slides as $key => $slide) {
							?>

							<div class="item <?php if($key==0) {echo 'active';} ?>" data-item="<?php echo $key ?>">
								<img src="<?php echo $slide->image ?>" alt="<?php echo $slide->title ?>">
								<div class="carousel-caption">
									<div class="title"><?php echo $slide->title ?></div>
									<div class="subtitle col-xs-12"><?php echo $slide->subtitle ?> <a href="<?php echo $slide->link ?>">Ver Más...</a></div>
								</div>
							</div>
							<?php
						}
						?>
					</div>

					<!-- Controls -->
					<a class="left carousel-control" href="#<?php echo $this->id ?>" role="button" data-slide="prev">
						<span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>
						<span class="sr-only">Previous</span>
					</a>
					<a class="right carousel-control" href="#<?php echo $this->id ?>" role="button" data-slide="next">
						<span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>
						<span class="sr-only">Next</span>
					</a>
				</div>
			</div>
			<div class="hidden-xs col-sm-3 No-Margin-Padding Flex">
				<div class="Slider__Noticias__Titulos Flex Flex--column" id="Slider__Noticias__Titulos<?php echo $this->id?>">
					<?php
					foreach ($this->slides as $key => $slide) {
						?>
						<div class="Slider__Noticias__Titulo Flex--1 <?php if($key==0) {echo 'active';} ?>" data-item="<?php echo $key ?>">
							<div class="Slider__Noticias__Titulo__Intenro">
								<?php echo $slide->subtitle?>
							</div>
						</div>
						<?php
					}?>
				</div>
			</div>
		</div>
		<script>
			jQuery(document).ready(function($) {
				$('.carousel').carousel({
				});
				$('#<?php echo $this->id?>').on('slid.bs.carousel', function () {
					var Actualslide=$(this).find('.active').index();
					$('#Slider__Noticias__Titulos<?php echo $this->id?>').find('.active').removeClass('active');
					$('.Slider__Noticias__Titulo[data-item="'+Actualslide+'"]').addClass('active');


				});
				$('.Slider__Noticias__Titulo').click(function(){
					$item=$(this).data('item');
					$('.carousel').carousel($item)
				})
			});
		</script>
		<?php
		$content=ob_get_clean();
		echo $content;
		// die(var_dump($this->slides));
	}
	public function inner(){
		ob_start();
		?>
		<div class="Flex MainSlider">
			<div class="col-xs-12 No-Margin-Padding Flex">
				<div id="<?php echo $this->id?>" class="carousel slide" data-ride="carousel">
					<!-- Indicators -->
					<ol class="carousel-indicators">
						<?php
						foreach ($this->slides as $key => $slide) {
							?>
							<li data-target="#<?php echo $this->id ?>" data-slide-to="<?php echo $key?>" class="<?php if($key==0){echo 'active';}?>"></li>
							<?
						}
						?>
					</ol>

					<!-- Wrapper for slides -->
					<div class="carousel-inner" role="listbox">
						<?php
						foreach ($this->slides as $key => $slide) {
							?>

							<div class="item <?php if($key==0) {echo 'active';} ?>" data-item="<?php echo $key ?>">
								<img src="<?php echo $slide->image ?>" alt="<?php echo $slide->title ?>">
								<div class="carousel-caption">
									<div class="title"><?php echo $slide->title;?></div>
									<div class="subtitle col-xs-12"><?php echo $slide->subtitle ?> <a href="<?php echo $slide->link ?>">Ver Más...</a></div>
								</div>
							</div>
							<?php
						}
						?>
					</div>

					<!-- Controls -->
					<a class="left carousel-control" href="#<?php echo $this->id ?>" role="button" data-slide="prev">
						<span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>
						<span class="sr-only">Previous</span>
					</a>
					<a class="right carousel-control" href="#<?php echo $this->id ?>" role="button" data-slide="next">
						<span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>
						<span class="sr-only">Next</span>
					</a>
				</div>
			</div>
		</div>
		<script>
			jQuery(document).ready(function($) {
				$('.carousel').carousel({
				});
			});
		</script>
		<?php
		$content=ob_get_clean();
		echo $content;
		// die(var_dump($this->slides));
	}
}
