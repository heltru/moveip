<?php
// Загрузка классов
require_once(dirname(__FILE__) . '/MoveIp/autoload.php');
require_once(dirname(__FILE__) . '/App/autoload.php');
require_once(dirname(__FILE__) . '/vendor/autoload.php');

set_time_limit(0);

\MoveIp\Core\App::init();
\MoveIp\Core\Websocket::start();
