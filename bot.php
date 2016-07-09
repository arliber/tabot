<?php
    
    require_once('autoload.php');
    require_once('logger.php');
    
    //Init bot server
    $botServer = new BotServer($log, config::$bot['verificationToken']);
    
    //Init bot, add to bot server
    $echoBot = new EchoBot($log);
    $botServer->addBot($echoBot);
    
    //Handle request
    $botServer->processRequest();
    
?>