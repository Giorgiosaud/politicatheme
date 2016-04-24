<?php
namespace jorgelsaud\PoliticayGobierno;
class Noticia{
	public $titulo;
	public $resumen;
	public $link;
	public $imagen;

	public function __construct($titulo, $resumen, $link, $imagen)
	{
		$this->titulo = $titulo;
		$this->resumen = $resumen;
		$this->link = $link;
		$this->imagen = $imagen;
	}


}
