<?php
session_start();
include_once '../dbConnect/DbConnect.php';



//If no one is logged in, return to login page
//if(!isset($_SESSION['username']))
//{
//    header('location: ../../index.php?Login=False');
//}

//Testing purposes
echo '<pre>';
print_r($_SESSION);
echo '</pre>';

















if(isset($_POST['Submitting'])) {


    $_SESSION['add-teach-names'] = pg_escape_string($_POST['add-recipient-names']);
    $_SESSION['add-teach-middles'] = pg_escape_string($_POST['add-recipient-middles']);
    $_SESSION['add-teach-lasts'] = pg_escape_string($_POST['add-recipient-lasts']);
    $_SESSION['add-teach-births'] = pg_escape_string($_POST['add-recipient-births']);
    $_SESSION['add-teach-emails'] =  pg_escape_string($_POST['add-recipient-emails']);
    $_SESSION['add-teach-zooms'] = pg_escape_string($_POST['add-recipient-zooms']);
    $_SESSION['add-teach-mobiles'] = pg_escape_string($_POST['add-recipient-mobiles']);
    $_SESSION['add-teach-tel'] = pg_escape_string($_POST['add-recipient-tels']);
    $_SESSION['add-teach-pass'] = pg_escape_string($_POST['add-recipient-passs']);

    header("Location: uniqueEmailCheck.php");

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




    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="assets/css/styles.min.css">
    <link rel="stylesheet" href="assets/css/register-style.css">

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

<br><br>




<div class="container">
    <div class="row">
        <!-- Start: registration Title-->
        <div class="col-md-12">
            <h3>Registration</h3>

            <a style="text-align: left;padding: 0.375rem 2.75rem; width: 25%;"class="btn btn-primary btn-block" role="button" data-bs-toggle="button">Teachers</a>

            <br><br>
        </div>
        <!-- End: registration Title-->
    </div>
</div>


<form method="post" action="teacher-reg.php?">
    <div class="container">
        <div class="row">
            <!-- Start: registration Form-->
            <div class="col-11 col-sm-11 col-md-6">

                <table style="width:100%">
                    <tr>
                        <td><label for="inputName" class="form-labels">First Name:</label></td>
                        <td><input type="text" name="add-recipient-names" class="form-control" id="inputName" value="<?php if(isset($_SESSION['add-teach-names']))echo $_SESSION['add-teach-names']; ?>" required></td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td><label for="inputMiddle" class="form-labels">Middle Name:</label></td>
                        <td><input type="text" class="form-control" name="add-recipient-middles" id="inputMiddle" value="<?php if(isset($_SESSION['add-teach-middles']))echo $_SESSION['add-teach-middles']; ?>"></td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                    </tr>

                    <tr>
                        <td><label for="inputLast" class="form-labels">Last Name:</label></td>
                        <td><input type="text" class="form-control" name="add-recipient-lasts" id="inputLast" required value="<?php if(isset($_SESSION['add-teach-lasts']))echo $_SESSION['add-teach-lasts']; ?>"></td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td><label for="inputBirth" class="form-labels">Birthdate:</label></td>
                        <td> <input type="date" class="form-control" name="add-recipient-births" id="inputBirth" required value="<?php if(isset($_SESSION['add-teach-births']))echo $_SESSION['add-teach-births']; ?>"></td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td> <label for="inputEmail" class="form-labels">Email:</label></td>
                        <td> <input type="email" class="form-control" name="add-recipient-emails" id="inputEmail" aria-describedby="emailHelp" placeholder="you@example.com" required value="<?php if(isset($_SESSION['add-teach-emails']))echo $_SESSION['add-teach-emails']; ?>">  </td>

                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td><label for="inputZoom" class="form-labels">Zoom:</label></td>
                        <td><input type="url" class="form-control" name="add-recipient-zooms" id="inputZoom" value="<?php echo $_SESSION['add-teach-zooms']; ?>"></td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td><label for="inputMPhone" class="form-labels">Mobile:</label></td>
                        <td><input type="tel" class="form-control" name="add-recipient-mobiles" id="inputMPhone" required value="<?php if(isset($_SESSION['add-teach-mobiles'])) echo $_SESSION['add-teach-mobiles']; ?>"></td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td><label for="inputPhone" class="form-labels">Telephone:</label></td>
                        <td><input type="tel" class="form-control" name="add-recipient-tels" id="inputPhone" value="<?php if(isset($_SESSION['add-teach-tel']))echo $_SESSION['add-teach-tel']; ?>"></td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td><label for="inputPass" class="form-labels">Password:</label></td>
                        <td><input size="16" type="password" name="add-recipient-passs" class="form-control" id="inputPass" placeholder="*******" pattern=".{5,80}" required title="Minimum 5 characters" ></td>
                    </tr>
                </table>

            </div><!-- End: registration Form-->

            <!-- Start: Icon Image-->
            <div class="col-1 col-sm-1 col-md-6">

                <div class="topright">
                    <svg xmlns="http://www.w3.org/2000/svg" width="260" height="260" fill="currentColor" class="bi bi-person-plus" viewBox="0 0 16 16">
                        <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H1s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C9.516 10.68 8.289 10 6 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
                        <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z"/></svg>
                        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"></path>
                        <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"></path>
                    </svg>
                </div>

            </div><!-- End: Icon Image-->
        </div>
    </div>
    <div class="container">
        <div class="row">
            <!-- Start: cancel and Save btn-->
            <div class="col-md-12 btndiv">
                <button type="submit" value="Submitting" name="Submitting" class="btn btn-success" id="addbtn">Add</button>
                <button type="button" class="btn btn-danger"id="cancelbtn">Cancel</button>

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


<script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="../bootstrap/js/bootstrap.min.js"></script>
<script src="../js/checkUniqueEmail.js"></script>

</body>

</html>
