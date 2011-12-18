<?php
//Handles the loading of global classes and inital setup
require_once('config/Config.php');
require_once('classes/Phpwork.php');
require_once('classes/Router.php');
require_once('classes/Route.php');
$Phpwork = new Phpwork( new Config() );
?>