<?php
namespace jorgelsaud\PoliticayGobierno;
class HTML{
	private $content;
	private $class;
	private $link;

	public function __construct($content, $class, $link)
	{
		$this->content = $content;
		$this->class = $class;
		$this->link = $link;
	}
	public function show(){
		ob_start();
		?>
		<div class="<?php if($this->class==''){	echo $this->class;}	else{?> col-xs-12<?	}?>">
			<?php if($this->link!=''){
				?>
				<a href="<?$this->link?>">
					<?php echo $this->content ?>
				</a>
				<?php }
				else{
					echo $this->content;
				}
				?>

			</div>
			<?php
			$content=ob_get_clean();
			echo $content;

		}

	}
