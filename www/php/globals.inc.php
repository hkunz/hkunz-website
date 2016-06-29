<?php
	//define('ABSPATH', dirname(__FILE__).'/');
	$server = $_SERVER['SERVER_NAME']; //either "localhost" or "www.hkunz.com"
	$root = "http://" . $server;
	if($server == "localhost"){
		$root = $root . "/projects/hkunz";
		//include($server . '/projects/lib/php/FirePHPCore/fb.php');
		//fb("server:");
	}
	$root .= "/";
	//$masterPage = $root . "php/master.inc.php";
?>