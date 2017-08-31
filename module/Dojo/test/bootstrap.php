<?php

namespace DojoTest;

use Jonico\Test\Bootstrap;

error_reporting(E_ALL | E_STRICT);
chdir(dirname(__DIR__));

$_SERVER['HTTP_USER_AGENT'] = 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.80 Safari/537.36';
$_SERVER['SERVER_NAME'] = 'http://dojo.local/';
$_SERVER['REMOTE_ADDR'] = '127.0.0.1';

define('LOC_ENV', 'local');
define('DEV_ENV', 'development');
define('HOM_ENV', 'staging');
define('PROD_ENV', 'global');
define('CUSTOM_ENV', (getenv('APPLICATION_ENV') ? getenv('APPLICATION_ENV') : LOC_ENV));

Bootstrap::init();
