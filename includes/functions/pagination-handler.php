<?php
    require_once("includes/config.php");
    function display_page_btn($page_no,$total_pages){
        echo '            
        <nav aria-label="Page navigation example" id="page-btns">   
        <ul class="pagination justify-content-center">
            <li class="page-item prev">
            <a class="page-link" href="?page='.($page_no-1).'" tabindex="-1">        
                <span aria-hidden="true">&laquo;</span>
                <span class="sr-only">Previous</span>
            </a>
            </li>';
            for($i=1;$i<=$total_pages;$i++){
                echo '<li class="page-item"><a class="page-link" href="?page='.$i.'">'.$i.'</a></li>';
            }
            if($page_no!=$total_pages){
                echo '<li class="page-item">
                <a class="page-link" href="?page='.($page_no+1).'">
                    <span aria-hidden="true">&raquo;</span>
                    <span class="sr-only">Next</span>
                </a>
                </li>
            </ul>
            </nav>';
            }
            else{
                    echo '<li class="page-item  disabled ">
                    <a class="page-link" href="?page='.($page_no+1).'">
                        <span aria-hidden="true">&raquo;</span>
                        <span class="sr-only">Next</span>
                    </a>
                    </li>
                </ul>
                </nav>';
            }        
    }
    function display_index_posts($page_no)
    {
        try{
            $db = new DB(...$GLOBALS['db_config_array']);
            $pagination = $db->get_pagination($page_no,POSTS_PER_PAGE);
            $col_count = 0;
            foreach($pagination->posts as $post){
                if($col_count===0){
                    echo '<div class="row">';
                }
                echo '<div class="col-xl-6 post-card">
                <div class="card" style="width: 32rem;">
                    <img class="card-img-top" src="admin/uploads/cover_images/'.$post['COVER_IMAGE_LOCATION'].'" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">'.$post['TITLE'].'</h5>
                        <p class="card-text" style="color:rgba(0,0,0,0.6);">'.$post['DESCRIPTION'].'</p>
                        <p class="card-text" style="color:rgba(0,0,0,0.7);font-size:0.9em;"><i class="bi bi-calendar-check"></i>&nbsp;&nbsp;'.$post['DATE'].'</p>
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
            display_page_btn($page_no,$pagination->no_of_pages);
        }
        catch(Exception $error){
            error_log("Pagination error : $error->getMessage()",0);
        }
    }
    function display_category_posts($category,$page_no){
        try{
            $db = new DB(...$GLOBALS['db_config_array']);
            $pagination = $db->get_posts_by_category($category,$page_no,POSTS_PER_PAGE);
            $col_count = 0;
            foreach($pagination->posts as $post){
                if($col_count===0){
                    echo '<div class="row">';
                }
                echo '<div class="col-xl-6 post-card">
                <div class="card" style="width: 32rem;">
                    <img class="card-img-top" src="admin/uploads/cover_images/'.$post['COVER_IMAGE_LOCATION'].'" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">'.$post['TITLE'].'</h5>
                        <p class="card-text" style="color:rgba(0,0,0,0.6);">'.$post['DESCRIPTION'].'</p>
                        <p class="card-text" style="color:rgba(0,0,0,0.7);font-size:0.9em;"><i class="bi bi-calendar-check"></i>&nbsp;&nbsp;'.$post['DATE'].'</p>
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
            display_page_btn($page_no,$pagination->no_of_pages);
        }
        catch(Exception $error){
            error_log("Pagination error : $error->getMessage()",0);
        }
    }
    function display_post($title_slag){
        try{
            $db = new DB(...$GLOBALS['db_config_array']);
            $post = $db->get_post($title_slag);
        }
        catch(Exception $error){
            error_log("display_post_error : {$error->getMessage()}",0);
        }
    }
?>