<?php
    
    function logMessage($message, $severity = 'info') {
        file_put_contents('php://stderr', $severity.' ['.(date('m/d/Y h:i:s a', time())).']: '.$message."\n", FILE_APPEND);
    }
    
    logMessage('Request made..');
    
    if($_GET['hub_verify_token'] === 'my_bot_app_will_change_the_world') {
        
        logMessage('Request validated', 'success');
        echo $_GET['hub_challenge'];
        
    } else {
        //logMessage('Wrong verification token', 'error');
        //echo 'Error, wrong validation token';
        
        //file_put_contents('php://stderr', http_build_query($_POST)."\n", FILE_APPEND);
        //echo print_r(http_build_query($_POST));
        
        //logMessage(http_build_query($_POST),"success");
        
        $data = json_decode(file_get_contents('php://input'), true);
        
        
          
       // logMessage(http_build_query($_POST),"success");
        
        //logMessage(print_r($data, true), "data");
        
        $messaging_events = $data['entry'][0]['messaging'];
        
        foreach($messaging_events as $key => $value) {
            
            logMessage('Looping messages..', "info");
            
            $event = $value;
            $sender - $event['sender']['id'];
            
            if($event['message'] && $event['mssage']['text']) {
                $text = $event['message']['text'];
                
                logMessage($text, "message");
                
            } else {
                logMessage('Missing text!', "error");
            }
        }
        
    }
   
?>