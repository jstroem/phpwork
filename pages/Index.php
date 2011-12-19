<?
class Index extends Page {
	protected $tmpl = "index.mustache";
		
	public function layout(){
		return true;
	}
	
	public function render() {
		return parent::render();
	}
}
?>