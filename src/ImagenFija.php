<?php
namespace jorgelsaud\PoliticayGobierno;
use WP_Query;
class ImagenFija{

	private $titulo;
	private $imagen;
	private $subtitulo;

	public function __construct($imagen,$titulo='', $subtitulo='')
	{

		$this->imagen = $imagen;
		$this->titulo = $titulo;
		$this->subtitulo = $subtitulo;
	}
	public function show(){
		ob_start();
		?>
		<div class="col-xs-12 mb1">
			<div class="Estudios__Imagen">
				<img src="<?= $this->imagen ?>" alt="Imagen Estudios Titulo" class="img-responsive">
				<?php if($this->titulo!=''):?>
				<div class="Estudios__Titulo">
					<?= $this->titulo ?>
				</div>
				<?php endif ?>
			</div>
			<?php if($this->subtitulo!=''):?>
			<div class="Estudios__Subtitulo">
				<?= $this->subtitulo ?>
			</div>
		<?php endif; ?>
		</div>

		<?php
		$content=ob_get_clean();
		echo $content;
	}
}
