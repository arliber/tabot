<?php

class messagestore extends message {

    private $log;
    private $connection;

    function __construct($message, $log) {
        parent::__construct($message);

        $this->log = $log;

        //Define DB
        $this->connection = new PDO('mysql:host='.config::$db['server'].';dbname='.config::$db['name'], config::$db['userName'], config::$db['password']);
        $this->connection->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);  // allows us to catch errors
    }

    public function save() {

        try {
            $query = $this->connection->prepare('INSERT INTO '.config::$db['name'].'.messages (message, userId, created) VALUES(:message, :userId, NOW())');
            if(!$query) {
                $this->log->error('PDO error', $this->connection->errorInfo());
                die();
            } else {
                $res = $query->execute(array(
                    'message' => $this->getMessage(),
                    'userId' => $this->getUser()->getUserId()
                ));
            }
        } catch (PDOException $e) {
            $this->log->error('PDO error', $e->getMessage());
            die();
        }

    }

    function __destruct() {
        $this->connection = null;
    }

}

?>
