<?php
    
    //require_once('/home/arik/Repos/tabot/app/bots/bot.abstract.php');
    
    class echobot extends bot {
        public function echobot($log) {
            parent::__construct($log, 'Echo0o0o0Bot');
        }
        
        public function processMessage($message) {
            $this->log->info('Hello from '.$this->getName());
        }
    }


    
     
?>