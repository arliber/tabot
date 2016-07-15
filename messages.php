<?php


  require_once('autoload.php');
  require_once('logger.php');

    //Dependencies
    use Monolog\Logger;
    use Monolog\Handler\StreamHandler;

    // Init log
    //$log = new Logger('BotApp');
    //$log->pushHandler(new StreamHandler('logs.log', Logger::DEBUG));

    $message = new message('test',new user(123));
    $messageStore = new messagestore($message, $log);
    $messageStore->save();

?>
