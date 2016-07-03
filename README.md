Tabot

URL
localhost

Logs
/var/log/apache2/error.log

FAQ

.htaccess issues?
1) Put it in the root /var/www/
2) nano  /etc/apache2/apache2.conf
   Change the <Directory> directive pointing to your public web pages, where the htaccess file resides. Change from AllowOverride None to AllowOverride All
    <Directory /var/www/>
    Options Indexes FollowSymLinks
    AllowOverride All
    Require all granted
    </Directory>
    
  Restart apache
  sudo service apache2 restart  
    
    ====================
    
    
    
    /*
        function logMessage($message, $severity = 'info') {
        file_put_contents('php://stderr', $severity.' ['.(date('m/d/Y h:i:s a', time())).']: '.$message."\n", FILE_APPEND);
    }
    
    logMessage('Request made..');
    
    if($_GET['hub_verify_token'] === 'my_bot_app_will_change_the_world') {
        
        logMessage('Request validated', 'success');
        echo $_GET['hub_challenge'];
        
    } else {

        $data = json_decode(file_get_contents('php://input'), true);
        
        file_put_contents('php://stderr', print_r($data, true), FILE_APPEND);
        
        $messaging_events = $data['entry'][0]['messaging'];
        
        foreach($messaging_events as $key => $value) {
            
            logMessage('Looping messages..', "info");
            
            $event = $value;
            $sender = $event['sender'];
            $recipient = $event['recipient'];
            
            if($event['message'] && $event['message']['text']) {
                $text = $event['message']['text'];
                
                logMessage($text, "message");
                $tabotMemory->saveMessage($text);
                
                //Send response
                $token = 'EAAOZCEaUNtxIBAL1bafIm0IYzlo8YcLxjxklu7hjyi8QC4yzwFXFfK0p8qDluJxmGP3lE1roZAOwvCBr7F8dqx0Of7kpTgGRZBncZC1gxtHxlT79Lpbgg4LIfAZA7ZAVVgsskxPd3RbJjsSRcX5rJYRnd8sQbjW4LMBMbgICIf5QZDZD';
                $url = 'https://graph.facebook.com/v2.6/me/messages?access_token='.$token;
                $postData = json_encode(array('recipient' => array('id' => $sender['id']), 'message' => array('text' => 'Did you say '.$text.'?' )));
                 
                logMessage($postData, "data-sent");
                 
                $options = array(
                    'http' => array(
                        'header'  => "Content-type: application/json\r\n"
                                    ."Content-Length: " . strlen($postData) . "\r\n",
                        'method'  => 'POST',
                        'content' => $postData
                    )
                );
                
                $context  = stream_context_create($options);
                $result = file_get_contents($url, false, $context);
                if ($result === FALSE) {
                    logMessage(print_r($result, true), "error");
                } else {
                    logMessage(print_r($result, true), "success");
                }
                
            } else {
                logMessage(print_r($event, true), "error");
            }
            
        }
        
    }
        */
        
        