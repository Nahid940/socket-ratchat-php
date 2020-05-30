<?php


namespace App;

use App\Model\Message;
use Illuminate\Support\Facades\DB;
use Ratchet\MessageComponentInterface as MessageComponentInterface;
use Ratchet\ConnectionInterface;

class ChatApp implements MessageComponentInterface
{
    protected $clients;
    public function __construct()
    {
        $this->clients=new \SplObjectStorage();
    }

    function onOpen(ConnectionInterface $conn)
    {
        // TODO: Implement onOpen() method.
        $this->clients->attach($conn);
        echo "New User Connected !! ID {$conn->resourceId}\n";
    }

    function onClose(ConnectionInterface $conn)
    {
        // TODO: Implement onClose() method.
        $this->clients->detach($conn);
        echo "New User Disconnected !! ID {$conn->resourceId}\n";
    }

    function onError(ConnectionInterface $conn, \Exception $e)
    {
        // TODO: Implement onError() method.
        echo "An error occurred {$e->getMessage()}";
        $conn->close();
    }

    function onMessage(ConnectionInterface $from, $msg)
    {
        // TODO: Implement onMessage() method.
        foreach ($this->clients as $client)
        {
            if($client!==$from)
            {
                $client->send($msg);
            }
        }
        Message::create([
            'message'=>$msg
        ]);

    }
}