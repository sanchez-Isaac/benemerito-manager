<?php


    $email = $_SESSION['add-teach-emails'];

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

?>
<!doctype html>

<html lang="en">
<head>
    <meta charset="utf-8">

    <title>Submit info</title>
    <meta name="description" content="The HTML5 Herald">
    <meta name="author" content="SitePoint">

    <link rel="stylesheet" href="css/styles.css?v=1.0">

</head>

<body>

</body>
</html>
