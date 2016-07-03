<?php
    
    class BotServer {
        
        protected $log;
        private $verificationToken;
        private $hubChallenge;
        
        public function __construct($log, $verificationToken) {
            $this->log = $log;
            $this->verificationToken = $verificationToken;
        }
        
        public function botAuthentication($token, $hubChallenge) {
            if($token === $this->verificationToken) {
                $this->hubChallenge = $hubChallenge; 
                $this->log->info('botAuthentication: Got correct token, responding with ['.$this->hubChallenge.']');
                echo $this->hubChallenge;
            }
        }
        
        private function readMessage() {
            
            $data = json_decode(file_get_contents('php://input'), true);
            $messaging_events = $data['entry'][0]['messaging'];
        
            foreach($messaging_events as $key => $value) {
                
                $event = $value;
                $sender = $event['sender'];
                $recipient = $event['recipient'];
                
                if($event['message'] && $event['message']['text']) {
                    $text = $event['message']['text'];
                    $this->info('Message: ['.$text.']');
                } else {
                    $this->log->error('Unproscessable message');
                }
                
            }
            
        }
        
        private function sendMessage() {
            
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
            
        }
        
        public function processRequest() {
            
            $this->log->info('Processign request..');
            
            if(isset($_GET['hub_verify_token'])) {
                $this->botAuthentication($_GET['hub_verify_token'], $_GET['hub_challenge']);
            } else {
                $this->readMessage();
            }
                  
        }
            
    }
    
?>