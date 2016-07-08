<?php


    require_once('../autoload.php'); // Load app classes
    require_once('../vendor/autoload.php'); // Load composer packages
    
    //Dependencies
    use Monolog\Logger;
    use Monolog\Handler\StreamHandler;

    // Init log
    //$log = new Logger('BotApp');
    //$log->pushHandler(new StreamHandler('logs.log', Logger::DEBUG));

    $message = new message('test',new user(123));
    $messageStore = new messagestore($message);
    $messageStore->save();

?>