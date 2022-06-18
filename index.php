<?php
require_once('./operation.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <h1 class="text-center my-3">Registration Form</h1>
    <div class="container d-flex justify-content-center">
        <form action="display.php" method="post" class="w-50" enctype="multipart/form-data">        
            <?php inputFields("Name","name","","text") ?>
            <?php inputFields("Phone_Number","phone_number","","text") ?>
            <?php inputFields("Email_Id","email_id","","text") ?>
            <?php inputFields("","file","","file") ?>
            <button class="btn btn-dark" type="submit" name="submit">Submit</button>
        </form>
    </div>
</body>
</html>