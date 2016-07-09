<?php
    
    require_once('autoload.php');
    require_once('logger.php');
    
    header('Content-Type: application/json');
    
    if(isset($_GET['action'])) {
        
        $dashboardModel = new dashboard($log);
            
        switch ($_GET['action']) {
            case 'getKPIs':
                echo(json_encode(['data'=>$dashboardModel->getKPIs()]));
                break;
            case 'getUsers':
                echo(json_encode(['data'=>$dashboardModel->getUsers()]));
                break;
            case 'sendMessage':
                echo $dashboardModel->sendMessage($_GET['message'],$_GET['userId']);
                break;
            default:
                echo(json_encode(['message'=>'Unknown action ['.$_POST['action'].']']));
                break;
        }
        
    } else {
        echo(json_encode(['message'=>'No action selected']));
    }
    
?>