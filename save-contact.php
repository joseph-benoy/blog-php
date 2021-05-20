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
    <?php require_once("includes/components/header.php"); ?>  
    <div class="container-fluid" id="save-contact-container">
    <div class="save-contact-row"">
        <?php
            require_once("includes/config.php");
            function save_contact(){
                $flag = true;
                if(isset($_POST['full_name'])&&isset($_POST['email'])&&isset($_POST['phone'])&&isset($_POST['message'])){
                    if(!($_POST['full_name']==""||$_POST['email']==""||$_POST['phone']==""||$_POST['message']=="")){
                        $db = new DB(...$GLOBALS['db_config_array']);
                        array_walk($_POST,function(&$value){
                            $value = htmlentities($value);
                        });
                        if($db->save_message($_POST)){
                            echo '
                                <div class="row">
                                    <div class="col-12">
                                        <h1 style="text-align:center;">We recieved your message!</h1>
                                    </div>
                                </div>
                                    <hr>
                                <div class="row">
                                    <div class="col-12">
                                        <p style="text-align:center;">Thanks for contacting us. We will reach you soon. Till then please keep in touch!</p>
                                    </div>
                                </div>
                                <div class="row text-center">
                                    <div class="col-12">
                                        <a href="index.php" style="text-align:center;" class="save-contact-btn"><i class="bi bi-house-door"></i>&nbsp;&nbsp;Home</a>
                                    </div>
                            </div>
                            ';
                        }
                        else{
                            $flag = false;
                        }
                    }
                    else{
                        $flag = false;
                    }
                }
                else{
                    $flag = false;
                }
                if($flag==false){
                    echo '
                    <div class="row">
                        <div class="col-12">
                            <h1 style="text-align:center;">Something went wrong!</h1>
                        </div>
                    </div>
                        <hr>
                    <div class="row">
                        <div class="col-12">
                            <p style="text-align:center;">We couldn\'t process your request. Please try again!</p>
                        </div>
                    </div>
                    <div class="row text-center">
                        <div class="col-12">
                            <a href="contact.php" style="text-align:center;" class="save-contact-btn"><i class="bi bi-person-lines-fill"></i>&nbsp;&nbsp;Contact</a>
                        </div>
                </div>
                ';
                }
            }
            save_contact();
        ?>
    </div>
    </div>
</body>
</html>