<?php
ini_set('display_errors', 1);
error_reporting( E_ALL );
require_once('config/setup.php');

$Phpwork->engine( new Mustache );

$Phpwork->route('/phpwork/', 'Index');

//make rounting
$Phpwork->walk( $_SERVER['REQUEST_URI'] );
echo $Phpwork->view( );
?>