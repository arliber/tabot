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
      
    $botServer = new BotServer($log, 'my_bot_app_will_change_the_world');
    
    $echoBot = new EchoBot($log);
    
    $botServer->addBot($echoBot);
    
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
    
    //$botServer->processRequest();
    
    $botServer->notifyBots(new message('my message', new user(1234567)));
    
?>