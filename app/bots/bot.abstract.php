<?php

    abstract class bot {
      
        protected $log;
        private $name;
      
        public function __construct($log, $name) {
            $this->log = $log;
            $this->name = $name;
        }
        
        public function getName() {
            return $this->name;
        }
        
        abstract public function processMessage($message);
    }

?>