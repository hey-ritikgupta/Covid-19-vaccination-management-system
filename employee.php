<?php
$success=NULL;$message=NULL;
if(isset($_POST['submitBtn'])){
    $uname = $_POST['uname'];
    $psw = $_POST['psw'];
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
    
    require_once 'DBConnect.php';
    $db = new DBConnect();
    $flag = $db->addEmployee($uname,$psw,$fname,$mname,$lname,$sex,$mail,$mobile,$haddress,$city,$hstate,$pincode);
    
    if($flag){
        $success = "The Employee has been successfully added to the database!";
    } else {
        $message = "There was some error saving the user to the database!";
    }
}
$title = "Employee";
$setEmployeeActive = "active";
include 'layout/header1.php'
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
                        <a class="nav-link active" href="employee.php">Employee Registration</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="employeedetail.php">Employee Details</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Log Out</a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>

    <div class="container" style="margin-top:2%;">
        <h1 style="text-align:center">Employee Registration</h1>
        <hr>
        <?php if(isset($success)): ?>
            <div class="alert-success fade-out-5"><?= $success; ?></div>
            <?php endif; ?>
            <?php if(isset($message)): ?>
            <div class="alert-danger fade-out-5"><?= $message; ?></div>
            <?php endif; ?>
            <form method="post" role="form" action="employee.php">
        <div class="container details">
            <div class="row">
                <div class="col-lg-6 col-sm-12">
                    <label for="uname"><b>Username :</b></label>
                    <input type="text" placeholder="Enter username*" name="uname" required>
                </div>
                <div class="col-lg-6 col-sm-12">
                    <label for="psw"><b>Password:</b></label>
                    <input type="password" placeholder="password" name="psw" required style="width: auto;">
                </div>
            </div>
            <hr>
           
            <div class="row">
            <div class="col-md-4 col-12">
            <label for="fname"><b>First Name :</b></label>
            <input type="text" placeholder="Enter First Name*" name="fname" required>
            </div> <div class="col-md-4 col-12">
            <label for="mname"><b>Middle Name :</b></label>
            <input type="text" placeholder="Enter Middle Name" name="mname">
            </div> <div class="col-md-4 col-12">
            <label for="lname"><b>Last Name :</b></label>
            <input type="text" placeholder="Enter Last Name*" name="lname" required>
            </div>
            </div>
            <br>
            <label for="sex"><b>Gender : </b></label>
            <input type="radio" name="sex" value="male" checked="true"> Male
            <input type="radio" name="sex" value="female"> Female
            <input type="radio" name="sex" value="other"> Other<br>
            <label for="mail"><b>Email :</b></label>
            <input type="text" placeholder="example@gmail.com" name="mail" required >
            <br>
            <label for="mobile"><b>Mobile No. : +91</b></label>
            <input type="text" placeholder="10 digit mobile no" name="mobile" required>
            <br>
            <label for="haddress"><b>Address :</b></label>
            <input type="text" placeholder="Full Address" name="haddress" required style="width: 80%;">
            <br>
            <div class="row">
            <div class="col-md-4 col-12">
            <label for="city"><b>City :</b></label>
            <input type="text" placeholder="City" name="city" required>
            </div> <div class="col-md-4 col-12">
            <label for="hstate"><b>State :</b></label>
            <input type="text" placeholder="State" name="hstate" required>
            </div> <div class="col-md-4 col-12">
            <label for="pincode"><b>Pincode :</b></label>
            <input type="number" placeholder="Pincode" name="pincode" required>
            </div></div>
            <br>

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