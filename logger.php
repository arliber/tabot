<?php
    
    require_once('autoload.php'); // Load app classes
    
    //Dependencies
    use Monolog\Logger;
    use Monolog\Handler\StreamHandler;

    //Define logger
    global $log;
    $log = new Logger('BotApp');
    $log->pushHandler(new StreamHandler('logs.log', Logger::DEBUG));
    $log->info('logger loaded');
    
     
?>