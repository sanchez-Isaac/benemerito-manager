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

$name = null;
$middle = null;
$last = null;
$birth = null;
$email = null;
$zoom = null;
$mobile = null;
$tel = null;
$pass = null;
$id = 0;

$query2 = 'SELECT teacher_id FROM teacher';

$result = pg_query($con, $query2);
while ($row = pg_fetch_array($result)){
    $id = $row['teacher_id'];

}
$login_id = ($id+1);





if($_SESSION['add-teach-names'] !== ""){
    $name = $_SESSION['add-teach-names'];
}

if($_SESSION['add-teach-middles'] !== ""){
    $middle = $_SESSION['add-teach-middles'];
}

if($_SESSION['add-teach-lasts'] !== "") {
    $last = $_SESSION['add-teach-lasts'];
}

if($_SESSION['add-teach-births'] !== ""){
    $last = $_SESSION['add-teach-births'];
}

if($_SESSION['add-teach-emails'] !== ""){
    $email = $_SESSION['add-teach-emails'];
}

if($_SESSION['add-teach-zooms'] !== ""){
    $zoom = $_SESSION['add-teach-zooms'];
}

if($_SESSION['add-teach-mobiles'] !== ""){
    $mobile = $_SESSION['add-teach-mobiles'];
}

if($_SESSION['add-teach-tel'] !== ""){
    $tel = $_SESSION['add-teach-tel'];
}

if($_SESSION['add-teach-pass'] !== ""){
    $pass = $_SESSION['add-teach-pass'];
}



$query = "INSERT INTO teacher (teacher_id, adm_name, middle_name, last_name, birthdate, zoomoffice, email, password, mobile_phone, home_phone) 
VALUES ($login_id,$name,$middle,$last,$birth,$zoom,$email,$pass,$mobile,$tel);";
pg_query($con ,$query);
pg_close($con);



function console_log( $data ){
    echo '<script>';
    echo 'console.log('. json_encode( $data ) .')';
    echo '</script>';


}





/*
unset ($_SESSION['add-teach-names']);
unset ($_SESSION['add-teach-middles']);
unset ($_SESSION['add-teach-lasts'] );
unset ($_SESSION['add-teach-births']);
unset ($_SESSION['add-teach-emails'] );
unset ($_SESSION['add-teach-zooms']);
unset ($_SESSION['add-teach-mobiles'] );
unset ($_SESSION['add-teach-tel'] );
unset ($_SESSION['add-teach-pass'] );
*/

//header("Location: teachersView.php?edition=Success");