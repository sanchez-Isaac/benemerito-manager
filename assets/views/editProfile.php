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
    $user_id = $_SESSION['user_id'];
    $user_name = $_SESSION['recipient-names'];

    if($_SESSION['message'] == "You are logged in Admin"){

        $query = "UPDATE admin SET adm_name = '$user_name' WHERE admin_id = '$user_id';";
        pg_query($con ,$query);
       // pg_close($con);
    }
    else if($_SESSION['message'] == "You are logged in Teacher"){

        $query = "UPDATE teacher SET adm_name = '$user_name' WHERE teacher_id = '$user_id';";
        //pg_query($con ,$query);

   }

    $_SESSION['user_name'] = $user_name;

}



if($_SESSION['recipient-middles'] !== ""){

    $user_id = $_SESSION['user_id'];
    $user_middle = $_SESSION['recipient-middles'];

    if($_SESSION['message'] == "You are logged in Admin"){
        $query = "UPDATE admin SET middle_name = '$user_middle' WHERE admin_id = '$user_id';";
        pg_query($con ,$query);
        //pg_close($con);


    }
    else if($_SESSION['message'] == "You are logged in Teacher"){

        $query = "UPDATE teacher SET middle_name = '$user_middle' WHERE teacher_id = '$user_id';";
        pg_query($con ,$query);
      //  pg_close($con);

    }

    $_SESSION['middle_name']= $user_middle;

}

if($_SESSION['recipient-lasts'] !== ""){

    $user_id = $_SESSION['user_id'];
    $user_last = $_SESSION['recipient-lasts'];

    if($_SESSION['message'] == "You are logged in Admin"){
        $query = "UPDATE admin SET last_name = '$user_last' WHERE admin_id = '$user_id';";
        pg_query($con ,$query);
       // pg_close($con);


    }
    else if($_SESSION['message'] == "You are logged in Teacher"){

        $query = "UPDATE teacher SET last_name = '$user_last' WHERE teacher_id = '$user_id';";
        pg_query($con ,$query);
        //pg_close($con);

    }

    $_SESSION['last_name']= $user_last;

}




if($_SESSION['recipient-emails'] !== "") {
    $user_id = $_SESSION['user_id'];
    $user_email = $_SESSION['recipient-emails'];

    if ($_SESSION['message'] == "You are logged in Admin") {
        $query = "UPDATE admin SET email = '$user_email' WHERE admin_id = '$user_id';";
        pg_query($con, $query);
      //  pg_close($con);


    } else if ($_SESSION['message'] == "You are logged in Teacher") {

        $query = "UPDATE teacher SET email = '$user_email' WHERE teacher_id = '$user_id';";
        pg_query($con, $query);
       // pg_close($con);


    }

    $_SESSION['email'] = $user_email;

}



if($_SESSION['recipient-zooms'] !== ""){
    $user_id = $_SESSION['user_id'];
    $user_zoom = $_SESSION['recipient-zooms'];

    if($_SESSION['message'] == "You are logged in Admin"){
        $query = "UPDATE admin SET zoomoffice = '$user_zoom' WHERE admin_id = '$user_id';";
        pg_query($con ,$query);
       // pg_close($con);


    }
    else if($_SESSION['message'] == "You are logged in Teacher"){

        $query = "UPDATE teacher SET zoomoffice = '$user_zoom' WHERE teacher_id = '$user_id';";
        pg_query($con ,$query);
        //pg_close($con);


    }
    $_SESSION['zoomoffice'] = $user_zoom;
}

if($_SESSION['recipient-births'] !== ""){

    $user_id = $_SESSION['user_id'];
    $user_birth = $_SESSION['recipient-births'];

    if($_SESSION['message'] == "You are logged in Admin"){
        $query = "UPDATE admin SET birthdate = '$user_birth' WHERE admin_id = '$user_id';";
        pg_query($con ,$query);
        //pg_close($con);


    }
    else if($_SESSION['message'] == "You are logged in Teacher"){

        $query = "UPDATE teacher SET birthdate = '$user_birth' WHERE teacher_id = '$user_id';";
        pg_query($con ,$query);
       // pg_close($con);

    }

    console_log($user_birth);
    $_SESSION['birthdate']= $user_birth;

}

pg_close($con);

function console_log( $data ){
    echo '<script>';
    echo 'console.log('. json_encode( $data ) .')';
    echo '</script>';


}




unset ($_SESSION['recipient-names']);
unset ( $_SESSION['recipient-middles']);
unset ($_SESSION['recipient-lasts']);
unset ($_SESSION['recipient-births']);
unset ( $_SESSION['recipient-emails']);
unset ( $_SESSION['recipient-zooms']);

header("Location: profile.php?edition=Success");