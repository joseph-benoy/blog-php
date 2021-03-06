<?php
    require_once("includes/config.php");
    function display_page_btn($page_no,$total_pages){
        if($total_pages!=1){
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
                    if($page_no==$i){
                        echo '<li class="page-item"><a style="color:#564a4a;" class="page-link" href="?page='.$i.'">'.$i.'</a></li>';
                    }
                    else{
                        echo '<li class="page-item"><a class="page-link" href="?page='.$i.'">'.$i.'</a></li>';
                    }
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
                        <a style="display:block;margin-bottom:0.05vh;" class="card-text post-header-links" href="date-posts.php?date='.$post['DATE'].'"><i class="bi bi-calendar-check"></i>&nbsp;&nbsp;'.$post['DATE'].'</a><br>'.'                        <a href="post.php?url='.$post['TITLE_SLAG'].'" class="btn btn-primary read-more-btn">Read more</a>'.
                    '</div>
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
                        <a style="display:block;margin-bottom:0.05vh;" class="card-text post-header-links" href="date-posts.php?date='.$post['DATE'].'"><i class="bi bi-calendar-check"></i>&nbsp;&nbsp;'.$post['DATE'].'</a><br>'.'                        <a href="post.php?url='.$post['TITLE_SLAG'].'" class="btn btn-primary read-more-btn">Read more</a>'.
                    '</div>
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
    function display_post($title_slag,$view_flag){
        try{
            $db = new DB(...$GLOBALS['db_config_array']);
            $post = $db->get_post($title_slag);
            if($view_flag){
                $db->increment_view($title_slag);
            }
            echo '<div class="row">';
                echo '<h1>'.$post->title.'</h1>';
            echo '</div>';
            echo '<hr>';
            echo '<div class="row">';
                echo '<a class="post-header-links" href="author.php?id='.$post->author_id.'"><i class="bi bi-person-circle"></i>&nbsp;&nbsp;'.$post->author_name.'</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
                echo '<a class="post-header-links" href="date-posts.php?date='.$post->date.'"><i class="bi bi-calendar-check"></i>&nbsp;&nbsp;'.$post->date.'</a>';
            echo '</div>';
            echo "<hr>";
            echo '<div class="row text-center post-image">';
                echo '<img src="admin/uploads/cover_images/'.$post->cover_image.'" class="img-fluid" alt="cover image">';
            echo '</div>';
            echo '<div class="row text-center" id="post-content-row">';
                echo '<pre id="post-content">'.$post->content.'</pre>';
            echo '</div>';
            echo "<hr>";
            echo "<h5>Tags<h5>";
            echo '<div class="row">';
                foreach($post->tags as $tag){
                    echo '<a class="post-tags-link" href="category.php?category='.$tag[0].'">'.$tag[0].'</a>&nbsp;&nbsp;&nbsp;&nbsp;';
                }
            echo '</div>';
            echo '<hr>';
        }
        catch(Exception $error){
            error_log("display_post_error : {$error->getMessage()}",0);
        }
    }
    function display_date_posts($date,$page_no){
        try{
            $db = new DB(...$GLOBALS['db_config_array']);
            $pagination = $db->get_posts_by_date($date,$page_no,POSTS_PER_PAGE);
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
?>