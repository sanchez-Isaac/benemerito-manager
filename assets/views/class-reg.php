<?php
session_start();
include_once 'DbConnect.php';



//If no one is logged in, return to login page
if(!isset($_SESSION['username']))
{
    header('location: ../../index.php?Login=False');
}

//Testing purposes
echo '<pre>';
print_r($_SESSION);
echo '</pre>';




if(isset($_POST['Submitting'])) {


    $_SESSION['recipient-names'] = pg_escape_string($_POST['recipient-names']);
    $_SESSION['recipient-middles'] = pg_escape_string($_POST['recipient-middles']);
    $_SESSION['recipient-lasts'] = pg_escape_string($_POST['recipient-lasts']);
    $_SESSION['recipient-births'] = pg_escape_string($_POST['recipient-births']);
    $_SESSION['recipient-emails'] =  pg_escape_string($_POST['recipient-emails']);
    $_SESSION['recipient-zooms'] = pg_escape_string($_POST['recipient-zooms']);

    header("Location: editProfile.php?Approved=");

}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">


    <?php
    if(isset($_SESSION['username']) && $_SESSION['message'] == "You are logged in Teacher" )
    {
        echo '<title>Teacher - Benemerito</title>';
    }
    else if (isset($_SESSION['username']) && $_SESSION['message'] == "You are logged in Admin" )
    {
        echo '<title>Admin - Benemerito</title>';
    }
    ?>

    <script  src="/assets/js/jquery.min.js"></script>


    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="assets/css/styles.min.css">


</head>

<body>
<title>Profile Page</title>



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


                <?php
                if(isset($_SESSION['username']) && $_SESSION['message'] == "You are logged in Teacher" )
                {
                    echo '<h2 class="headtitle"> Teacher Profile  </h2>';
                }
                else if (isset($_SESSION['username']) && $_SESSION['message'] == "You are logged in Admin" )
                {
                    echo '<h2 class="headtitle"> Admin Profile  </h2>';
                }
                ?>

            </div><!-- End: profesor- admin-name -->
            <!-- Start: nav-bar -->
            <div class="col-md-12 col-xl-12">
                <!-- Start: Navigation with Button -->
                <nav class="navbar navbar-light navbar-expand-md navigation-clean-button">
                    <div class="container"><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button><a class="navbar-brand" href="#"></a>
                        <div class="collapse navbar-collapse" id="navcol-1">
                            <ul class="nav navbar-nav mr-auto" >
                                <li id="nactive" class="nav-item"><a class="nav-link" href="adminHome.php">Home</a></li><p class="desapair"> -- </p>
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

<br><br><br>




<div class="container">
    <div class="row">
        <!-- Start: registration Title-->
        <div class="col-md-12">
            <h3>Registration</h3>

            <a style="text-align: left;padding: 0.375rem 2.75rem; width: 25%;"class="btn btn-primary btn-block" role="button" data-bs-toggle="button">Classes</a>


        </div>
        <!-- End: registration Title-->
    </div>
</div>


<form>
    <div class="container">
        <div class="row">
            <!-- Start: registration Form-->
            <div class="col-11 col-sm-11 col-md-6">

            </div><!-- End: registration Form-->

            <!-- Start: Icon Image-->
            <div class="col-1 col-sm-1 col-md-6">

            </div><!-- End: Icon Image-->
        </div>
    </div>
    <div class="container">
        <div class="row">
            <!-- Start: cancel and Save btn-->
            <div class="col-md-12">

            </div><!-- end: cancel and Save btn-->
</form>



    </div>
</div>














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
<script src="/assets/bootstrap/js/bootstrap.min.js"></script>
<script src="/assets/js/editProfile.js"></script>
</body>

</html>
