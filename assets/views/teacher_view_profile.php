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


if(isset($_SESSION['teacherID'])) {

    $query = $query = "SELECT *  FROM teacher WHERE teacher_id = " . $_SESSION['teacherID'];
    $con = get_db();
    $result = pg_query($con, $query);
    if (pg_num_rows($result) > 0) {
        while ($row = pg_fetch_array($result)) {
            $_SESSION['teach_name'] = $row[1];
            $_SESSION['teach_middle_name'] = $row[2];
            $_SESSION['teach_last_name'] = $row[3];
            $_SESSION['teach_birthdate'] = $row[4];
            $_SESSION['teach_zoom'] = $row[5];
            $_SESSION['teach_email'] = $row[6];
            $_SESSION['teach_m_phone'] = $row[8];
            $_SESSION['teach_phone'] = $row[9];
        }
    }
}



if(isset($_POST['Submitting'])) {


    $_SESSION['recipient-names'] = pg_escape_string($_POST['recipient-names']);
    $_SESSION['recipient-middles'] = pg_escape_string($_POST['recipient-middles']);
    $_SESSION['recipient-lasts'] = pg_escape_string($_POST['recipient-lasts']);
    $_SESSION['recipient-births'] = pg_escape_string($_POST['recipient-births']);
    $_SESSION['recipient-emails'] =  pg_escape_string($_POST['recipient-emails']);
    $_SESSION['recipient-tutoremail'] =  pg_escape_string($_POST['recipient-tutoremails']);
    $_SESSION['recipient-stud-phone'] =  pg_escape_string($_POST['recipient-stud-phones']);
    $_SESSION['recipient-tutorphone'] =  pg_escape_string($_POST['recipient-tutorphones']);

    header("Location: editProfileStudent.php?Approved=");

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
                    echo '<h2 class="headtitle"> Teacher Profile  </h2>';
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
                                <li id="nactive" class="nav-item"><a class="nav-link"  href="adminHome.php">Home</a></li><p class="desapair"> -- </p>
                                <li  id="nactive" class="nav-item"><a class="nav-link"  href="profile.php">Profile</a></li><p class="desapair"> -- </p>
                                <li  class="nav-item"><a class="nav-link active" id="active" href="studentsView.php">Students</a></li><p class="desapair"> -- </p>
                                <li  id="nactive" class="nav-item"><a class="nav-link"  href="teachersView.php">Teachers</a></li><p class="desapair"> -- </p>
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

<br><br><br>
<div>
    <!-- Start: 1 Row 1 Column -->
    <div></div><!-- End: 1 Row 1 Column -->
    <!-- Start: 1 Row 4 Columns -->
    <div>

        <div class="container">
            <?php
            //This will display the rigth name and position depending of the user that logged in
            // middle name will count in this excercise.
            if (isset($_SESSION['username']) && $_SESSION['message'] == "You are logged in Teacher" && $_SESSION['teach_middle_name'] != "")
            {

                echo '<h3>'.$_SESSION['teach_name']." ". $_SESSION['teach_middle_name']. " ". $_SESSION['teach_last_name']. '</h3>';
                echo '<h7>Teacher Profile</h7>';
            }
            else
                if (isset($_SESSION['username']) && $_SESSION['message'] == "You are logged in Admin" && $_SESSION['teach_middle_name'] != "")
                {
                    echo '<h3>'.$_SESSION['teach_name']." ". $_SESSION['teach_middle_name']. " ". $_SESSION['teach_last_name']. '</h3>';
                    echo '<h7>Teacher Profile</h7>';

                }
                else
                    if (isset($_SESSION['username']) && $_SESSION['message'] == "You are logged in Admin" && $_SESSION['teach_middle_name'] == "")
                    {
                        echo '<h3>'.$_SESSION['teach_name']." ". $_SESSION['teach_last_name']. '</h3>';
                        echo '<h7>Teacher Profile</h7>';

                    }
                    else
                        if (isset($_SESSION['username']) && $_SESSION['message'] == "You are logged in Teacher" && $_SESSION['teach_middle_name'] == "")
                        {
                            echo '<h3>'.$_SESSION['teach_name']." ". $_SESSION['teach_middle_name']. " ". $_SESSION['teach_last_name']. '</h3>';
                            echo '<h7>Teacher Profile</h7>';

                        }

            ?>

            <br><br><br>

            <div class="row">

                <div class="col-sm-12 col-md-1 col-lg-1 col-xl-1 offset-sm-0"></div><!-- Start: table for admin -->
                <div class="col-sm-12 col-md-5 col-lg-5 col-xl-5">
                    <table class="table">
                        <tr>
                            <td>Name:</td>
                            <td> <?php echo $_SESSION['teach_name']; ?></td>
                        </tr>
                        <tr>
                            <td>Middle name:</td>
                            <td> <?php echo $_SESSION['teach_middle_name']; ?></td>
                        </tr>
                        <tr>
                            <td>last name:</td>
                            <td> <?php echo $_SESSION['teach_last_name']; ?></td>
                        </tr>
                        <tr>
                            <td>Birthdate:</td>
                            <td> <?php echo $_SESSION['teach_birthdate']; ?></td>
                        </tr>
                        <tr>
                            <td>Teacher Email:</td>
                            <td> <?php echo $_SESSION['teach_email']; ?></td>
                        </tr>
                        <tr>
                            <td>Teacher Mobile Phone:</td>
                            <td> <?php echo $_SESSION['teach_m_phone']; ?></td>
                        </tr>
                        <tr>
                            <td>Teacher Home Phone:</td>
                            <td> <?php echo $_SESSION['teach_phone']; ?></td>
                        </tr>
                    </table>
                    <br>
                    <hr style="border-top: 1px solid #000000">

                    <button type="button" class="btn btn-primary"   data-toggle="modal" data-target="#sqlModal" id="editprofile" style="float: right">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-square" viewBox="0 0 16 16">
                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"></path>
                            <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm12 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1v-1c0-1-1-4-6-4s-6 3-6 4v1a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12z"></path>
                        </svg>
                        Edit Profile
                    </button>


                    <button type="button" class="btn btn-success" onclick="goBack()" id="goback" >
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left-circle" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-4.5-.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z">
                            </path>
                        </svg>
                        Go back
                    </button>


                </div><!-- End: table for admin -->




                <!-- Start: table for picture -->
                <div class="col-md-5 col-lg-5 col-xl-5">

                    <div class="topright">
                        <svg xmlns="http://www.w3.org/2000/svg" width="250" height="250" fill="currentColor" class="bi bi-person-square" viewBox="0 0 16 16">
                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                            <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm12 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1v-1c0-1-1-4-6-4s-6 3-6 4v1a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12z"/>
                        </svg>
                        <br>
                        <br>
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



<form  method="post" action="student_view_profile.php?">
    <div class="modal fade" id="sqlModal" tabindex="-1" role="dialog" aria-labelledby="sqlModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="sqlModalLabel">Edit Profile</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <form>
                        <div class="form-group">

                            <label for="recipient-name" class="col-form-label" >Name:</label>
                            <input type="text" class="form-control" id="recipient-name" disabled="disabled" name="recipient-names"value="<?php echo $_SESSION['student_name']; ?>">
                            <!-- Checkbox to send to PSQL -->
                            <input class="form-check-input-modal" type="checkbox"  id="flexCheckUser_name" name="recipient-name" onclick="disableMyTextName(this.name,this.id)">
                            <label class="form-check-label-modal" for="flexCheckUser_name" onclick="disableMyTextName()">Make Changes</label>

                        </div>
                        <div class="form-group">
                            <label for="recipient-middle" class="col-form-label">Middle Name:</label>
                            <input type="text" class="form-control" id="recipient-middle" disabled="disabled" name="recipient-middles"value="<?php echo $_SESSION['stu_middle_name']; ?>">
                            <!-- Checkbox to send to PSQL -->
                            <input class="form-check-input-modal" type="checkbox"  id="flexCheckMiddle_name" name="recipient-middle" onclick="disableMyTextName(this.name,this.id)">
                            <label class="form-check-label-modal" for="flexCheckMiddle_name" onclick="disableMyTextName()">Make Changes</label>
                            </label>
                        </div>
                        <div class="form-group">
                            <label for="recipient-last" class="col-form-label">Last Name:</label>
                            <input type="text" class="form-control" id="recipient-last" disabled="disabled" name="recipient-lasts"value="<?php echo $_SESSION['stud_last_name']; ?>">
                            <!-- Checkbox to send to PSQL -->
                            <input class="form-check-input-modal" type="checkbox"  id="flexChecktlast_name" name="recipient-last" onclick="disableMyTextName(this.name,this.id)">
                            <label class="form-check-label-modal" for="flexChecktlast_name" onclick="disableMyTextName()">Make Changes</label>
                        </div>
                        <div class="form-group">
                            <label for="recipient-birth" class="col-form-label">Birthdate:</label>
                            <input type="date" class="form-control" id="recipient-birth" disabled="disabled" name="recipient-births" value="<?php echo $_SESSION['stud_birthdate']; ?>">
                            <!-- Checkbox to send to PSQL -->
                            <input class="form-check-input-modal" type="checkbox"  id="flexCheckBirthdate" name="recipient-birth" onclick="disableMyTextName(this.name,this.id)">
                            <label class="form-check-label-modal" for="flexCheckBirthdate" onclick="disableMyTextName()">Make Changes</label>
                        </div>
                        <div class="form-group">
                            <label for="recipient-email" class="col-form-label">Email:</label>
                            <input type="email" class="form-control" id="recipient-email" disabled="disabled" name="recipient-emails" value="<?php echo $_SESSION['stud_email']; ?>">
                            <!-- Checkbox to send to PSQL -->
                            <input class="form-check-input-modal" type="checkbox"  id="flexCheckEmail" name="recipient-email" onclick="disableMyTextName(this.name,this.id)">
                            <label class="form-check-label-modal" for="flexCheckEmail" onclick="disableMyTextName()">Make Changes</label>
                        </div>
                        <div class="form-group">
                            <label for="recipient-tutoremail" class="col-form-label">Tutor Email:</label>
                            <input type="email" class="form-control" id="recipient-tutoremail" disabled="disabled" name="recipient-tutoremails" value="<?php echo $_SESSION['stud_tutoremail']; ?>">
                            <!-- Checkbox to send to PSQL -->
                            <input class="form-check-input-modal" type="checkbox"  id="flexChecktutoremail" name="recipient-tutoremail" onclick="disableMyTextName(this.name,this.id)">
                            <label class="form-check-label-modal" for="flexChecktutoremail" onclick="disableMyTextName()">Make Changes</label>
                        </div>
                        <div class="form-group">
                            <label for="recipient-stud-phone" class="col-form-label">Student Phone:</label>
                            <input type="tel" class="form-control" id="recipient-stud-phone" disabled="disabled" name="recipient-stud-phones" value="<?php echo $_SESSION['stud_phone']; ?>">
                            <!-- Checkbox to send to PSQL -->
                            <input class="form-check-input-modal" type="checkbox"  id="flexCheckstud-phone" name="recipient-stud-phone" onclick="disableMyTextName(this.name,this.id)">
                            <label class="form-check-label-modal" for="flexCheckstud-phone" onclick="disableMyTextName()">Make Changes</label>
                        </div>

                        <div class="form-group">
                            <label for="recipient-tutorphone" class="col-form-label">Tutor Phone:</label>
                            <input type="tel" class="form-control" id="recipient-tutorphone" disabled="disabled" name="recipient-tutorphones" value="<?php echo $_SESSION['stud_tutor_phone']; ?>">
                            <!-- Checkbox to send to PSQL -->
                            <input class="form-check-input-modal" type="checkbox"  id="flexChecktutorphone" name="recipient-tutorphone" onclick="disableMyTextName(this.name,this.id)">
                            <label class="form-check-label-modal" for="flexChecktutorphone" onclick="disableMyTextName()">Make Changes</label>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" value="Submitting" name="Submitting" class="btn btn-primary" id="Save_edit">Save Changes</button>
                </div>
            </div>
        </div>
    </div>
</form>





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

