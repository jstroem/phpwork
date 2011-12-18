<?php
class Config {
	private $db = array(
		'user' => '',
		'pass' => '',
		'dsn' => '',
	);
	
	private $debug = true;
	
	public function getPDO() {
		return new PDO($this->db['dsn'],$this->db['user'],$this->db['pass']);
	}
	
	public function debug(){
		return $this->debug;
	}
}
?>
