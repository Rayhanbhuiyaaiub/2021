<?php
include('session_val.php');


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
</head>
<body>
   <?php include 'navbar.html'; ?>
    <div class="container">
        <h1 align="center" style="text-transform:uppercase;">Welcome Home <?=$_SESSION['username']?></h1>
        <div align="center">
            <a href=""><button class="btn btn-secondary mt-5">CLICK HERE TO SEE NOTES</button></a>
        </div>
    </div>


</body>
</html>