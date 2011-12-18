<?php
abstract class Page {
	
	public function __construct( $phpwork, $params, $pageChain = null ){
		
	}
	
	public function layout() {
		return true;
	}
	
	public abstract function render( $engine );
	
}
?>