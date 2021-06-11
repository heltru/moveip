<?php
include 'const.php';

date_default_timezone_set('Europe/Moscow');
mb_internal_encoding("UTF-8");
setlocale(LC_TIME, 'ru_RU.UTF-8');
ini_set("auto_detect_line_endings", true);


return array(
    'name' => 'MoveIp',

    'email' => 'laneo2007@yandex.ru',

    'max_active_users' => 7,//500
    'user_time_sec' => 7,//500

    'redis' => json_decode(file_get_contents(dirname(__FILE__) . '/redis.json'), true)[(IS_LOCAL ? 'remote' : 'server')],
    'websocket' => json_decode(file_get_contents(dirname(__FILE__) . '/websocket.json'), true)[(IS_LOCAL ? 'remote' : 'server')],

);