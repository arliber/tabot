<?php

require_once('logger.php');

class messagestore extends message {
    
    private $connection;
    
    function __construct($message) {
        parent::__construct($message); 
        
        //Define DB
        $this->connection = new PDO('mysql:host='.config::$db['server'].';dbname='.config::$db['name'], config::$db['userName'], config::$db['password']);
        $this->connection->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);  // allows us to catch errors
    }
    
    public function save() {
               
        try {
            $query = $this->connection->prepare('INSERT INTO tabot.messages (message, userId) VALUES(:message, :userId)');
            if(!$query) {
                $log->error('PDO error', $this->connection->errorInfo());
                die();
            } else {
                $res = $query->execute(array(
                    'message' => $this->getMessage(),
                    'userId' => $this->getUser()->getUserId()
                ));
            }
        } catch (PDOException $e) {
            $log->error('PDO error', $e->getMessage());
            die();
        } 

    }
    
    function __destruct() {
        $this->connection = null;
    }
    
}

?>


