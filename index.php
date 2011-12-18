<?php
ini_set('display_errors', 1);
error_reporting( E_ALL );
require_once('config/setup.php');

$Phpwork->route('/', 'Main');

//make rounting
echo "Address: ". $_SERVER['REQUEST_URI']."<br/>";
$Phpwork->init( $_SERVER['REQUEST_URI'] );
$engine = "engine";
echo $Phpwork->view( $engine );
?>
