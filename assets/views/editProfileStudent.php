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
$user_id = $_SESSION['studentID'];

if($_SESSION['recipient-names'] !== ""){

    $user_name = $_SESSION['recipient-names'];

        $query = "UPDATE student SET stu_name = '$user_name' WHERE student_id = '$user_id';";
        pg_query($con ,$query);
        // pg_close($con);
    $_SESSION['student_name'] = $user_name;
}

if($_SESSION['recipient-middles'] !== ""){

    $user_middle = $_SESSION['recipient-middles'];
    $query = "UPDATE student SET middle_name = '$user_middle' WHERE student_id = '$user_id';";
    pg_query($con ,$query);
    // pg_close($con);
    $_SESSION['stu_middle_name'] = $user_middle;
}



if($_SESSION['recipient-lasts'] !== "") {
    $user_last = $_SESSION['recipient-lasts'];
    $query = "UPDATE student SET last_name = '$user_last' WHERE student_id = '$user_id';";
    pg_query($con ,$query);
    // pg_close($con);
    $_SESSION['stud_last_name'] = $user_last;
}


if($_SESSION['recipient-births'] !== ""){

    $user_birth = $_SESSION['recipient-births'];
    $query = "UPDATE student SET birthdate = '$user_birth' WHERE student_id = '$user_id';";
    pg_query($con ,$query);
    // pg_close($con);
    $_SESSION['stud_birthdate'] = $user_birth;
}

if($_SESSION['recipient-emails'] !== ""){
    $user_email = $_SESSION['recipient-emails'];
    $query = "UPDATE student SET email = '$user_email' WHERE student_id = '$user_id';";
    pg_query($con ,$query);
    // pg_close($con);
    $_SESSION['stud_email'] = $user_email;
}


if($_SESSION['recipient-tutoremail'] !== ""){
    $tutoremail = $_SESSION['recipient-tutoremail'];
    $query = "UPDATE student SET tutor_email = '$tutoremail' WHERE student_id = '$user_id';";
    pg_query($con ,$query);
    // pg_close($con);
    $_SESSION['stud_tutoremail'] = $tutoremail;
}

if($_SESSION['recipient-stud-phone'] !== ""){
    $studephone = $_SESSION['recipient-stud-phone'];
    $query = "UPDATE student SET student_phone = '$studephone' WHERE student_id = '$user_id';";
    pg_query($con ,$query);
    // pg_close($con);
    $_SESSION['stud_phone'] = $studephone;
}

if($_SESSION['recipient-tutorphone'] !== ""){
    $tutorphone = $_SESSION['recipient-tutorphone'];
    $query = "UPDATE student SET tutor_phone = '$tutorphone' WHERE student_id = '$user_id';";
    pg_query($con ,$query);
    // pg_close($con);
    $_SESSION['stud_tutor_phone'] = $tutorphone;
}


pg_close($con);



function console_log( $data ){
    echo '<script>';
    echo 'console.log('. json_encode( $data ) .')';
    echo '</script>';


}



unset ($_SESSION['recipient-names']);
unset ($_SESSION['recipient-middles']);
unset ($_SESSION['recipient-lasts'] );
unset ($_SESSION['recipient-births']);
unset ($_SESSION['recipient-emails'] );
unset ($_SESSION['recipient-tutoremail']);
unset ($_SESSION['recipient-stud-phone'] );
unset ($_SESSION['recipient-tutorphone'] );

header("Location: student_view_profile.php?edition=Success");