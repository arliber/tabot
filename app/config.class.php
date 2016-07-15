<?php

class config {

    static $db = array(
        'userName' => 'root',
        'password' => 'toor',
        'server' => 'localhost',
        'name' => 'tabot'
    );

    /*static $db = array(
        'userName' => 'b57651611a37a4',
        'password' => '5d214118',
        'server' => 'us-cdbr-iron-east-04.cleardb.net',
        'name' => 'heroku_629a78a21f203fa'
    );*/

    /*static $db = array(
        'userName' => $_ENV['DB_USERNAME'],
        'password' => $_ENV['DB_PASSWORD'],
        'server' => $_ENV['DB_SERVER'],
        'name' => $_ENV['DB_NAME']
    );*/

    static $bot = array(
        'verificationToken' => 'my_bot_app_will_change_the_world',
        'accessToken' => 'EAAOZCEaUNtxIBAL1bafIm0IYzlo8YcLxjxklu7hjyi8QC4yzwFXFfK0p8qDluJxmGP3lE1roZAOwvCBr7F8dqx0Of7kpTgGRZBncZC1gxtHxlT79Lpbgg4LIfAZA7ZAVVgsskxPd3RbJjsSRcX5rJYRnd8sQbjW4LMBMbgICIf5QZDZD',
        'sendUrl' => 'https://graph.facebook.com/v2.6/me/messages?access_token='
    );

}

?>
