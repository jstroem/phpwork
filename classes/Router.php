<?php
class Router {
	private $routes = array();
	private $phpwork;
	
	function __construct( $phpwork ){
		$this->phpwork = $phpwork;
	}
	
	function add($path,$page, $sensetive = false, $strict = true ) {
		$route = new Route( $path, $page, $sensetive, $strict );
		$this->routes[] = $route;
	}
	
	function rounte( $url ) {
		$found = false;
		foreach ( $this->routes as $route ) {
			
			if ( $route->match( $url ) ) {
				$route->go( $url, $this->phpwork );
				$found = true;
			}
		}
		return $found;
	}
}
?>