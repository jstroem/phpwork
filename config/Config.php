<?php
class Config {
	private $db = array(
		'user' => '',
		'pass' => '',
		'dsn' => '',
	);
	
	public function getPDO() {
		return new PDO($this->db['dsn'],$this->db['user'],$this->db['pass']);
	}
}
?>
