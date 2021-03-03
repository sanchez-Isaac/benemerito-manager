<?php
require ('../dbConnect/DbConnect.php');
session_start();

//Admin and teacher differentiation!!!
if (isset($_SESSION['username']) && $_SESSION['message'] == "You are logged in Teacher") {
    header('location: teacher_Home.php?Login=True');
}


//If no one is logged in, return to login page
if (!isset($_SESSION['username'])) {
    header('location: ../../index.php?Login=False');
}

pre_r($_SESSION);
function pre_r($array)
{
    echo '<pre>';
    print_r($array);
    echo '</pre>';
}

