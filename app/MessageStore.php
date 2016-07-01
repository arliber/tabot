<?php

require_once('DataLayer.php');

class TabotMemory extends DataLayer {
    
    private $connection;
    
    function __construct() {
        parent::__construct();
    }
    
    public function saveMessage($message) {
        parent::getQueryResult('INSERT INTO tabot.messages (message) VALUES(\''.$message.'\')');
    }
    
    function __destruct() {
        
    }
    
}

?>


