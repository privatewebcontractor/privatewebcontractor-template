<?php
$f3=require('server/base.php');
require('server/sql.php');


$f3->set('DEBUG',1);
$f3->config('config.ini');

$f3->route('GET /',
	function($f3) {
		$f3->set('content','main.htm');
		echo View::instance()->render('layout.htm');
	}
);

$f3->run();
