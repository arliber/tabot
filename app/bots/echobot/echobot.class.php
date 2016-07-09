<?php
        
    class echobot extends bot {
        public function echobot($log) {
            parent::__construct($log, 'EchoBot');
        }
        
        public function processMessage($message) {
            $this->log->info('Echobot echos '.$message->getMessage());
            
            //Save message
            $messageStore = new messagestore($message, $this->log);
            $messageStore->save();
            
            //Respond
            $message->setMessage('Did you say '.$message->getMessage().'?');
            return $message;
        }
    }
     
?>