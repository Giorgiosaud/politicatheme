<?php
namespace jorgelsaud\PoliticayGobierno;

class Styles
{

	public function __construct()
	{
		$this->manifest_path= get_template_directory().'/compiled/build/rev-manifest.json' ;
		if (file_exists($this->manifest_path)) {
			$this->manifest = json_decode(file_get_contents($this->manifest_path), true);
			$this->styles=array_keys($this->manifest);
		} else {
			$this->manifest = [];
		}
		add_action( 'wp_enqueue_scripts', array($this,'enqueue' ));
	}
	public function enqueue()
	{
		wp_deregister_script( 'jquery' );
		foreach($this->styles as $style){
			// dd($style);
			$enqueuefile=get_template_directory_uri().'/compiled/build/'.$this->manifest[$style];
			$extension=pathinfo($enqueuefile, PATHINFO_EXTENSION);
			switch ($extension) {
			case 'css':
				wp_register_style($enqueuefile,$enqueuefile);
				wp_enqueue_style($enqueuefile);
				break;
			case 'js':
				wp_register_script($enqueuefile, $enqueuefile);
				wp_enqueue_script($enqueuefile);
				break;
			}
		}
	}
}
