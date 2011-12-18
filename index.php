<?php
ini_set('display_errors', 1);
error_reporting( E_ALL );
require_once('config/setup.php');

$Phpwork->route('/', 'index');
$Phpwork->route('/testing/:id/fest', 'index');
$Phpwork->route('/testing/:id?/fest', 'index');
$Phpwork->route('/testing/:id([0-9]+)/fest', 'index');
$Phpwork->route('/testing/:id([0-9]+)?/fest', 'index');
$Phpwork->route('/testing/:id.:format/fest', 'index');
$Phpwork->route('/testing/:id.:format?/fest', 'index');

//make rounting
echo "Address: ". $_SERVER['REQUEST_URI']."<br/>";
$Phpwork->init( $_SERVER['REQUEST_URI'] );
?>
