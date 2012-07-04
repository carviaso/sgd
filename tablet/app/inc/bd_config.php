<?php

if($_SERVER['HTTP_HOST'] == 'localhost') {
	define('BANCO_HOST', 'localhost');
	define('BANCO_USER', 'root');
	define('BANCO_PASS', 'vertrigo');
	define('BANCO_DB', 'docente');
} elseif($_SERVER['HTTP_HOST'] == 'eduardobassan.com.br' || $_SERVER['HTTP_HOST'] == 'www.eduardobassan.com.br') {
	define('BANCO_HOST', '187.45.196.197');
	define('BANCO_USER', 'eduardobassan1');
	define('BANCO_PASS', 'dudu1489');
	define('BANCO_DB', 'eduardobassan1');
} else {
	define('BANCO_HOST', 'localhost');
	define('BANCO_USER', 'cppd');
	define('BANCO_PASS', 'xlop9cvi');
	define('BANCO_DB', 'docente');
}