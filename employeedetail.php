<?php
require_once 'DBConnect.php';
$db = new DBConnect();
$users = $db->getEmployees();
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
                        <a class="nav-link" href="employee.php">Employee Registration</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="employeedetail.php">Employee Details</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Log Out</a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>

    <div class="container" style="height:100%;">
    <div class="container" style="margin-top:5%;">
        <h1 style="text-align:center">Employee Details</h1>
        <hr>

    </div>
    <div class="container">
    <div class="row">
        
        <div class="col-md-12" style="overflow-x:auto;">
            
            <table class="table table-condensed">
                <thead>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                
                <th>Gender</th>
                <th>Mobile</th>
                <th>Address</th>
                <th>City</th>
                <th>State</th>
                <th>Pincode</th>
              
                </thead>
                <?php foreach($users as $u): ?>
                <tr>
                <td>COE<?= $u['ID']; ?></td>
                    <td><?= $u['fname']." ".$u['mname']." ".$u['lname']; ?></td>
                    <td><?= $u['email']; ?></td>
                    
                    <td><?= $u['sex']; ?></td>
                    <td><?= $u['mobile']; ?></td>
                    <td><?= wordwrap($u['haddress'], 26, '<br>'); ?></td>
                    <td><?= $u['city']; ?></td>
                    <td><?= $u['hstate']; ?></td>
                    <td><?= $u['pincode']; ?></td>
                    
                </tr>
                <?php endforeach; ?>
            </table>
           
        </div>
       
    </div>
</div>
    </div>

    <?php
include 'layout/footer3.php'
?>