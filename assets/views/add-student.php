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
$tutoremail = null;
$mobile = null;
$tel = null;

$id = 0;

$query2 = 'SELECT student_id FROM student';

$result = pg_query($con, $query2);
while ($row = pg_fetch_array($result)){
    $id ++;

}
$login_id = ($id+1);


if($_SESSION['add-stud-names'] !== ""){
    $name = $_SESSION['add-stud-names'];
}

if($_SESSION['add-stud-middles'] !== ""){
    $middle = $_SESSION['add-stud-middles'];
}

if($_SESSION['add-stud-lasts'] !== "") {
    $last = $_SESSION['add-stud-lasts'];
}

if($_SESSION['add-stud-births'] !== ""){
    $birth = $_SESSION['add-stud-births'];
}

if($_SESSION['add-stud-emails'] !== ""){
    $email = $_SESSION['add-stud-emails'];
}

if($_SESSION['add-stud-tutemails'] !== ""){
    $tutoremail = $_SESSION['add-stud-tutemails'];
}

if($_SESSION['add-stud-mobiles'] !== ""){
    $mobile = $_SESSION['add-stud-mobiles'];
}

if($_SESSION['add-stud-tutortels'] !== ""){
    $tel = $_SESSION['add-stud-tutortels'];
}



$query = "INSERT INTO student (student_id, stu_name, middle_name, last_name, birthdate, email, tutor_email, student_phone, tutor_phone) 
VALUES ($login_id,'$name','$middle','$last','$birth','$email','$tutoremail',$mobile, $tel);";
pg_query($con ,$query);
pg_close($con);







unset ($_SESSION['add-stud-names']);
unset ($_SESSION['add-stud-middles']);
unset ($_SESSION['add-stud-lasts'] );
unset ($_SESSION['add-stud-births']);
unset ($_SESSION['add-stud-emails'] );
unset ($_SESSION['add-stud-tutemails']);
unset ($_SESSION['add-stud-mobiles'] );
unset ($_SESSION['add-stud-tel'] );




header("Location: studentsView.php?edition=Success");