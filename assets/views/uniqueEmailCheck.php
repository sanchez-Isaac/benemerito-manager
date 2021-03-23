<?php
session_start();
include_once '../dbConnect/DbConnect.php';



    $email = $_SESSION['add-teach-emails'];

    //$queryEmail = ("SELECT email FROM teacher WHERE email = '$email'");

$queryEmail = ("SELECT email FROM admin WHERE email = '$email' 
                UNION 
                SELECT email FROM teacher WHERE email = '$email';");

    $con3 = get_db();




    $result = pg_query($con3, $queryEmail);
    if (pg_num_rows($result) == 1) {

                $_SESSION['taken?'] = 'Taken';
                header("Location: teacher-reg.php?emailTaken=Error");
            } else {

                $_SESSION['taken?'] = 'not Taken';
                header("Location: add-teacher.php?Approved=");
    }


echo '<pre>';
print_r($_SESSION);
echo '</pre>';


