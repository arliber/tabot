<?php

include_once('config.php');

class DataLayer {
    
    private $connection;
    
    function __construct() {
        $this->connection = new PDO('mysql:host='.Config::dbServer.';dbname='.Config::dbName, Config::dbUserName, Config::dbPassword);
    }
    
    protected function getQueryResult($query) {
        $resultObj = $this->connection->query($query);

        if($resultObj->rowCount() > 0)
        {
            foreach($resultObj as $singleRowFromQuery)
            {
                print_r($singleRowFromQuery);
            }
        }
        
        $resultObj = null;
        $connection = null;
        
    }
    
    function __destruct() {
        //TODO    
    }
    
}

?>


