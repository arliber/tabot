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