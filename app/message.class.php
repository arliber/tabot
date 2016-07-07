<?php

    class message {
        
        private $message;
        private $user;
        
        function __construct($message, $user) {
            $this->message = $message;
            $this->user = $user;
        }
        
        public function getUser() {
            return $this->user;
        }
        
        public function getMessage() {
            return $this->message;
        }
        
        public function setMessage($message) {
            $this->message = $message;
        }
        
        
    }

?>