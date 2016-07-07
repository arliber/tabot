<?php

class config {
    
    static $db = array(
        'userName' => 'root',
        'password' => 'toor',
        'server' => 'localhost',
        'name' => 'tabot'
    );
    
    static $bot = array(
        'verificationToken' => 'my_bot_app_will_change_the_world',
        'accessToken' => 'EAAOZCEaUNtxIBAL1bafIm0IYzlo8YcLxjxklu7hjyi8QC4yzwFXFfK0p8qDluJxmGP3lE1roZAOwvCBr7F8dqx0Of7kpTgGRZBncZC1gxtHxlT79Lpbgg4LIfAZA7ZAVVgsskxPd3RbJjsSRcX5rJYRnd8sQbjW4LMBMbgICIf5QZDZD',
        'sendUrl' => 'https://graph.facebook.com/v2.6/me/messages?access_token='
    );
    
}

?>