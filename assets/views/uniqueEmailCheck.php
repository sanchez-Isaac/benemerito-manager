<?php


    $email = $_SESSION['add-teach-emails'] =  pg_escape_string($_POST['add-recipient-emails']);

    $queryEmail = ("SELECT 'email' FROM 'teacher' WHERE email = '$email'");
    $con3 = get_db();



    $result = pg_query($con3, $queryEmail);
    if (pg_num_rows($result) == $email) {



        echo '<script language="javascript">';
        echo 'alert("Email Already taken")';
        echo '</script>';
        header("Location: add-teacher.php?emailTaken=Error");
    }
    else{
        header("Location: add-teacher.php?Approved=");

    }

