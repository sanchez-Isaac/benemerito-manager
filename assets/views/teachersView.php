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





$query2 = $query = 'SELECT DISTINCT teacher_id FROM teacher order by teacher_id';
$con2 = get_db();
$result = pg_query($con2, $query2);
if (pg_num_rows($result) > 0) {
    while ($row = pg_fetch_array($result)) {
        if (isset($_POST['submit#' . $row[0]])) {
            $_SESSION['teacherID'] = $_POST['submit#' . $row[0]];
            header('location: teacher_view_profile.php?');
        }

    }
}



/*Delete Session rows not in use for each of the
spaces in student profile view.
*/
if (isset($_SESSION['student_name'])){
    unset ($_SESSION['student_name']);
}
if ($_SESSION['stu_middle_name']){
    unset ($_SESSION['stu_middle_name']);
}
if (isset($_SESSION['stud_last_name'])){
    unset ($_SESSION['stud_last_name']);
}
if (isset($_SESSION['stud_birthdate'])){
    unset ($_SESSION['stud_birthdate']);
}
if (isset($_SESSION['stud_email'])){
    unset ($_SESSION['stud_email']);
}
if (isset($_SESSION['stud_tutoremail'])){
    unset ($_SESSION['stud_tutoremail']);
}
if (isset($_SESSION['stud_phone'])){
    unset ($_SESSION['stud_phone']);
}
if (isset($_SESSION['stud_tutor_phone'])){
    unset ($_SESSION['stud_tutor_phone']);
}

/*Delete Session rows not in use for each of the
spaces in teacher profile view.
*/
if (isset($_SESSION['teach_name'])){
    unset ($_SESSION['teach_name']);
}
if ($_SESSION['teach_middle_name']){
    unset ($_SESSION['teach_middle_name']);
}
if (isset($_SESSION['teach_last_name'])){
    unset ($_SESSION['teach_last_name']);
}
if (isset($_SESSION['teach_birthdate'])){
    unset ($_SESSION['teach_birthdate']);
}
if (isset($_SESSION['teach_zoom'])){
    unset ($_SESSION['teach_zoom']);
}
if (isset($_SESSION['teach_email'])){
    unset ($_SESSION['teach_email']);
}
if (isset($_SESSION['teach_m_phone'])){
    unset ($_SESSION['teach_m_phone']);
}
if (isset($_SESSION['teach_phone'])){
    unset ($_SESSION['teach_phone']);
}


if ($_SESSION['taken?'] == 'not Taken') {
    echo '<script language="javascript">';
    echo 'alert("Teacher Submitted to the Database")';
    echo '</script>';
}

if (isset($_SESSION['taken?'])){
    unset ($_SESSION['taken?']);
}



?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Admin - Benemerito</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="assets/css/styles.min.css">



</head>

<body>
<title>Students View</title>



<!-- Start: 1 Row 1 Column -->
<div></div><!-- End: 1 Row 1 Column -->
<!-- Start: 1 Row 3 Columns -->
<div>
    <div class="container">
        <div class="row">
            <!-- Start: school-logo -->
            <div class="col-auto col-md-4 col-xl-2 offset-xl-0">
                <img class="benelogo" src="../../assets/img/benemerito.png" alt="Benemerito-logo">
            </div><!-- End: school-logo -->

            <!-- Start: profesor-admin-name -->
            <div class="col-md-4 col-lg-8 col-xl-10 offset-xl-0">
                <br>

                <h2 class="headtitle"> Welcome Admin </h2>

            </div><!-- End: profesor- admin-name -->
            <!-- Start: nav-bar -->
            <div class="col-md-12 col-xl-12">
                <!-- Start: Navigation with Button -->
                <nav class="navbar navbar-light navbar-expand-md navigation-clean-button">
                    <div class="container"><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button><a class="navbar-brand" href="#"></a>
                        <div class="collapse navbar-collapse" id="navcol-1">
                            <ul class="nav navbar-nav mr-auto" >
                                <li  id="nactive" class="nav-item"><a class="nav-link"  href="adminHome.php">Home</a></li><p class="desapair"> -- </p>
                                <li  id="nactive" class="nav-item"><a class="nav-link"  href="profile.php">Profile</a></li><p class="desapair"> -- </p>
                                <li  id="nactive" class="nav-item"><a class="nav-link"  href="studentsView.php">Students</a></li><p class="desapair"> -- </p>
                                <li  class="nav-item"><a class="nav-link active" id="active" href="teachersView.php">Teachers</a></li><p class="desapair"> -- </p>
                                <li  id="nactive" class="nav-item"><a class="nav-link"  href="register.php">Register</a></li><p class="desapair"> -- </p>

                                </li>
                            </ul>

                            <form action="logout.php">
                                <span class="navbar-text actions">
                                    <button class="btn btn-primary action-button" role="button" type="submit" href="#">Log Out</button>
                                </span>
                            </form>
                        </div>
                    </div>
                </nav><!-- End: Navigation with Button -->
            </div><!-- End: nav-bar -->
        </div>
    </div>
</div><!-- End: 1 Row 3 Columns -->
<!-- Start: 1 Row 3 Columns -->

<br><br><br><br><br>



<div class="container">
    <div class="row">


        <div class="col-md-12">
            <table class="table table-hover" >
                <thead>
                <tr>
                    <th scope="col">Teacher ID</th>
                    <th scope="col">First name</th>
                    <th scope="col">Middle name</th>
                    <th scope="col">Last name</th>
                    <th scope="col">E-mail</th>
                    <th scope="col">birthdate</th>
                    <th scope="col"> </th>
                </tr>
                </thead>
                <tbody>
<?php
                $query = $query = 'SELECT DISTINCT teacher_id, adm_name, middle_name, last_name, email, birthdate FROM teacher order by teacher_id';
                $con = get_db();
                $result = pg_query( $con, $query);
                if (pg_num_rows($result) > 0) {
                while ($row = pg_fetch_array($result)) {
                echo "<form method='POST' action='teachersView.php?'>" ;
                    echo "<tr id='teachRowid".$row[0]."'>";
                    echo "<th scope='row'>".$row[0]."</th>";
                    echo "<td>".$row[1]."</td>";
                    echo "<td>".$row[2]."</td>";
                    echo "<td>".$row[3]."</td>";
                    echo "<td> <a href='mailto:".$row[4]."'>".$row[4]."</a></td>";
                    echo "<td>".$row[5]."</td>";
                    echo "<td> <button value='".$row[0]."'name='submit#".$row[0]."' type='submit' class='btn btn-outline-primary btn-sm'>View/Edit</button>"."</td>";
                    echo "</tr>";
                echo "</form>";
                }
                }








?>
                </tbody>
            </table>
        </div>
    </div>
</div>





<br>
<br>
<br>
<br>
<br>
<br>
<br>

<div class="footer-basic">
    <footer>
        <!-- Start: Social Icons -->
        <div class="social"><a href="#"><i class="icon ion-social-instagram"></i></a><a href="#"><i class="icon ion-social-snapchat"></i></a><a href="#"><i class="icon ion-social-twitter"></i></a><a href="#"><i class="icon ion-social-facebook"></i></a></div><!-- End: Social Icons -->
        <!-- Start: Links -->
        <ul class="list-inline">
            <li class="list-inline-item"><a href="#">Home</a></li>
            <li class="list-inline-item"><a href="#">Services</a></li>
            <li class="list-inline-item"><a href="#">About</a></li>
            <li class="list-inline-item"><a href="#">Terms</a></li>
            <li class="list-inline-item"><a href="#">Privacy Policy</a></li>
        </ul><!-- End: Links -->
        <!-- Start: Copyright -->
        <p class="copyright">Senior Project BYU-I © 2021</p><!-- End: Copyright -->
    </footer>
</div><!-- End: Footer Basic -->
<script src="/assets/js/jquery.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>
