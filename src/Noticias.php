<?php
namespace jorgelsaud\PoliticayGobierno;
use WP_Query;
class Noticias{
	private $tiposDePosts;
	private $category;
	private $qty;
	private $id;
	private $titulo;


	public function __construct($titulo,$tiposDePosts, $category, $qty, $id)
	{
		$this->tiposDePosts = $tiposDePosts;
		$this->category = $category;
		$this->qty = $qty;
		$this->id = $id;
		$this->titulo=$titulo;
		$this->getNoticias();
		
	}
	private function getNoticias(){
		$args = array (
			'post_type'             => $this->tiposDePosts,
			'post_status'           => array( 'publish' ),
			'posts_per_page'        => $this->qty,
			'order'                 => 'DESC',
			'orderby'               => 'date',
			'cat'					=>$this->category,
			);
		$this->noticias=[];
		$noticias_posts_query = new WP_Query( $args );
		if ( $noticias_posts_query->have_posts() ) {
			while ( $noticias_posts_query->have_posts() ) {
				$noticias_posts_query->the_post();
				// echo get_sub_field('imagen_noticia').'<br>';
				$noticia=new Noticia(get_the_title(),get_politica_excerpt('noticias_exp_length','noticias_more'),get_permalink(), get_field('imagen_noticia'));
				array_push($this->noticias,$noticia);
			}
		}
		else{

		}
		wp_reset_postdata();
	}
	public function show(){
		ob_start();
		?>
		<div class="Noticias__Mostrar" id="<?php echo $this->id?>">
			<div class="Noticias__Contenedor__Titulo">
				<div class="Noticias__Contenedor__Titulo__Nombre">
					<?php echo $this->titulo ?>
				</div>
				<div class="Noticias__Contenedor__Titulo__Puntos"></div>
			</div>
			<div class="Noticias__Contenedor">
				<?php foreach ($this->noticias as $key => $noticia) {

					if(!$noticia->imagen){
						$noticia->imagen=wp_get_attachment_image_src(get_theme_mod('imagen_por_defecto'),'noticia')[0];
						if(!$noticia->imagen){
							$noticia->imagen=get_template_directory_uri().'/img/noticia_defecto.png';
						}
					}
					?>
					<div class="col-xs-12 col-sm-4 Noticia">
						<div class="Noticia__imagen">
							<img src="<?php echo $noticia->imagen ?>" alt="imagen">
						</div>
						<div class="Noticia__titulo">
							<a href="<?php echo $noticia->link?>">	<?php echo $noticia->titulo ?></a>
						</div>
						<div class="Noticia__resumen">
							<?php echo $noticia->resumen ?>
						</div>
						<div class="Noticia__botonLeerMas btn btn-noticia pull-right">
							<a href="<?php echo $noticia->link?>">Ver Más</a>
						</div>
					</div>
					<?php
				}
				?>
				<div class="clearfix"></div>
				<div class="Noticias__VerMas__Noticias">
					<a href="<?php echo get_category_link($this->category[0]) ?>">Ver Más <?php echo $this->titulo?> >></a></div>
			</div>
		</div>
		<?php
		$content=ob_get_clean();
		echo $content;
		
	}
}
