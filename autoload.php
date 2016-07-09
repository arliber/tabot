<?php 

    $autoloaderpaths = [
            'app',
            'app/bots',
            'app/bots/studnetHelp',
            'app/bots/tabot',
            'app/bots/echobot'
    ];

    spl_autoload_extensions('.class.php,.abstract.php,.php');    
    
    //Set applications paths for the spl_autoloader
    foreach($autoloaderpaths as $path){
        set_include_path(get_include_path() . PATH_SEPARATOR . __DIR__ . DIRECTORY_SEPARATOR . $path . DIRECTORY_SEPARATOR);
    }

    //Register autoloader methods here, or leave the call empty for spl_autoloader default
    spl_autoload_register();
    
    require_once('vendor/autoload.php'); // Load composer packages
    
?>