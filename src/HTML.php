<?php
namespace jorgelsaud\PoliticayGobierno;
class HTML{
	private $content;
	private $class;

	public function __construct($content, $class)
	{
		$this->content = $content;
		$this->class = $class;
	}
	public function show(){
		ob_start();
		?>
		<div class="<?php if($this->class==''){	echo $this->class;}	else{?> col-xs-12<?	}?>">
			<?= $this->content;?>

		<div class="clearfix"></div>
		</div>
		<?php
		$content=ob_get_clean();
		echo $content;

	}

}
