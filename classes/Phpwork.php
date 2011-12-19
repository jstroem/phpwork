<?
class Phpwork {
	private $config;
	private $router;
	private $conn = null;
	private $globals = array();
	private $page = null; 
	private $engine = null;
	
	
	public function __construct( $config ){
		$this->config = $config;
		$this->router = new Router( $this );
	} 
	
	public function getConn(){
		if ($this->conn === null) 
			$this->conn = $config->getPDO();
		return $this->conn;
	}
	
	public function engine( $engine = false ){
		if ( !$engine ) return $this->engine;
		else $this->engine = $engine;
	}
	
	public function route($url, $page){
		$this->router->add($url,$page);
	}
	
	public function glob( $name, $val =false ){
		if (!$val)
			return $this->globals[$name];
		else
			$this->globals[$name] = $val;
	}
	
	public function tmpl( $file ){
		if (is_file('tmpl/'.$file)){
			return file_get_contents('tmpl/'.$file);
		} else {
			return null;
		}
	}
	
	public function load( $page, $params ) {
		if (is_file("pages/".$page.".php") && include_once('pages/'.$page.".php")) {
			
			if (class_exists($page)){
				
				
				//TODO: Check that the $page class inherits from Page class
				$this->page = new $page( $this, $params );
				
			} else {
				if ($this->config->debug())
					throw new ErrorException("File: pages/".$page.".php does not contain a class with name ".$page.".");
			}
			
			
		} else {
			if ($this->config->debug())
				throw new ErrorException("File: pages/".$page.".php does not exist.");
		}
	}
	
	public function walk($path) {
		 $this->router->route($path);
	}
	
	public function view( ){
		//Chaining has now been made so we can just render
		$this->page = ($this->page === null ? $this->router->not_found() : $this->page );
		if ( $this->page->layout() ) {
			//Create index
			$this->page = new Main( $this, $this->globals, $this->page);
		}
		return $this->page->render( );
	}
}

?>