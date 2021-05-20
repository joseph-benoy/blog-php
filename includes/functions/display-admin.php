<?php
    require_once("includes/config.php")
    function display_admin($id){
        $db = new DB(...$GLOBALS['db_config_array']);
        $admin = $db->get_admin($id);
    }
?>