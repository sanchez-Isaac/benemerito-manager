<?php
session_start();
include_once 'DbConnect.php';

//if(!isset($_SESSION['username']))
//{
 //   header('location: index.php?Login=False');
//}
echo '<pre>';
print_r($_SESSION['user_id']);
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
    <h1 class="headtitle"> Welcome <?php echo $_SESSION['username']. " " . $_SESSION['last_name'] ; ?></h1>
    <br>
    <br>
</div>
<p>Testing . Admin</p>





<script src="assets/js/jquery.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>
