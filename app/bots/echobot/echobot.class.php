<?php
        
    class echobot extends bot {
        public function echobot($log) {
            parent::__construct($log, 'EchoBot');
        }
        
        public function processMessage($message) {
            $this->log->info('Echobot echos '.$message->getMessage());
            $message->setMessage('Did you say '.$message->getMessage().'?');
            return $message;
        }
    }
     
?>