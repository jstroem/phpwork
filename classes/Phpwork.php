<?
class Phpwork {
	private $config;
	private $router;
	private $conn = null;
	private $globals = array();
	private $page = null; 
	
	
	public function __construct( $config ){
		$this->config = $config;
		$this->router = new Router( $this );
	} 
	
	public function getConn(){
		if ($this->conn === null) 
			$this->conn = $config->getPDO();
		return $this->conn;
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
	
	public function load( $page, $params ) {
		if (is_file("pages/".$page.".php") && include_once('pages/'.$page.".php")) {
			
			if (class_exists($page)){
				
				
				//TODO: Check that the $page class inherits from Page class
				$this->page = new $page( $this, $params, $this->page );
				
			} else {
				if ($this->config->debug())
					throw new ErrorException("File: pages/".$page.".php does not contain a class with name ".$page.".");
			}
			
			
		} else {
			if ($this->config->debug())
				throw new ErrorException("File: pages/".$page.".php does not exist.");
		}
	}
	
	public function init($path) {
		 $this->router->route($path);
	}
	
	public function view( $engine ){
		//Chaining has now been made so we can just render
		if ( $this->page->layout() ) {
			//Create index
			$this->page = new Index( $this, $this->globals, $this->page );
			
		} 
		return $this->page->render($engine );
	}
}

?>