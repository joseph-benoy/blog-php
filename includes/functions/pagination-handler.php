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
            echo '            
                <nav aria-label="Page navigation example">   
                <ul class="pagination justify-content-center">
                    <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1">        
                        <span aria-hidden="true">&laquo;</span>
                        <span class="sr-only">Previous</span>
                    </a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                    <a class="page-link" href="#">
                        <span aria-hidden="true">&raquo;</span>
                        <span class="sr-only">Next</span>
                    </a>
                    </li>
                </ul>
                </nav>';
        }
        catch(Exception $error){
            echo "Pagination error : $error->getMessage()<br>";
        }
    }
?>