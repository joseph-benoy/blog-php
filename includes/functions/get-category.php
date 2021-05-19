<?php
    require_once("includes/config.php");
    function get_category_list(){
        $db = new DB(...$GLOBALS['db_config_array']);
        $category_array = $db->get_used_tags();
        foreach($category_array as $category){
            echo '<a class="dropdown-item" href="category.php?category='.$category['NAME'].'">'.$category['NAME'].'</a>';
        }
    }
?>