<?php
    require_once("includes/config.php");
    if(isset($_POST['val']))
    {
        try{
            $db = new DB(...$GLOBALS['db_config_array']);
            $result = $db->search_posts($_POST['val']);
            echo json_encode($result);
        }
        catch(Exception $error){
            error_log("Search post error : {$error->getMessage()}",0);
        }
    }
    else{
        echo "0";
    }
?>