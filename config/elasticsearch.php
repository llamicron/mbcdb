<?php

use Monolog\Logger;

return array(
    'hosts' => array(
                    'localhost:9200'
                    ),
    'logPath' => 'storage/logs/elastic.log',
    'logLevel' => Logger::INFO
);
