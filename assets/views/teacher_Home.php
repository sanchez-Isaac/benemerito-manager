<?php
session_start();
include_once 'DbConnect.php';


if(isset($_SESSION['username']) && $_SESSION['message'] == "You are logged in Admin" )
{

    header('location: assets/views/adminHome.php?Login=True');
}
else if(isset($_SESSION['username']) && $_SESSION['message'] == "You are logged in Teacher" )
{
    header('location: assets/views/teacher_Home.php?Login=True');
}

//TO DO
//Admin and teacher differentiation!!!

if(!isset($_SESSION['username']))
{
    header('location: index.php?Login=False');
}

echo '<pre>';
print_r($_SESSION);
echo '</pre>';
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Untitled</title>



</head>

<body>
<title>Home Page</title>
<div class="header">
    <h1 class="headtitle"> Welcome <?php echo $_SESSION['first_name']. " " . $_SESSION['last_name'] ; ?></h1>
    <br>
    <br>
</div>
<p>Testing . Teac her</p>





</body>

</html>
