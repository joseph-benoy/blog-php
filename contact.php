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
<?php require_once("includes/components/header.php"); ?> 
<div class="container-fluid">
    <form id="contact-form" method="post" action="save-contact.php">
    <div class="form-row">
        <div class="col-md-4 mb-3">
        <label for="validationServerUsername">Full name</label>
        <div class="input-group">
            <div class="input-group-prepend">
            <span class="input-group-text" id="inputGroupPrepend3"><i class="bi bi-file-person"></i></span>
            </div>
            <input type="text" class="form-control" name="full_name" id="full_name" placeholder="Full name" aria-describedby="inputGroupPrepend3" required>
        </div>
        </div>
        <div class="col-md-4 mb-3">
        <label for="validationServerUsername">Username</label>
        <div class="input-group">
            <div class="input-group-prepend">
            <span class="input-group-text" id="inputGroupPrepend3">@</span>
            </div>
            <input type="email" class="form-control" id="email" name="email" placeholder="Email" aria-describedby="inputGroupPrepend3" required>
        </div>
        </div>
        <div class="col-md-4 mb-3">
        <label for="validationServerUsername">Phone</label>
        <div class="input-group">
            <div class="input-group-prepend">
            <span class="input-group-text" id="inputGroupPrepend3"><i class="bi bi-telephone"></i></span>
            </div>
            <input type="tel" class="form-control" id="phone" name="phone" placeholder="Phone" aria-describedby="inputGroupPrepend3" required>
        </div>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Your message</label>
            <textarea class="form-control rounded-0" id="message" rows="10" cols="150" name="message" required></textarea>
        </div>
    </div>
    <button class="btn btn-primary btn-block" type="submit" id="message-btn">Send message</button>
    </form> 
</div>
</body>
</html>