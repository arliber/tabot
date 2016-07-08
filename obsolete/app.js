    
    /*
        //Get request params as passed by .htaccess
        //parse_str($_GET['params'], $params);
        $params = Array('hub_verify_token' => $_GET['hub_verify_token'], 'hub_challenge'=>$_GET['hub_challenge']);   
            
        //Run selected action
        switch ($_GET['action']) {
            case 'bot':
                $botServer->processRequest($params['hub_verify_token'], $params['hub_challenge']);
                break;
            case 'dashboard':
                echo 'Soon..'; 
                break;       
            default:
                echo '404';
                break;
        }
    */