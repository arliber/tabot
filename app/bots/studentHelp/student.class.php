<?php
    
    class student extends user {
        
        private $grade;
        
        public function __construct($userId) {
            parent::__construct($userId);
        }
        
        public function setGrade($grade) {
            if($grade > 0 && $grade < 13) {
                $this->grade = $grade;
            } else {
                $this->grade = 8;
            }
        }
        
        public function getGrade() {
            return stConfig::lang->grades[$grade];
        }
        
    }

?>