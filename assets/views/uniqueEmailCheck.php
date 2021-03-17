<?php
session_start();
include_once '../dbConnect/DbConnect.php';


    $email = $_SESSION['add-teach-emails'];

    $queryEmail = ("SELECT email FROM teacher WHERE email = '$email'");
    $con3 = get_db();



    $result = pg_query($con3, $queryEmail);
    if (pg_num_rows($result) > 0) {
        while ($row = pg_fetch_array($result)) {
            if ($row = $email) {
/*
                echo '<script language="javascript">';
                echo 'alert("Email Already taken")';
                echo console_log("taken");
                echo '</script>';
*/
                header("Location: add-teacher.php?emailTaken=Error");
            } else {
                /*
                echo '<script language="javascript">';
                echo 'alert("Not taken")';
                echo console_log("Not Taken");
                echo '</script>';
                */
                header("Location: add-teacher.php?Approved=");

            }
        }
    }


