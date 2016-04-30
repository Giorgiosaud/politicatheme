<?php
namespace jorgelsaud\PoliticayGobierno;
use WP_Query;
class SlidersWidgetEventos{
	public $slides;

	public function __construct($slides=array())
	{
		$this->slides = $slides;
	}
	public function slides(){
		return $this->slides;
	}
	public function addSlide(SlideWidgetEvento $slide){
		array_push($this->slides, $slide);
	}
	public function show(){
		ob_start();?>
		<div class="col-xs-12 No-Margin-Padding Flex">
			<div id="WC__SL" class="carousel slide" data-ride="carousel" data-interval="">
				<!-- Indicators -->
				<!-- Wrapper for slides -->
				<div class="carousel-inner" role="listbox">
					<?php
					foreach ($this->slides as $key => $slide) {
						?>

						<div class="item <?php if($key==0) {echo 'active';} ?>" data-item="<?php echo $key ?>">
							<img class="img-responsive" src="<?= $slide->image ?>" alt="<?= $slide->subtitle ?>">
							<div class="WC__SL__carousel-caption">
								<div class="WC__SL__carousel-caption__Title">
									<a href="<?= $slide->link ?>">
										<?= $slide->title ?>
									</a>
								</div>
								<div class="WC__SL__carousel-caption__Subtitle"><?= $slide->subtitle ?></div>
							</a>
						</div>
					</div>
					<?php
				}
				?>

				<!-- Controls -->
				<a class="left carousel-control WC__SL__Control WC__SL__Control__Left" href="#WC__SL" role="button" data-slide="prev">
					<span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>
					<span class="sr-only">Previous</span>
				</a>
				<a class="right carousel-control WC__SL__Control WC__SL__Control__Right" href="#WC__SL" role="button" data-slide="next">
					<span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>
					<span class="sr-only">Next</span>
				</a>
			</div>
		</div>

		<?php
		return ob_get_clean();
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
									<div class="title"><?php _e( 'Noticias de la Facultad', 'html5blank' );?></div>
									<div class="subtitle"><?php echo $slide->subtitle ?> <a href="<?php echo $slide->link ?>">Ver Más...</a></div>
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
								<?php echo $slide->title?>
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
}
