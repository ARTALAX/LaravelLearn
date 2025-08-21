<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;

class PublishCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'rabbitmq:publish';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $connection = new AMQPStreamConnection('localhost', 5672, 'guest', 'guest');
        $channel = $connection->channel();
        $channel->exchange_declare('laravel', 'direct', false, true, false);
        $channel->queue_declare('laravel', false, true, false, false);
        $channel->queue_bind('laravel', 'laravel', 'laravel');
        $data = ['
        content' => 'some content',
            'description' => 'some description', ];
        $data = json_encode($data);
        $msg = new AMQPMessage($data);
        $channel->basic_publish($msg, 'laravel', 'laravel');

        echo " [x] Sent 'Hello World!'\n";
        $channel->close();
        $connection->close();
    }
}
