<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
    <link rel="stylesheet" href="assets/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/css/main.css">
    <script src="assets/bootstrap/jquery.min.js"></script>
    <script src="assets/bootstrap/popper.min.js"></script>
    <script src="assets/bootstrap/bootstrap.min.js"></script>
    <script src="assets/js/style.js"></script>
</head>
<body onload='pageBtnToggle(<?php echo isset($_GET["page"])?$_GET["page"]:1; ?>)'>
    <?php 
        require_once("includes/components/header.php"); 
    ?>
    <div class="container-fluid" id="pagination-container">  
        <?php 
            require_once("includes/functions/pagination-handler.php");
            if(isset($_GET['page']))
            {
                $page_no = htmlentities($_GET['page']);
                if(is_numeric($page_no)){
                    display_index_posts($page_no);
                }
                else{
                    echo '<h1>Something went wrong!</h1>';
                }
            }
            else{
                display_index_posts(1);
            }
        ?>
    </div>
</body>
</html>