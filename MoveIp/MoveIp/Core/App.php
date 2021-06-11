<?php

namespace MoveIp\Core;

use Exception;

/**
 * Class App
 * @package MoveIp\Core
 */
class App
{

    public static $config = array();

    public static function init()
    {
        try {

            self::$config = require(dirname(__FILE__) . "/../config/index.php");

        } catch (Exception $e) {
            echo $e->getMessage();
            die;
        }
    }

    public static function getEmail()
    {
        return isset(self::$config['email']) ? (string)self::$config['email'] : '';
    }


    public static function getConfigRedis()
    {
        return isset(self::$config['redis']) ? self::$config['redis'] : false;
    }

    public static function getConfigWebsocket()
    {
        return isset(self::$config['websocket']) ? self::$config['websocket'] : false;
    }

    public static function getMaxActiveUsers()
    {
        return isset(self::$config['max_active_users']) ? self::$config['max_active_users'] : 500;
    }

    public static function getTimeActiveUserSec()
    {
        return isset(self::$config['time_active_user_sec']) ? self::$config['time_active_user_sec'] : 30;
    }

}