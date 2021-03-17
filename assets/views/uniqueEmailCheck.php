<?php
session_start();
include_once '../dbConnect/DbConnect.php';


    $email = $_SESSION['add-teach-emails'];

    $queryEmail = ("SELECT email FROM teacher WHERE email = '$email'");
    $con3 = get_db();



    $result = pg_query($con3, $queryEmail);
    if (pg_num_rows($result) > 0) {
        while ($row = pg_fetch_array($result)) {
            if ($row[0] = $email) {
                echo '<pre>';
                print_r($row[0]);
                echo '</pre>';

                echo '<script language="javascript">';
                echo 'alert("Email Already taken")';
                echo console_log("taken");
                echo '</script>';
                header("Location: add-teacher.php?emailTaken=Error");
            } else {
                echo '<pre>';
                print_r($row[0]);
                echo '</pre>';
                echo '<script language="javascript">';
                echo 'alert("Not taken")';
                echo console_log("Not Taken");
                echo '</script>';
                header("Location: add-teacher.php?Approved=");

            }

        }
    }



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
test
</body>
</html>
