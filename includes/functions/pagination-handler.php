<?php
    require_once("includes/config.php");
    function display_pagination($page_no)
    {
        try{
            $db = new DB(...$GLOBALS['db_config_array']);
            $pagination = $db->get_pagination($page_no,POSTS_PER_PAGE);
            $col_count = 0;
            foreach($pagination->posts as $post){
                if($col_count<0){
                    echo '<div class="row">s'
                }
            }
        }
        catch(Exception $error){
            echo "Pagination error : $error->getMessage()<br>";
        }
    }
?>