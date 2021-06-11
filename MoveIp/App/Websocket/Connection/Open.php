<?php

namespace App\Websocket\Connection;

use MoveIp\Core\App;
use MoveIp\Core\Redis;
use MoveIp\Core\Websocket;

class Open
{

    public function run($connect, $info)
    {

        echo "open\n";

        $redis = Redis::getConnection();
        $keys = $redis->keys("user_*");
        $total = count($keys);
        $redis_key = 'user_' . $info['ip'];// time()


        if ($redis->exists($redis_key)) {
            echo "exists\n";
            fwrite($connect, Websocket::encode(json_encode(['status' => 'success', 'active_users' => $total])));
            return;
        }

        echo "count \n" . $total;

        if ($total >= App::getMaxActiveUsers()) {
            fwrite($connect, Websocket::encode(json_encode(['status' => 'error', 'active_users' => $total])));
            fclose($connect);
            echo "is_close \n" . $total;
            return;
        }

        $redis->set($redis_key, 1);
        $redis->expire($redis_key, App::getTimeActiveUserSec());

        fwrite($connect, Websocket::encode(json_encode(['status' => 'success', 'active_users' => $total === 0 ? 1 : $total])));
    }

}