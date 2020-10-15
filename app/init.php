<?php

// meload otomatis tanpa meload satu satu class
spl_autoload_register(function($class){
	require_once 'Core/'.$class.'.php';
});
$url = "$_SERVER[REQUEST_URI]";
$x = explode('/', $url);

$GLOBALS['path'] = '/'.$x[1].'/public';

?>