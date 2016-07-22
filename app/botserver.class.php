<?php
    
    class BotServer {
        
        protected $log;
        private $verificationToken;
        private $hubChallenge;
        
        private $bots = [];
        
        public function __construct($log, $verificationToken) {
            $this->log = $log;
            $this->verificationToken = $verificationToken;
        }
        
        public function addBot($bot) {
            $this->bots[] = $bot;
        }
        
        private function botAuthentication($token, $hubChallenge) {
            if($token === $this->verificationToken) {
                $this->hubChallenge = $hubChallenge; 
                $this->log->info('botAuthentication: Got correct token, responding with ['.$this->hubChallenge.']');
                echo $this->hubChallenge;
            }
        }
        
        private function notifyBots($message) {
            foreach ($this->bots as $bot) {
                $botMessage = $bot->processMessage($message);
                if($botMessage) {
                    $this->sendMessage($message);
                }
            }
        }
        
        private function readMessage() {
            
            $data = json_decode(file_get_contents('php://input'), true);
            $messaging_events = $data['entry'][0]['messaging'];
        
            foreach($messaging_events as $key => $value) {
                
                $event = $value;
                $sender = $event['sender'];
                $recipient = $event['recipient'];
                
                if(isset($event['message']) && isset($event['message']['text'])) {
                    $text = $event['message']['text'];
                    $this->log->info('Message: ['.$text.']', $event);

                    //Send message to all bots
                    $message = new message($text, new user($sender['id']));
                    $this->notifyBots($message);
                    
                } else {
                    $this->log->error('Unproscessable message', $event);
                }
                
            }
            
        }
        
        public function sendMessage($message) {
            
            $this->log->info('Bot server: Sending message..');
            $this->log->info(config::$bot['accessToken']);
            
            $accessToken = config::$bot['accessToken'];
            $url = config::$bot['sendUrl'].$accessToken;
            $postData = json_encode(array(
                                            'recipient' => array('id' =>   $message->getUser()->getUserId()), 
                                            'message'   => array('text' => $message->getMessage())
                                          )
                                   );

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
                $this->log->error('botserver->sendMessage(): Unable to send message - '.print_r($result, true));
            } else {
                $this->log->info('botserver->sendMessage(): Successfully sent message - '.print_r($result, true));
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