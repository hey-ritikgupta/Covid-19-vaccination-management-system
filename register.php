<?php
$success=NULL;$message=NULL;
if(isset($_POST['submitBtn'])){
    $fname = $_POST['fname'];
    $mname = $_POST['mname'];
    $lname = $_POST['lname'];
    $sex = $_POST['sex'];
    $mail = $_POST['mail'];
    $mobile = $_POST['mobile'];
    $haddress = $_POST['haddress'];
    $city = $_POST['city'];
    $hstate = $_POST['hstate'];
    $pincode = $_POST['pincode'];
    $dob = $_POST['dob'];
    $dov = $_POST['dov'];
    $bg = $_POST['bg'];
    
    require_once 'DBConnect.php';
    $db = new DBConnect();
    $flag = $db->addreport($fname,$mname,$lname,$sex,$mail,$mobile,$haddress,$city,$hstate,$pincode,$dob,$dov,$bg);
    
    if($flag){
        $success = "The Report has been successfully added to the database!";
    } else {
        $message = "There was some error saving the user to the database!";
    }
}
$title = "Employee";
$setEmployeeActive = "active";
include 'layout/header1.php';

?>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <img class="img-fluid" src="assets/FreeVaccineLogo.png" width="80px">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">

                    <li class="nav-item">
                        <a class="nav-link active" href="details.php">Register a Person</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="details-1.php">Get Vaccination Report</a>
                    </li>
                    <li class="nav-item">
                       <a class="nav-link" href="logout.php">Log Out</a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>



    <div class="container" style="margin-top:2%;">
    <?php if(isset($success)): ?>
            <div class="alert-success fade-out-5"><?= $success; ?></div>
            <?php endif; ?>
            <?php if(isset($message)): ?>
            <div class="alert-danger fade-out-5"><?= $message; ?></div>
            <?php endif; ?>
        <h1 style="text-align:center">Register the Details</h1>
        <hr>
        <form  method="post" role="form" action="register.php">
        <div class="container details">
        <div class="row">
            <div class="col-md-4 col-12">
            <label for="fname"><b>First Name :</b></label>
            <input type="text" placeholder="Enter First Name*" name="fname" required>
            </div>
        
            <div class="col-md-4 col-12">
            <label for="mname"><b>Middle Name :</b></label>
            <input type="text" placeholder="Enter Middle Name" name="mname">
            </div>
            
            <div class="col-md-4 col-12">
            <label for="lname"><b>Last Name :</b></label>
            <input type="text" placeholder="Enter Last Name*" name="lname" required>
            </div></div>
            <br>
     
            <label for="sex"><b>Gender : </b></label>
            <input type="radio" name="sex" value="male" checked="true"> Male
            <input type="radio" name="sex" value="female"> Female
            <input type="radio" name="sex" value="other"> Other<br>
            <label for="mail"><b>Email :</b></label>
            <input type="email" placeholder="example@gmail.com" name="mail" required >
            <br>
            <label for="mobile"><b>Mobile No. : +91</b></label>
            <input type="text" placeholder="10 digit mobile no" name="mobile" required>
            <br>
            <label for="haddress"><b>Address :</b></label>
            <input type="text" placeholder="Full Address" name="haddress" required>
            <br>
            <div class="row">
            <div class="col-md-4 col-12">
            <label for="city"><b>City :</b></label>
            <input type="city" placeholder="City" name="city" required>
            </div>
            
            <div class="col-md-4 col-12">
            <label for="hstate"><b>State :</b></label>
            <input type="city" placeholder="State" name="hstate" required>
            </div>
            
            <div class="col-md-4 col-12">
            <label for="pincode"><b>Pincode :</b></label>
            <input type="number" placeholder="Pincode" name="pincode" required>
            </div></div>
            <br>
            <div class="row">
            <div class="col-md-4 col-12">
            <label for="dob"><b>Enter Date of Birth :</b></label>
            <input type="date" placeholder="mm/dd/yyyy" name="dob" required>
            </div>
            <div class="col-md-8 col-12">
            <label for="dov"><b>Enter Date of Vaccination :</b></label>
            <input type="date" placeholder="mm/dd/yyyy" name="dov" required>
            </div>
            </div>
            <label for="bg"><b>Blood Group :</b></label>
            <input type="city" placeholder="Blood Group" name="bg" required>
            
        </div>
        <div class="submit-btn">
            <button type="submit" name="submitBtn"  class="btn btn-primary">Register</button>
        </div>
        </form>
    </div>

    </div>
    </div>

    <?php
    include 'layout/footer1.php'
    ?>