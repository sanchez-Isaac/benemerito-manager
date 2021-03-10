<?php
session_start();
include_once 'DbConnect.php';



//Admin and teacher differentiation!!!
if(isset($_SESSION['username']) && $_SESSION['message'] == "You are logged in Teacher" )
{
    header('location: teacher_Home.php?Login=True');
}


//If no one is logged in, return to login page
if(!isset($_SESSION['username']))
{
    header('location: ../../index.php?Login=False');
}

//Formats the birthdate
//$orgDate = $_SESSION['birthdate'];
//$newDate = date("Y-m-d", strtotime($orgDate));
//$_SESSION['birthdate'] = $newDate;





//Testing purposes
echo '<pre>';
print_r($_SESSION);
echo '</pre>';
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
<title>Home Page</title>



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
                                <li  id="nactive" class="nav-item"><a class="nav-link"   href="adminHome.php">Home</a></li><p class="desapair"> -- </p>
                                <li  id="nactive" class="nav-item"><a class="nav-link"  href="profile.php">Profile</a></li><p class="desapair"> -- </p>
                                <li  id="nactive" class="nav-item"><a class="nav-link"  href="studentsView.php">Students</a></li><p class="desapair"> -- </p>
                                <li  id="nactive" class="nav-item"><a class="nav-link"  href="teachersView.php">Teachers</a></li><p class="desapair"> -- </p>
                                <li  class="nav-item"><a class="nav-link active" id="active"  href="register.php">Register</a></li><p class="desapair"> -- </p>

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
<div>
    <!-- Start: 1 Row 1 Column -->
    <div></div><!-- End: 1 Row 1 Column -->
    <!-- Start: 1 Row 4 Columns -->
    <div>
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-1 col-lg-1 col-xl-1 offset-sm-0"></div><!-- Start: table for admin -->
                <div class="col-sm-12 col-md-5 col-lg-5 col-xl-5">


                        <button class="btn btn-primary btn-block" id="teacherbtn" type="button">Teachers</button>
                        <br><br>
                        <button class="btn btn-primary btn-block" id="studentbtn" type="button">Students</button>
                        <br><br>
                        <button class="btn btn-primary btn-block" id="classbtn" type="button">Classes</button>
                        <br><br>

                </div><!-- End: table for admin -->

                <!-- Start: table for picture -->
                <div class="col-md-5 col-lg-5 col-xl-5">





                    <div class="topright">
                        <svg xmlns="http://www.w3.org/2000/svg" width="140" height="140"  fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"></path>
                            <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"></path>
                        </svg>
                        <br>
                        <br>
                        <h4 class="movepos"> <?php   echo $_SESSION['user_name']. " " . $_SESSION['middle_name']. " " . $_SESSION['last_name']; ?></h4>
                        <h6>Admin</h6>
                    </div>

                </div><!-- End: table for picture -->
                <div class="col-sm-12 col-md-1 col-lg-1 col-xl-1 offset-xl-0"></div>
            </div>
        </div>
    </div><!-- End: 1 Row 4 Columns -->
    <!-- Start: 1 Row 3 Columns -->
    <div></div><!-- End: 1 Row 3 Columns -->
    <!-- Start: 1 Row 3 Columns -->
    <div></div><!-- End: 1 Row 3 Columns -->
    <!-- Start: 1 Row 2 Columns -->
    <div></div><!-- End: 1 Row 2 Columns -->
</div>
</div>

</div><!-- End: 1 Row 3 Columns -->
<!-- Start: Footer Basic -->
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
