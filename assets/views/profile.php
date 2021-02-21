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

                <h2 class="headtitle"> Profile Admin </h2>

            </div><!-- End: profesor- admin-name -->
            <!-- Start: nav-bar -->
            <div class="col-md-12 col-xl-12">
                <!-- Start: Navigation with Button -->
                <nav class="navbar navbar-light navbar-expand-md navigation-clean-button">
                    <div class="container"><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button><a class="navbar-brand" href="#"></a>
                        <div class="collapse navbar-collapse" id="navcol-1">
                            <ul class="nav navbar-nav mr-auto" >
                                <li  id="nactive" class="nav-item"><a class="nav-link" href="adminHome.php">Home</a></li><p class="desapair"> -- </p>
                                <li  id="nactive" class="nav-item"><a class="nav-link active"  id="active" href="profile.php">Profile</a></li><p class="desapair"> -- </p>
                                <li  id="nactive" class="nav-item"><a class="nav-link"  href="#">Students</a></li><p class="desapair"> -- </p>
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
<!-- Start: 1 Row 1 Column -->
<div></div><!-- End: 1 Row 1 Column -->
<!-- Start: 2 Rows 1+3 Columns -->
<div>
    <div class="container">
        <div class="row">
            <!-- Start: Teacher/admin name -->
            <div class="col-sm-6 col-md-12">
                <table class="table">
                    <tr>
                        <td>Name:</td>
                        <td> <?php echo $_SESSION['user_name']; ?></td>
                    </tr>
                    <tr>
                        <td>Middle name:</td>
                        <td> <?php echo $_SESSION['middle_name']; ?></td>
                    </tr>
                    <tr>
                        <td>last name:</td>
                        <td> <?php echo $_SESSION['last_name']; ?></td>
                    </tr>
                    <tr>
                        <td>Birthdate:</td>
                        <td> <?php echo $_SESSION['birthdate']; ?></td>
                    </tr>
                    <tr>
                        <td>Email:</td>
                        <td> <?php echo $_SESSION['email']; ?></td>
                    </tr>
                    <tr>
                        <td>Zoom Office:</td>
                        <td> <?php echo $_SESSION['zoomoffice']; ?></td>
                    </tr>
                </table>



            </div><!-- End: Teacher/admin name -->
        </div>
        <div class="row">
            <!-- Start: query data with button edit -->
            <div class="col-md-6 col-lg-6 col-xl-5"></div><!-- End: query data with button edit -->
            <!-- Start: empty -->
            <div class="col-sm-12 col-md-1 col-lg-1 col-xl-2"></div><!-- End: empty -->
            <!-- Start: image teacher/admin -->
            <div class="col-sm-12 col-md-5 col-lg-5 col-xl-5">


                <table class="table">
                    <tr>
                        <td>Name:</td>
                        <td>test</td>
                    </tr>
                    <tr>
                        <td>Middle name:</td>
                        <td>test</td>
                    </tr>
                    <tr>
                        <td>last name:</td>
                        <td>test</td>
                    </tr>
                    <tr>
                        <td>Birthdate:</td>
                        <td>test</td>
                    </tr>
                    <tr>
                        <td>Email:</td>
                        <td>test</td>
                    </tr>
                    <tr>
                        <td>Zoom Office:</td>
                        <td>test</td>
                    </tr>
                </table>

            </div><!-- End: image teacher/admin -->
        </div>
    </div>
</div><!-- End: 2 Rows 1+3 Columns -->












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
<script src="assets/js/jquery.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>
