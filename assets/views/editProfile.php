<?php
session_start();
include_once 'DbConnect.php';
$con = get_db();




pre_r($_SESSION);
function pre_r($array)
{
    echo '<pre>';
    print_r($array);
    echo '</pre>';
}

if($_SESSION['recipient-names'] !== ""){
    if($_SESSION['message'] === "You are logged in Admin"){
        $user_id = $_SESSION['user_id'];
        $user_name = $_SESSION['recipient-names'];
        $query = "UPDATE admin SET adm_name = '$user_id' WHERE admin_id = '$user_id'";
        pg_query($con ,$query);
        pg_close($con);
    }
    else if($_SESSION['message'] === "You are logged in Teacher"){

        $user_id = $_SESSION['user_id'];
        $user_name = $_SESSION['recipient-names'];
        $query = "UPDATE teacher SET adm_name = '$user_id' WHERE teacher_id = '$user_id'";
        pg_query($con ,$query);
        pg_close($con);
    }



}
if($_SESSION['recipient-middles'] !== ""){
    echo "DO SQL PUSH";

}
if($_SESSION['recipient-births'] !== ""){
    echo "DO SQL PUSH";

}
if($_SESSION['recipient-emails'] !== ""){
    echo "DO SQL PUSH";

}
if($_SESSION['recipient-zooms'] !== ""){
    echo "DO SQL PUSH";

}





//header("Location: profile.php?edition=Success");