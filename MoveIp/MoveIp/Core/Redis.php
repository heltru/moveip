<?php

namespace MoveIp\Core;

use Predis;


class Redis
{

    public static $connects = [];


    public static function getConnection($db_id = 0, $server_id = 0)
    {
        if (isset(self::$connects[$server_id]) && isset(self::$connects[$server_id][$db_id])) return self::$connects[$server_id][$db_id];

        $params = App::getConfigRedis()[$server_id];
        $connect = new Predis\Client([
            'scheme' => 'tcp',
            'host' => $params['host'],
            'port' => $params['port'],
            'password' => $params['password'],
            'database' => $db_id
        ]);

        self::$connects[$server_id][$db_id] = $connect;
        return $connect;
    }

    public static function Disconnect($db_id = 0, $server_id = 0) {
        if (isset(self::$connects[$server_id]) && isset(self::$connects[$server_id][$db_id])) {
            self::$connects[$server_id][$db_id]->disconnect();
            unset(self::$connects[$server_id][$db_id]);
        }
    }
}
