<?php
class Page {
	public $param = array();
	protected $phpwork = null;
	protected $tmpl = null;
	
	public function __construct( $phpwork, $params ){
		$this->phpwork = $phpwork;
		$this->param = $param;
	}
	
	public function layout() {
		return true;
	}
	
	public function render( ) {
		$tmpl = $this->phpwork->tmpl( $this->tmpl );
		$engine = $this->phpwork->engine();
		
		return $engine->render($tmpl, $this);
	}
	
}
?>