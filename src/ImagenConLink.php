<?php
namespace jorgelsaud\PoliticayGobierno;
use WP_Query;
class Imagen{

	private $imagen;
	private $link;

	public function __construct($imagen, $link='')
	{

		$this->imagen = $imagen;
		$this->link = $link;
	}
	public function show(){
		ob_start();
		?>
		<div class="col-xs-12">
		<?php if($this->link=!'')?>
			<img src="<?= $this->imagen ?>" alt="Imagen Estudios Titulo" class="img-responsive">
		</div>

		<?php
		$content=ob_get_clean();
		echo $content;
	}
}
