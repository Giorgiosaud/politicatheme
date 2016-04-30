<?php
namespace jorgelsaud\PoliticayGobierno;
class TipoDePostgrado{
	private $titulo;
	private $link;

	public function __construct($titulo, $link)
	{
		$this->titulo = $titulo;
		$this->link = $link;
	}
	public function link(){
		return $this->link;
	}
	public function titulo(){
		return $this->titulo;
	}


}