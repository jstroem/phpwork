<?php
//Handles the loading of global classes and inital setup
require_once('config/Config.php');
require_once('classes/Phpwork.php');
require_once('classes/Router.php');
require_once('classes/Route.php');
require_once('classes/Page.php');
require_once('classes/Index.php');
$Phpwork = new Phpwork( new Config() );
?>