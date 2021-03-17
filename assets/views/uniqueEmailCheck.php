<?php
session_start();
include_once '../dbConnect/DbConnect.php';



    $email = $_SESSION['add-teach-emails'];

    $queryEmail = ("SELECT email FROM teacher WHERE email = '$email'");
    $con3 = get_db();
    $_SESSION['query'] = $queryEmail;


    $result = pg_query($con3, $queryEmail);
    if (pg_num_rows($result) == 1) {


                echo '<script language="javascript">';
                echo 'alert("Email Already taken")';
                echo console.log("taken");
                echo '</script>';
                $_SESSION['taken?'] = 'Taken';
                header("Location: add-teacher.php?emailTaken=Error");
            } else {

                echo '<script language="javascript">';
                echo 'alert("Not taken")';
                echo console.log("Not Taken");
                echo '</script>';
                $_SESSION['taken?'] = 'not Taken';
                header("Location: add-teacher.php?Approved=");



    }


echo '<pre>';
print_r($_SESSION);
echo '</pre>';


?>
<!doctype html>

<html lang="en">
<head>
    <meta charset="utf-8">

    <title>Submit info</title>
    <meta name="description" content="The HTML5 Herald">
    <meta name="author" content="SitePoint">



</head>

<body>

</body>
</html>
