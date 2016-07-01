<?php 

    $autoloaderpaths = [
            'app',
            'app/bots/studnetHelp',
            'app/bots/tabot'
    ];

    spl_autoload_extensions('.class.php');

    //Set applications paths for the spl_autoloader
    foreach($autoloaderpaths as $path){
        set_include_path(get_include_path() . PATH_SEPARATOR . __DIR__ . DIRECTORY_SEPARATOR . $path . DIRECTORY_SEPARATOR);
    }

    //Register autoloader methods here, or leave the call empty for spl_autoloader default
    spl_autoload_register();

?>