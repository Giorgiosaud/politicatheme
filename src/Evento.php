<?php
namespace jorgelsaud\PoliticayGobierno;
class Evento{
	public $titulo;
	public $link;
	public $imagen;
	public $fecha;
	public $hora;

	public function __construct($titulo, $link, $imagen, $fecha, $hora)
	{
		$this->titulo = $titulo;
		$this->link = $link;
		$this->imagen = $imagen;
		$this->fecha = $fecha;
		$this->hora = $hora;
	}


}
