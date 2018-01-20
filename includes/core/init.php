<?php
    //Start Session
    session_start();

    //Include Configuration
    require_once('includes/config/config.php');
    
    //Helper Function Files
    require_once('includes/helpers/system_helper.php');
    require_once('includes/helpers/format_helper.php');
    require_once('includes/helpers/db_helper.php'    );

    //Autoload Classes     
    function __autoload($class_name){
            require_once('includes/libraries/'.$class_name.'.php');
    }

?>