<?
class Main extends Page {
	private $params = array();
	private $phpwork = array();
	private $pageChain;
	
	public function __construct( $phpwork, $params, $pageChain = null ) {
		$this->phpwork = $phpwork;
		$this->params = $params;
		$this->pageChain = $pageChain;
	}
	
	public function layout(){
		return true;
	}
	
	public function render( $engine ){
		return "Hello world";
	}
}
?>