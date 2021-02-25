<?php
session_start();
include_once 'DbConnect.php';




pre_r($_SESSION);
function pre_r($array)
{
    echo '<pre>';
    print_r($array);
    echo '</pre>';
}

if($_SESSION['recipient-names'] !== ""){
    echo "Perfect";

}

//$_SESSION['recipient-names'];
//$_SESSION['recipient-middles'];
//$_SESSION['recipient-births'];
//$_SESSION['recipient-emails'];
//$_SESSION['recipient-zooms'];



header("Location: profile.php?edition=Success");