<?php
    require_once("includes/config.php");
    function display_admin($id){
        $db = new DB(...$GLOBALS['db_config_array']);
        $admin = $db->get_admin($id);
        echo '<div class="row text-center">';
            echo '<div class="col-12">';
                echo '<img id="admin-img" src="admin/uploads/profile_pic/'.$admin->profile_pic_location.'" class="img-fluid">';
            echo '</div>';
        echo '</div>';
        echo '<div class="row text-center">';
            echo '<div class="col-12">';
                echo '<h2>'.$admin->full_name.'</h2>';
            echo '</div>';
        echo '</div>';
        echo '<div class="row text-center">';
            echo '<div class="col-12">';
                echo '<a id="admin-email" href="mailto:'.$admin->email.'">'.$admin->email.'</a>';
            echo '</div>';
        echo '</div>';
        echo '<div class="row">';
            echo '<div class="col-12">';
                echo '<pre id="admin-bio">'.$admin->bio.'</p>';
            echo '</div>';
        echo '</div>';
    }
?>