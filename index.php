<?php

/* Requesting all required files and functions for template */
$f3 = require('server/base.php');
$f3->set('DEBUG',1);
$f3->config('config.ini');
require('server/sql.php');
require('server/template.php');
define('layout', '_layout.htm');

/* 

Remove comment symbols if database connection required 

R::setup( 'mysql:host=localhost;dbname=DATABASE_NAME','DATABASE_USER', 'DATABASE_PASSWORD', false );
if(!R::testConnection()) { returner(0, "Can't connect to database, check index file config"); }

*/

$f3->route('GET /',
	function($f3) {
		$f3->set('title','template');
		$f3->set('content','main.htm');
		echo View::instance()->render(layout);
	}
);

$f3->set('ONERROR',
    function($f3) {
        $f3->set('title','error');
		$f3->set('content','_error.htm');
		echo View::instance()->render(layout);
    }
);

$f3->run();
