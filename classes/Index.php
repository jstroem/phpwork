<?php
class Index extends Page {
	private $params = array();
	private $phpwork = array();
	private $pageChain;
	
	public function __construct( $phpwork, $params, $pageChain = null ) {
		$this->phpwork = $phpwork;
		$this->params = $params;
		$this->pageChain = $pageChain;
	}
	
	public function render( $engine ){
		return "Main". $this->pageChain->render( $engine ) . "/Main";
	}
}
?>