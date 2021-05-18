<?php
    define('SERVER','localhost');
    define('USER','joseph');
    define('PASSWORD','3057');
    define('DATABASE','BLOG');
    define('POSTS_PER_PAGE',5);
    $db_config_array = array(SERVER,USER,PASSWORD,DATABASE);
    spl_autoload_register(function($class){
        $file_name = "class.".strtolower($class).".php";
        require_once("classes/".$file_name);
    });
?>