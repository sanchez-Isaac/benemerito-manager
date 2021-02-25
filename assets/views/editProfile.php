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
    $user_id = $_SESSION['user_id'];
    $user_name = $_SESSION['recipient-names'];

    if($_SESSION['message'] == "You are logged in Admin"){

        $query = "UPDATE admin SET adm_name = '$user_name' WHERE admin_id = '$user_id';";
        pg_query($con ,$query);
        pg_close($con);
    }
    else if($_SESSION['message'] == "You are logged in Teacher"){

        $query = "UPDATE teacher SET adm_name = '$user_name' WHERE teacher_id = '$user_id';";
        pg_query($con ,$query);
        pg_close($con);
   }

    $_SESSION['user_name'] = $user_name;

}



if($_SESSION['recipient-middles'] !== ""){

    $user_id = $_SESSION['user_id'];
    $user_middle = $_SESSION['recipient-middles'];

    if($_SESSION['message'] == "You are logged in Admin"){
        $query = "UPDATE admin SET middle_name = '$user_middle' WHERE admin_id = '$user_id';";
        pg_query($con ,$query);
        pg_close($con);


    }
    else if($_SESSION['message'] == "You are logged in Teacher"){

        $query = "UPDATE teacher SET adm_name = '$user_middle' WHERE teacher_id = '$user_id';";
        pg_query($con ,$query);
        pg_close($con);

    }

    $_SESSION['middle_name']= $user_middle;;
    $_SESSION['last_name'];
    $_SESSION['birthdate'];
    $_SESSION['zoomoffice'];
    $_SESSION['email'];
}



if($_SESSION['recipient-births'] !== ""){

    $user_id = $_SESSION['user_id'];
    $user_birth = $_SESSION['recipient-births'];

    if($_SESSION['message'] == "You are logged in Admin"){
        $query = "UPDATE admin SET birthdate = '$user_birth' WHERE admin_id = '$user_id';";
        pg_query($con ,$query);
        pg_close($con);


    }
    else if($_SESSION['message'] == "You are logged in Teacher"){

        $query = "UPDATE teacher SET birthdate = '$user_birth' WHERE teacher_id = '$user_id';";
        pg_query($con ,$query);
        pg_close($con);

    }


    $_SESSION['birthdate']= $user_birth;

}



if($_SESSION['recipient-emails'] !== "") {
    $user_id = $_SESSION['user_id'];
    $user_email = $_SESSION['recipient-emails'];

    if ($_SESSION['message'] == "You are logged in Admin") {
        $query = "UPDATE admin SET email = '$user_email' WHERE admin_id = '$user_id';";
        pg_query($con, $query);
        pg_close($con);


    } else if ($_SESSION['message'] == "You are logged in Teacher") {

        $query = "UPDATE teacher SET email = '$user_email' WHERE teacher_id = '$user_id';";
        pg_query($con, $query);
        pg_close($con);


    }

    $_SESSION['email'] = $user_email;

}



if($_SESSION['recipient-zooms'] !== ""){
    $user_id = $_SESSION['user_id'];
    $user_zoom = $_SESSION['recipient-zooms'];

    if($_SESSION['message'] == "You are logged in Admin"){
        $query = "UPDATE admin SET zoomoffice = '$user_zoom' WHERE admin_id = '$user_id';";
        pg_query($con ,$query);
        pg_close($con);


    }
    else if($_SESSION['message'] == "You are logged in Teacher"){

        $query = "UPDATE teacher SET zoomoffice = '$user_zoom' WHERE teacher_id = '$user_id';";
        pg_query($con ,$query);
        pg_close($con);


    }
    $_SESSION['zoomoffice'] = $user_zoom;
}



function console_log( $data ){
    echo '<script>';
    echo 'console.log('. json_encode( $data ) .')';
    echo '</script>';


}



/*
unset ($_SESSION['first_namead']);
unset ( $_SESSION['last_namead']);
unset ($_SESSION['emailad']);
unset ($_SESSION['usernamead']);
unset ( $_SESSION['passwordad']);
*/

header("Location: profile.php?edition=Success");