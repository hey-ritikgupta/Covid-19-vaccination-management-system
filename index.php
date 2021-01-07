<?php

// Include config file
require_once "DBConnect.php";
include 'login.php';
include 'layout/header1.php';  
?>

    <!--###### BACKGROUND VIDEO#######-->
    <video id="videoBG" poster="poster.png" autoplay muted loop>
    <source src="background-video.mp4" type="video/mp4">
</video>
    <!--###### BACKGROUND VIDEO#######-->

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <img class="img-fluid" src="assets/FreeVaccineLogo.png" width="80px">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="details.php">Get Vaccination Report</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="" data-bs-toggle="modal" data-bs-target="#employeemodel">Employee Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="" data-bs-toggle="modal" data-bs-target="#exampleModal">Admin Login</a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>

    <div class="card-1" >
        <div class="card-body">
            <h1 class="card-title">Welcome to<br> Covid-19 Vaccination Management System</h1>
            <h4 class="card-text">One Stop to manage the Vaccination Data</h4>
         
            
            <a href="details.php" class="btn btn-primary" style="margin-bottom:3%">Get Vaccination Report</a>
        
         
            <a href="details.php" class="btn btn-primary" style="margin-bottom:3%" data-bs-toggle="modal" data-bs-target="#testModel">Get credentials for Testing</a>
          
        </div>
    </div>
   <!-- Modal -->
<div class="modal fade" id="testModel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">For Testing Purpose</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <h5>Admin Login</h5>
    <p><b>Username :</b>admin<br>
    <b>Password :</b>password</p>
    <h5>Employee Login</h5>
    <p><b>Username :</b>employee<br>
    <b>Password :</b>password</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
       
      </div>
    </div>
  </div>
</div>

<?php include 'loginmodel.php'?>

   


    <?php
include 'layout/footer3.php'
?>