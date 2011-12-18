<?php
class Route {
	public $path;
	private $page;
	private $regexp;
	public $keys = array();
	
	public function __construct( $path, $page, $sensetive , $strict ){
		$this->path = $path;
		$this->page = $page;
		$this->regexp = self::normalize($path, $this->keys, $sensetive, $strict );
	}
	
	public function match( $url ){
		return preg_match($this->regexp, $url ) > 0;
	}
	
	public function go( $url, $phpwork ){
		$keyvalues = array();
		$values = array();
		preg_match_all($this->regexp, $url, $values);
		
		foreach($this->keys as $i => $key) {
			$keyvalues[$key['name']] = ( $values[ $i + 1][0] == '' && $key['optional'] ? null : $values[$i + 1][0] );
		}
		
		$phpwork->load( $this->page, $keyvalues );
	}
	
	
	private static function normalize($path, &$keys = array(), $sensetive, $strict ) {		
		$path .= ( $strict ? '' :  '/?' );
		$path = preg_replace( '/\/\(/', '(?:\/', $path);
		
		$matches = array();
		preg_match_all('/(\/)?(\.)?:(\w+)(?:(\(.*?\)))?(\?)?/', $path, $matches);
		
		for($i = 0; $i < count($matches[0]);$i++){
			$slash = $matches[1][$i];
			$format = $matches[2][$i];
			$key = $matches[3][$i];
			$capture = $matches[4][$i];
			$optional = $matches[5][$i];
			
			//put in key collection
			array_push($keys, array('name' => $key, 'optional' => $optional == '?' ));
			
			$key_regexp = ($optional == '?' ? '' : $slash).
						  '(?:'.
						  ($optional == '?' ? $slash : '').
						  ($format == '.' ? '\.' : '').
						  ($capture != '' ? $capture : 
						  	( $format == '.' ? '([^\.]+?)' : '([^/]+?)' ) ). ')'.
						  ($optional != '' ? $optional : '');
			
			$num = 1;
			$path = str_replace($matches[0][$i], $key_regexp , $path, $num);
			
		}
		$path = preg_replace( '/([\/\.])/', '\\1', $path);
		$path = preg_replace( '/\*/', '(.*)', $path);
		$path = preg_replace( '/\//', '\/', $path);
		
		$path = '/^'. $path .'$/' . ($sensetive ? '' : 'i');
		
		return $path;
	}
	
}
?>