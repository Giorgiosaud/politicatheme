<?php
namespace jorgelsaud\PoliticayGobierno;
use WP_Query;
class Sliders{
	protected $slides;
	protected $id;

	public function __construct($post_types,$qty,$id)
	{
		$this->id=$id;
		$this->post_types=$post_types;
		$this->qty=$qty;
		$this->getSlides();

	}
	protected function getSlides(){
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
				$slide=new Slide(get_field('titulo_slide'),get_field('subtitulo_slide'),get_field('imagen_slider'),get_permalink());
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
		<div class="Flex">
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
									<div class="subtitle"><?php echo $slide->subtitle ?></div>
								</div>
							</div>
							<?php
						}
						?>
					</div>

					<!-- Controls -->
					<a class="left carousel-control" href="#<?php echo $this->id ?>" role="button" data-slide="prev">
						<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
						<span class="sr-only">Previous</span>
					</a>
					<a class="right carousel-control" href="#<?php echo $this->id ?>" role="button" data-slide="next">
						<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
						<span class="sr-only">Next</span>
					</a>
				</div>
			</div>
			<div class="hidden-xs col-sm-3 No-Margin-Padding Flex">
			<div class="titulosNoticias Flex Flex--column">
					<?php
					foreach ($this->slides as $key => $slide) {
						?>
						<div class="titulo Flex--1" data-item="<?php echo $key ?>"><a href="<?php echo $slide->link?>"><?php echo $slide->title?></a></div>
						<?php
					}?>
				</div>
			</div>
		</div>
		<?php
		$content=ob_get_clean();
		echo $content;
		// die(var_dump($this->slides));
	}
}