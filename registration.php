<?php

session_start();
include('db_include.php');
$error_username = $error_email = $error_password = $error_cnfm = "";
$email = $username = "";

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cnfm_password = $_POST['password_confirm'];

    $isError= false;

    //USERNAME ERROR CHECK
    if($username=="")
    {
        $isError = true;
        $error_username = "Username is Required!";
    }
    elseif(strlen($username)<4)
    {
        $isError = true;
        $error_username ="Username should be at least 4 character";
    }
    else
    {
        $query = "Select * from user where username='$username'";
        $result = mysqli_query($conn,$query);

        if(mysqli_num_rows($result)>0)
        {
            $isError = true;
            $error_username = "Username Already Exist!";
        }
    }
    
    //------------

    //Email Error Check
    if($email=="")
    {
        $isError = true;
        $error_email = "Email is Required!";
    }
    elseif(!filter_var($email, FILTER_VALIDATE_EMAIL))
    {
        $isError = true;
        $error_email = "Not an Valid Email";
    }
    else
    {
        $query = "Select * from user where email='$email'";
        $result = mysqli_query($conn,$query);

        if(mysqli_num_rows($result)>0)
        {
            $isError = true;
            $error_email = "Email Already Exist!";
        }
    }

    //

    //PASSWORD ERROR CHECK
    if($password=="")
    {
        $isError = true;
        $error_password = "Password is Required!";
    }
    elseif(strlen($password)<5)
    {
        $isError = true;
        $error_password = "Password Should Be at least 5 character";
    }
    
    if($password != $cnfm_password)
    {
        $isError = true;
        $error_cnfm ="Password Doesn't Match";
    }

    //----

    if(!$isError)
    {
        $insertQuery = "Insert into user (username,email,password) values('$username','$email','$password');";

        if(mysqli_query($conn,$insertQuery))
        {
            $_SESSION['username'] = $username;
            header('location:home.php');
            die();
        }
        else
        {
            echo "<script>
                    alert('Database fatal Error!');
                 </script>";
        
        }
    }


}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <title>Registration</title>
</head>
<body>    
    <form class="form-horizontal" action='' method="POST">
    <fieldset>
        <div style="text-align:center" id="legend">
        <legend class="">Register</legend>
        </div>
        <div class="control-group">
        <!-- Username -->
        <label class="control-label"  for="username">Username</label>
        <div class="controls">
            <input type="text" value="<?=$username;?>" id="username" name="username" placeholder="" class="input-xlarge">
            <p style="color:red; font-weight:bold; text-transform:uppercase;" class="help-block"><?=$error_username?></p>
        </div>
        </div>
    
        <div class="control-group">
        <!-- E-mail -->
        <label class="control-label" for="email">E-mail</label>
        <div class="controls">
            <input type="text" value="<?=$email;?>" id="email" name="email" placeholder="" class="input-xlarge">
            <p style="color:red; font-weight:bold; text-transform:uppercase;" class="help-block"><?=$error_email;?></p>
        </div>
        </div>
    
        <div class="control-group">
        <!-- Password-->
        <label class="control-label" for="password">Password</label>
        <div class="controls">
            <input type="password" id="password" name="password" placeholder="" class="input-xlarge">
            <p style="color:red; font-weight:bold; text-transform:uppercase;" class="help-block"><?=$error_password?></p>
        </div>
        </div>
    
        <div class="control-group">
        <!-- Password -->
        <label class="control-label"  for="password_confirm">Password (Confirm)</label>
        <div class="controls">
            <input type="password" id="password_confirm" name="password_confirm" placeholder="" class="input-xlarge">
            <p style="color:red; font-weight:bold; text-transform:uppercase;" class="help-block"><?=$error_cnfm;?></p>
        </div>
        </div>
    
        <div class="control-group">
        <!-- Button -->
        <div class="controls">
            <button class="btn btn-success">Register</button>
            <a href="logIn.php" class="btn btn-link">Back</a>
        </div>
            
        </div>
    </fieldset>
    </form>
</body>
</html>