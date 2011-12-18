<?php
class Router {
	private $routes = array();
	private $phpwork;
	private $not_found = null;
	
	public function __construct( $phpwork ){
		$this->phpwork = $phpwork;
	}
	
	public function add($path,$page, $sensetive = false, $strict = true ) {
		$route = new Route( $path, $page, $sensetive, $strict );
		$this->routes[] = $route;
	}
	
	public function route( $url ) {
		$found = false;
		foreach ( $this->routes as $route ) {
			
			if ( $route->match( $url ) ) {
				$route->go( $url, $this->phpwork );
				$found = true;
			}
		}
		return $found;
	}
	
	public function route_error( $page ) {
		$this->not_found = $page;
	}
	
	private function not_found( ) {
		if ($this->not_found !== null ) $phpwork->load( $this->not_found );
	}
}
?>