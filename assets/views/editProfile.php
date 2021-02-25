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



