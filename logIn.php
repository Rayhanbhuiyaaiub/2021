<?php
include 'db_include.php';
$msg="UserName or Password Invalid";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LogIn Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
</head>
<body>
    <div class="container-fluid">
        <form action="" class="" method="Post">
            <div class="form-control">
                <label for="">User Name:</label>
                <input type="text" name="username" id="" class="form-control">
            </div>
            <div class="form-control">
                <label for="">Password:</label>
                <input type="password" name="password" id="" class="form-control">
            </div>
            <div align="center" class="mt-5">
                <button type="submit" class="btn btn-primary">Login</button>
            </div>
        </form> 
    </div>
</body>
</html>