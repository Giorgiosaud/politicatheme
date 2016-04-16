<?php
namespace jorgelsaud\PoliticayGobierno;
class Slide{
	public $title;
	public $subtitle;
	public $image;
	public $link;
	public function __construct($title,$subtitle,$image,$link)
	{
		$this->title=$title;
		$this->subtitle=$subtitle;
		$this->image=$image;
		$this->link=$link;
	}
}