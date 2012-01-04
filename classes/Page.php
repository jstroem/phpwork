<?php
class Page {
	public $param = array();
	protected $phpwork = null;
	protected $tmpl = null;
	protected $layout = true;
	
	public function __construct( $phpwork, $params ){
		$this->phpwork = $phpwork;
		$this->param = $params;
		$this->init();	
	}
	
	public function init(){	}
	
	public function layout() {
		return $this->layout;
	}
	
	public function render( ) {
		$tmpl = $this->phpwork->tmpl( $this->tmpl );
		$engine = $this->phpwork->engine();
		
		return $engine->render( $tmpl, $this );
	}
	
}
?>