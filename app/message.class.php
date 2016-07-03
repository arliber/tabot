<?php

    class message {
        
        private $message;
        private $user;
        
        function __construct($message, $user) {
            $this->message = $message;
            $this->user = $user;
        }
        
    }

?>