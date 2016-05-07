<?php
namespace jorgelsaud\PoliticayGobierno;
class Direccion{
	private $titulo;
	private $direccion;
	private $imagen;

	public function __construct( $titulo, $direccion, $imagen)
	{
		$this->titulo = $titulo;
		$this->direccion = $direccion;
		$this->imagen = $imagen;
	}
	public function show(){
		ob_start();
		?>
		<div class="Direccion col-xs-12">
			<div class="col-xs-12 col-sm-6">
				<div class="Direccion__Titulo col-xs-12">
					<?= $this->titulo ?>
				</div>
				<div class="col-xs-12">
					<?= $this->direccion ?>
				</div>
			</div>
			<div class="col-xs-12 col-sm-6">
				<div id="map"></div>
				<!-- <img src="<?= $this->imagen ?>" alt="Direccion" class="img-responsive"> -->
			</div>
		</div>
		
		<?php
		$content=ob_get_clean();
		echo $content;
	}

}
