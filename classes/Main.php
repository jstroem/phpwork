<?php
class Main extends Page {
	protected $tmpl = 'main.mustache';
	
	public function __construct( $phpwork, $params, $page ) {
		parent::__construct($phpwork, $params);
		$this->page = $page;
	}
	
	public function render( ){
		$tmpl = $this->phpwork->tmpl( $this->tmpl );
		$engine = $this->phpwork->engine();
		
		return $engine->render($tmpl, $this->page);
	}
}
?>