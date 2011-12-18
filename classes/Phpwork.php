<?
class Phpwork {
	private $config;
	private $router;
	private $conn = null;
	
	
	function __construct( $config ){
		$this->config = $config;
		$this->router = new Router( $this );
	} 
	
	function getConn(){
		if ($this->conn === null) 
			$this->conn = $config->getPDO();
		return $this->conn;
	}
	
	function route($url, $page){
		$this->router->add($url,$page);
	}
	
	function init($path) {
		 $this->router->rounte($path);
	}
}

?>