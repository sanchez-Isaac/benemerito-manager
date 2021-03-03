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
                                <li id="nactive" class="nav-item"><a class="nav-link"  href="adminHome.php">Home</a></li><p class="desapair"> -- </p>
                                <li  id="nactive" class="nav-item"><a class="nav-link"  href="profile.php">Profile</a></li><p class="desapair"> -- </p>
                                <li  class="nav-item"><a class="nav-link active" id="active" href="studentsView.php">Students</a></li><p class="desapair"> -- </p>
                                <li  id="nactive" class="nav-item"><a class="nav-link"  href="#">Teachers</a></li><p class="desapair"> -- </p>
                                <li  id="nactive" class="nav-item"><a class="nav-link"  href="#">Register</a></li><p class="desapair"> -- </p>

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
                    <th scope="col">Student ID</th>
                    <th scope="col">First name</th>
                    <th scope="col">Middle name</th>
                    <th scope="col">Last name</th>
                    <th scope="col">E-mail</th>
                    <th scope="col">Tutor Email</th>
                    <th scope="col"> </th>
                </tr>
                </thead>
                <tbody>
<?php
                $query = $query = 'SELECT DISTINCT student_id, stu_name, middle_name, last_name, email, tutor_email FROM student order by student_id';
                $con = get_db();
                $result = pg_query( $con, $query);
                if (pg_num_rows($result) > 0) {
                while ($row = pg_fetch_array($result)) {
                echo "<form method='post' >" ;
                    echo "<tr id='stuRowid".$row[0]."'>";
                    echo "<th scope='row'>". $row[0]."</th>";
                    echo "<th style='font-weight: normal'>". $row[1]."</th>";
                    echo "<th style='font-weight: normal'>". $row[2]."</th>";
                    echo "<th style='font-weight: normal'>". $row[3]."</th>";
                    echo "<th style='font-weight: normal'>". $row[4]."</th>";
                    echo "<th style='font-weight: normal'>". $row[5]."</th>";
                    echo "<th> <button name='submit#" .$row[0]."' type='submit' class='btn btn-outline-primary btn-sm'>View/Edit</button>"."</th>";
                    echo "</tr>";
                echo "</form>";
                }
                }


$result = pg_query( $con, $query);
if (pg_num_rows($result) > 0) {
while ($row = pg_fetch_array($result)) {
    if (isset($_POST['submit#' + $row[0]])) {
        $_SESSION['studentID'] = $_POST['action' + $row[0]];
        header('location: student_view_profile.php');
    }
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
