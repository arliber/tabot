<?php


class messagestore extends message {
    
    private $connection;
    
    function __construct($message, $user) {
        parent::__construct($message, $user); 
        //$this->connection = new PDO('mysql:host='.config::$db['host'].';dbname='.config::$db['name'], config::$db['username'], config::$db['password']);
    }
    
    private function getQueryResult($query) {
        $resultObj = $this->connection->query($query);
           
        if($resultObj->rowCount() > 0)
        {
            foreach($resultObj as $singleRowFromQuery)
            {
                print_r($singleRowFromQuery);
            }
        }
        
        $resultObj = null;
       
    }
    
    public function saveMessage() {
        $this->getQueryResult('INSERT INTO tabot.messages (message, userId) VALUES(\''.$this->message.'\','.$this->user->userId.')');
    }
    
    function __destruct() {
        $this->connection = null;
    }
    
}

?>


