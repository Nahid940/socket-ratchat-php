<?php
include_once 'vendor/autoload.php';
use App\ChatApp;
use Ratchet\Server\IoServer;
use Ratchet\Http\HttpServer;
use Ratchet\WebSocket\WsServer;

$server=IoServer::factory(
    new HttpServer(
      new WsServer(
          new ChatApp()
      )
    ),
    8080
);

$server->run();