<?php session_start();?>
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
    <div class="container-fluid" id="post-container">
        <a id="post-go-top" class="go-to-top"><i class="bi bi-arrow-up"></i></a>
        <?php 
            require_once("includes/functions/pagination-handler.php");
            if(!isset($_SESSION['id'])){
                $url = htmlentities($_GET['url']);
                $_SESSION['id'] = $url;
                display_post($url,true);
            }
            else{
                $url = htmlentities($_GET['url']);
                if($_SESSION['id']!=$url){
                    $_SESSION['id'] = $url;
                    display_post($url,true);
                }
                else{
                    display_post($url,false);
                }
            }
        ?>
    </div>
</body>
</html>