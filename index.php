<?php
require ('assets/dbConnect/DbConnect.php');
$con = get_db();


//This code will take you to the home-admin / home-teacher you are supposed to be.
if(isset($_SESSION['username']) && $_SESSION['message'] == "You are logged in Admin" )
{

    header('location: assets/views/adminHome.php?Login=True');
}
else if(isset($_SESSION['username']) && $_SESSION['message'] == "You are logged in Teacher" )
{
    header('location: assets/views/teacher_Home.php?Login=True');
}





if(isset($_POST['login_btn'])){

    $username = pg_escape_string($_POST['username']);
    $password = (pg_escape_string($_POST['password']));

    //$password = md5(pg_escape_string($_POST['password']));
    // $password= md5($password); // Hashes the passwords (this is only to register new users)
    $query = "SELECT * FROM admin WHERE email = '$username' AND password = '$password'";
    $resultLogin = pg_query( $con, $query);

   // SECOND LOGIN - NOT ADMIN
    $query2 = "SELECT * FROM teacher WHERE email = '$username' and password = '$password';";
    $resultLogin2 = pg_query( $con, $query2);




    //GET USER INFO
    $u_D_Query = "SELECT  * FROM  admin
WHERE  email = '$username' and password = '$password';";
    $resultUserData = pg_query( $con, $u_D_Query);

    if(pg_num_rows($resultLogin) == 1) {
        $_SESSION['message'] = "You are logged in";
        $_SESSION['username'] = $username;
        header("location: assets/views/adminHome.php");
    }
    else if(pg_num_rows($resultLogin) != 1) { // NEW LINE FOR SECOND LOGIN
        if(pg_num_rows($resultLogin2) == 1) {
            $_SESSION['message'] = "You are logged in ";
            $_SESSION['username'] = $username;
            header("location: assets/views/teacher_Home.php");
        }
        else{
            $_SESSION['message'] = "ERROR, User or password incorrect";
            $error = $_SESSION['message'];
            echo "<script type='text/javascript'>alert(\"$error\");</script>";
        }
    }
    else{
        $_SESSION['message'] = "ERROR, User or password incorrect";
        $error = $_SESSION['message'];
        echo "<script type='text/javascript'>alert(\"$error\");</script>";
    }



    if(pg_num_rows($resultLogin) == 1) {
        $_SESSION['message'] = "You are logged in Admin";
        $_SESSION['username'] = $username;
        header("location: assets/views/adminHome.php");
    }
    else if (pg_num_rows($resultLogin) != 1) {
        if (pg_num_rows($resultLogin2) == 1) {
            $_SESSION['message'] = "You are logged in Teacher";
            $_SESSION['username'] = $username;

            if (pg_num_rows($resultUserData) > 0) {
                while ($row = pg_fetch_array($resultUserData)) {

                    $_SESSION['user_id'] = $row[0];
                    $_SESSION['user_name'] = $row[1];
                    $_SESSION['middle_name'] = $row[2];
                    $_SESSION['last_name'] = $row[3];
                    $_SESSION['birthdate'] = $row[4];
                    $_SESSION['zoomoffice'] = $row[5];
                    $_SESSION['email'] = $row[6];
                }

            }
            header("location: assets/views/teacher_Home.php");
        }
    }
    else{
        $_SESSION['message'] = "ERROR, User or password incorrect";
        $error = $_SESSION['message'];
        echo "<script type='text/javascript'>alert(\"$error\");</script>";
    }
}


?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Clean.css">


    <title>Login - Benemerito</title>
</head>

<body>


<div class="login-clean">
    <form method="post" action="index.php">

        <div class="illustration"><i  ></i><img class="benelogo" src="assets/img/benemerito.png" alt="Benemerito logo"></div>
        <br>
        <div class="form-group"><input class="form-control" type="email" name="username" placeholder="Email"></div>
        <div class="form-group"><input class="form-control" type="password" name="password" placeholder="Password"></div>
        <div class="form-group"><button class="btn btn-primary btn-block" name="login_btn" type="submit">Log In</button></div>

        <a class="forgot" href="#">Forgot your email or password?</a>

    </form>
</div>
<script src="assets/js/jquery.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>