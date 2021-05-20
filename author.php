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
</head>
<body>
    <?php require_once("includes/components/header.php");?>
    <div class="container-fluid"id="admin-page-container" >
    <div class="container-fluid" id="admin-container">
        <?php 
            require_once("includes/functions/display-admin.php");
            display_admin($_GET['id']);
        ?>
    </div>  
</div>
</body>
</html>