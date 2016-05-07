<?php
namespace jorgelsaud\PoliticayGobierno;
use WP_Query;
class PostgradoTipo{
	private $tipo;
	private $titulo;


	public function __construct($titulo='',$tipo)
	{
		$this->titulo=$titulo;
		$this->tipo = $tipo;
		$this->getPostgrados();
		
	}
	private function getPostgrados(){
		if($this->titulo==''){
			$term = get_term( $this->tipo, $taxonomy );
			$this->titulo=$term->name;
		}
		

		$args = array(
			'post_type' => 'postgrados',
			'tax_query' => array(
				array(
					'taxonomy' => 'tipo',
					'field' => 'id',
					'terms' => $this->tipo
					)
				)
			);
		$this->postgrados=[];
		$postgrados_query = new WP_Query( $args );
		if ( $postgrados_query->have_posts() ) {
			while ( $postgrados_query->have_posts() ) {
				$postgrados_query->the_post();
				$postgrado=new Postgrado(get_the_title(),get_permalink());
				array_push($this->postgrados,$postgrado);
			}
		}
		else{

		}
		wp_reset_postdata();
		// dd($this->postgrados);
	}
	public function show(){
		ob_start();
		?>
		<div class="col-xs-12 mb1">
			<div class="Estudio__Contenedor">
				<div class="Estudio__Encabezado">
					<div class="Estudio__Titulo">
						<?= $this->titulo ?>
					</div>
				</div>
				<div class="Estudio__Triangulo"></div>
				<div class="Estudio__Resumen">
					<ul>
						<?php foreach ($this->postgrados as $key => $postgrado) {
				# code...?>
				<li class='postgrado'><a href="<?= $postgrado->link()?>"><?=$postgrado->titulo()?></a></li>
				<?
			} ?>
		</ul>
	</div>
</div>
</div>
<?php
$content=ob_get_clean();
echo $content;

}
}