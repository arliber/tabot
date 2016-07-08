<?php
    
    require_once('autoload.php'); // Load app classes
    require_once('vendor/autoload.php'); // Load composer packages
    
    //Dependencies
    use Monolog\Logger;
    use Monolog\Handler\StreamHandler;

    // Init log
    $log = new Logger('BotApp');
    $log->pushHandler(new StreamHandler('logs.log', Logger::DEBUG));
    $log->info('App started..');
    
    //Init bot server
    $botServer = new BotServer($log, config::$bot['verificationToken']);
    
    //Init bot, add to bot server
    $echoBot = new EchoBot($log);
    $botServer->addBot($echoBot);
    
    //Handle request
    $botServer->processRequest();
    
?>