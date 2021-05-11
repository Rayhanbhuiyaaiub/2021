<?php
session_start();
//IS LOGGED IN VALIDATION
if(isset($_SESSION['username']))
{
    header('Location:home.php');
    die();
}

//-------------

include 'db_include.php';
$isError =false;
$username = "";
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "Select * from user where username='$username' and password='$password'";

    $result = mysqli_query($conn,$query);

    if(mysqli_num_rows($result)<=0)
    {
        $isError = true;
        $isRight = false;
    }

    if(mysqli_num_rows($result)>0)
    {
        $isError= false;

        $_SESSION['username'] = $username;
        header('location:home.php');
        
    }
}


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
                <input type="text" value="<?=$username;?>" name="username" id="" class="form-control">
            </div>
            <div class="form-control">
                <label for="">Password:</label>
                <input type="password" name="password" id="" class="form-control">
            </div>
            <div align="center" class="mt-5">
                <button type="submit" class="btn btn-primary">Login</button>
            </div>
            <?php if($isError){ ?>
            <div style="text-align:center;" class="alert alert-danger mt-3">
                Wrong Credentials!
            </div>
            <?php } ?>
        </form> 
            <div align="center" class="mt-5">
                <a href="registration.php"><button class="btn btn-link">Click Here To Sign Up!</button></a>
            </div>
    </div>
</body>
</html>