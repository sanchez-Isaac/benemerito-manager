<?php
session_start();
include_once 'DbConnect.php';



//if(!isset($_SESSION['username']))
//{
 //   header('location: index.php?Login=False');
//}

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
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Clean.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body>
<title>Home Page</title>
<div class="header">
    <h1 class="headtitle"> Welcome <?php echo $_SESSION['first_name']. " " . $_SESSION['last_name'] ; ?></h1>
    <br>
    <br>
</div>
<p>Testing . Teacher</p>





<script src="assets/js/jquery.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>
