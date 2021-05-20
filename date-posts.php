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
<body>
    <?php require_once("includes/components/header.php");?>  
    <div class="container-fluid" id="pagination-container">  
        <?php 
            echo '<h2 style="margin-top:2vh;">Posts on '.htmlentities($_GET['date']).'</h2>';
            require_once("includes/functions/pagination-handler.php");
            if(isset($_GET['date'])){
                if(isset($_GET['page']))
                {
                    if(is_numeric(htmlentities($_GET['page']))){
                        display_date_posts(htmlentities($_GET['date']),htmlentities($_GET['page']));
                    }
                    else{
                        echo "<h1>Something went wrong! Please go back to home page.</h1>";
                    }
                }
                else{
                    display_date_posts($_GET['date'],1);
                }
            }
            else{
                echo "<h1>Something went wrong! Please go back to home page.</h1>";
            }
        ?>
    </div>
</body>
</html>