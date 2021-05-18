<?php
    require_once("includes/config.php");
    function display_pagination($page_no)
    {
        try{
            $db = new DB(...$GLOBALS['db_config_array']);
            $pagination = $db->get_pagination($page_no,POSTS_PER_PAGE);
            $col_count = 0;
            foreach($pagination->posts as $post){
                if($col_count===0){
                    echo '<div class="row">';
                }
                echo '<div class="col-lg-6 post-card">
                <div class="card" style="width: 32rem;">
                    <img class="card-img-top" src="admin/uploads/cover_images/'.$post['COVER_IMAGE_LOCATION'].'" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">'.$post['TITLE'].'</h5>
                        <p class="card-text" style="color:rgba(0,0,0,0.7);">'.$post['DESCRIPTION'].'</p>
                        <a href="post.php?url='.$post['TITLE_SLAG'].'" class="btn btn-primary read-more-btn">Read more</a>
                    </div>
                </div>
            </div>';
                if($col_count>0){
                    echo "</div>";
                }
                if($col_count===1){
                    $col_count=0;
                }
                else{
                    $col_count++;
                }
            }
        }
        catch(Exception $error){
            echo "Pagination error : $error->getMessage()<br>";
        }
    }
?>