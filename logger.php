<?php

    require_once('autoload.php'); // Load app classes

    //Dependencies
    use Monolog\Logger;
    use Monolog\Handler\StreamHandler;

    //Define logger
    global $log;
    $log = new Logger('BotApp');
    $log->pushHandler(new StreamHandler('php://stdout', Logger::DEBUG)); //use 'logs.log' when developing locally
    $log->info('logger loaded');


?>
