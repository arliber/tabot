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
            $sender = $event['sender'];
            $recipient = $event['recipient'];
            
            if($event['message'] && $event['message']['text']) {
                $text = $event['message']['text'];
                
                logMessage($text, "message");
                
                //Send response
                $token = 'EAAOZCEaUNtxIBAL1bafIm0IYzlo8YcLxjxklu7hjyi8QC4yzwFXFfK0p8qDluJxmGP3lE1roZAOwvCBr7F8dqx0Of7kpTgGRZBncZC1gxtHxlT79Lpbgg4LIfAZA7ZAVVgsskxPd3RbJjsSRcX5rJYRnd8sQbjW4LMBMbgICIf5QZDZD';
                $url = 'https://graph.facebook.com/v2.6/me/messages?access_token='.$token;
                $postData = json_encode(array('recipient' => array('id' => $sender['id']), 'message' => 'GOT IT!!!'));
                 
                logMessage($postData, "data-sent");
                 
                $options = array(
                    'http' => array(
                        'header'  => "Content-type: application/json\r\n"
                                    ."Content-Length: " . strlen(postData) . "\r\n",
                        'method'  => 'POST',
                        'content' => postData
                    )
                );
                
                $context  = stream_context_create($options);
                $result = file_get_contents($url, false, $context);
                if ($result === FALSE) {
                    logMessage(print_r($result, true), "error");
                } else {
                    logMessage(print_r($result, true), "success");
                }

                /*
                var token = "<page_access_token>";

                function sendTextMessage(sender, text) {
                    messageData = {
                        text:text
                    }
                request({
                        url: 'https://graph.facebook.com/v2.6/me/messages',
                        qs: {access_token:token},
                        method: 'POST',
                        json: {
                        recipient: {id:sender},
                        message: messageData,
                        }
                    }, function(error, response, body) {
                        if (error) {
                        console.log('Error sending message: ', error);
                        } else if (response.body.error) {
                        console.log('Error: ', response.body.error);
                        }
                    });
                }
                */
                
                
            } else {
                logMessage(print_r($event, true), "error");
            }
            
        }
        
    }
   
?>