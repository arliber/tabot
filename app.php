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
    
    /*
        //Get request params as passed by .htaccess
        //parse_str($_GET['params'], $params);
        $params = Array('hub_verify_token' => $_GET['hub_verify_token'], 'hub_challenge'=>$_GET['hub_challenge']);   
            
        //Run selected action
        switch ($_GET['action']) {
            case 'bot':
                $botServer->processRequest($params['hub_verify_token'], $params['hub_challenge']);
                break;
            case 'dashboard':
                echo 'Soon..'; 
                break;       
            default:
                echo '404';
                break;
        }
    */
    
?>