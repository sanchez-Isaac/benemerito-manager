<?php
session_start();
include_once '../dbConnect/DbConnect.php';
$con = get_db();





pre_r($_SESSION);
function pre_r($array)
{
    echo '<pre>';
    print_r($array);
    echo '</pre>';
}

if($_SESSION['recipient-names'] !== ""){
    echo "DO SQL PUSH";
    /*
    if($_SESSION['message'] == "You are logged in Admin"){
        $user_id = $_SESSION['user_id'];
        $user_name = $_SESSION['recipient-names'];
        $query = "UPDATE admin SET adm_name = '$user_id' WHERE admin_id = '$user_id';";
        //pg_query($con ,$query);
       // pg_close($con);


        console_log($user_id);
        console_log($user_name);
        console_log($query);
    }
    else if($_SESSION['message'] == "You are logged in Teacher"){

        $user_id = $_SESSION['user_id'];
        $user_name = $_SESSION['recipient-names'];
        $query = "UPDATE teacher SET adm_name = '$user_id' WHERE teacher_id = '$user_id';";
        //pg_query($con ,$query);
        //pg_close($con);

        console_log($user_id);
        console_log($user_name);
        console_log($query);

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

function console_log( $data ){
    echo '<script>';
    echo 'console.log('. json_encode( $data ) .')';
    echo '</script>';

*/
}




//header("Location: profile.php?edition=Success");