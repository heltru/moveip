<?php
namespace App\Websocket\Connection;

use MoveIp\Core\Websocket;

class Message
{

    public function run($connect, $data){
        echo Websocket::decode($data)['payload'] . "\n";
    }

}