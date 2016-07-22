<?php

    class message {
        
        private $messageText;
        private $user;
        
        function __construct($messageText, $user = null) {
            
            // no function overloading in PHP :(
            if(is_string($messageText)) { // init based on a messageText type
                $this->messageText = $messageText;
                $this->user = $user;
            } else { // init based on message text and user
                $this->messageText = $messageText->messageText;
                $this->user = $messageText->user;
            } 
        }
        
        public function getUser() {
            return $this->user;
        }
        
        public function getMessage() {
            return $this->messageText;
        }
        
        public function setMessage($messageText) {
            $this->messageText = $messageText;
        } 
        
    }

?>