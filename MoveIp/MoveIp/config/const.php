<?php




define('IS_LOCAL', getenv('ENVIRONMENT') && getenv('ENVIRONMENT') === 'local');

define('REQUEST_SCHEME', (IS_LOCAL ? 'http' : 'https'));
define('ROOT', dirname(__FILE__) . '/../..');

define('HOST', (IS_LOCAL ? $_SERVER['HTTP_HOST'] : 'moveip.ru'));
define('FULL_HOST', REQUEST_SCHEME . "://" . HOST);
