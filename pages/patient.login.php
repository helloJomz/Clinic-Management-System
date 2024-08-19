<?php   
   session_start();

   if(isset($_SESSION['verify_login_patient'])){

     header('location: patient_dashboard.php');
     
   }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Login | WEBNIC</title>
    
    <link rel="stylesheet" href="../assets/bootstrap-css/bootstrap.css">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;300;400;600;700;800;900&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"/>

    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" 
    crossorigin="anonymous"> </script>

    <script src="../assets/js/sweetalert.js"></script>

</head>
<body>

<style>

body{
    font-family: 'Nunito', sans-serif;
    overflow-x: hidden;
    background-color: #e2ebfc;
}
    
.header-nav{
    background-color: #4e73df;
    animation-name: nav;
    animation-duration: 2s;
 
}

@keyframes nav{
    0%{
        opacity: 0;
    }

    20%{
        opacity: 0.2;
    }

    40%{
        opacity: 0.5;
    }

    60%{
        opacity: 0.7;
    }

    80%{
        opacity: 0.9;
    }

    100%{
        opacity: 1;
    }
    
}

.scrolled{
    background-color: #4e73df !important;
    transition: 0.8s;
    box-shadow: 0px 0px 3px 0px #000000;
}

.nav-follow{
    position: -webkit-sticky; /* Safari */
    position: fixed;
    top: 0;
    z-index: 1;
}

.header-nav div a{
    color: #fff;
    font-weight: 600;
}

.header-nav .logo a{
    font-size: 20px;
}

.header-nav div a{
    letter-spacing: 1px;
}

.main-card{
    background-color: #fff;
}


.footer{
    background-color: #4e73df;
    color: #fff;
}

.footer .row .col-md-4:nth-child(1){
    border-right: solid 1px #fff;
}
.footer .row .col-md-3{
    border-right: solid 1px #fff;
}

.footer .social-media span{
    cursor: pointer;
}

.footer .social-media span:hover{
    color: yellow;
}

.main-container{
    width: 600px;
}


@media screen and (max-width: 440px){

.header-nav .logo a{
    font-size: 20px;
}

.header-nav .right-menu a{
    font-size: 15px;
}

}

@media screen and (max-width: 394px){

.header-nav{
    padding: 0;
    margin: 0;
}

.header-nav .logo a{
    font-size: 15px;
}

.header-nav .right-menu a{
    font-size: 10px;
}

.header-nav .right-menu button{
    font-size: 10px;
}

}


@media screen and (max-width: 767px){


    .footer .row .col-md-4:nth-child(1) {
        border: none;
        text-align: center;
    }

    .footer .row .col-md-3{
        border: none;
        margin-bottom: 10px;
        text-align: center;
    }
    .footer .social-media{
        justify-content: center;
    }

    .intouch h5{
        text-align: center;
    }

    .intouch div {
        font-size: 12px;
        justify-content: center;
    }

}

@media screen and (max-width: 445px){

    .alert{
        font-size: 12px;
    }
}

@media screen and (max-width: 575px){
    .main-container{
        width: 450px;
    }
}

@media screen and (max-width: 484px){

    .main-container{
        width: 400px;
    }

}


@media screen and (max-width: 432px){

    .main-container{
        width: 350px;
    }
}

@media screen and (max-width: 384px){

    .main-container{
        width: 320px;
    }
}

@media screen and (max-width: 350px){

    .main-container{
        width: 300px;
    }
}


</style>

<div class="alert alert-warning text-center m-0" role="alert">
  Good Day! For Patient Account, please use this account to login: for email use <strong>patient@gmail.com</strong>, for password use <strong>patient</strong>, and for patient type select <strong>Student</strong>. Both email and password are all in lowercase.
</div>

<div class="header-nav d-flex justify-content-between w-100 ps-3 pe-3 pt-3 pb-3">
    <div class="logo">
        <a href="../" class="text-decoration-none ">Webnic</a>
    </div>

    <div class="right-menu">
        <a href="team.php" class="text-decoration-none me-3">THE TEAM</a>
        <a href="#" class="text-decoration-none ">CONTACT US</a>
    </div>
</div>

<form action="../includes/patient_control/patientlogin.inc.php" method="POST">

<div class="container main-container mb-5 pb-4 ps-2 pe-2">

    <div class="main-card w-100 rounded shadow-sm p-4 mt-5 mx-auto">
        <div class="border-bottom mb-4">
            <h5><strong>PATIENT LOGIN</strong></h5> 
        </div>
        <div class="form-group">
            <label for="labelEmail" class="form-label text-muted">Email address</label>
            <input type="text" id="labelEmail" class="form-control" placeholder="Enter Email" name="email"> 
        </div>

        <div class="form-group mt-3">
            <label for="labelPassword" class="form-label text-muted">Password</label>
            <input type="password" id="labelPassword" class="form-control" placeholder="Enter Password" name="password"> 
        </div>

        <div class="form-group mt-3">
            <label for="labelMode" class="form-label text-muted">Patient Type</label>
            <select name="patientmode" class="form-control" id="labelMode">
                <option>Student</option>
                <option>Faculty</option>
                <option>Itech Personnel</option>
          </select>
        </div>

        <div class="mt-3">
            <p>By using this service, you understood and agree to the <span class="text-primary">Terms of Use and Privacy Statement</span>.</p>
        </div>

        <div class="mt-3 text-center">
            <button class="btn bg-primary text-white w-50" type="submit" name="login">SUBMIT</button>
        </div>
    </div>
</div>

</form>

<div class="footer ps-4 pt-5 pe-4 pb-2 ">
    <div class="container ">
        <div class="row d-flex justify-content-center">
            <div class="ms-2 col-md-4  mt-2">
                <h5>PUP Institute of Technology</h5>
                <p>379 Pureza St., NDC Compound,
                Sta. Mesa, Manila</p>
            </div>

            <div class="col-md-3  ms-2 mt-2">
                <h5 class="">Follow us on our Social Media</h5>
                <div class="d-flex social-media">
                    <span><i class="fab fa-facebook me-3 fs-4"></i></span>
                    <span><i class="fab fa-twitter me-3 fs-4"></i></i></span>
                    <span><i class="fas fa-envelope fs-4"></i></span>
                </div>
            </div>
            
            <div class="col-md-4 ms-2 mt-2 intouch">
                <h5>Get in touch with us!</h5>
                <div class="d-flex"> 
                    <span><i class="fas fa-phone-square"></i> 09999999999</span>
                    <span class="ms-2"><i class="fas fa-envelope "></i> webnic@gmail.com</span>
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-center mt-5">
            <a href="#" class="text-decoration-none text-white me-4 border-end pe-3">Credit Page</a>
            <a href="#" class="text-decoration-none text-white me-4 border-end pe-3">About Us</a>
            <a href="#" class="text-decoration-none text-white">FAQs</a>
        </div>

        <div class="text-center mt-2">
            <p>Copyright © 2021, WEBNIC All rights reserved</p>
        </div>
    </div>
</div>

<?php 

if(isset($_GET['error'])){
    if($_GET["error"] == "emptyfields" ){
        ?>
           <script> swal("ERROR", "Please fill all the fields and try again!", "error"); </script>
        <?php

    }

    if($_GET["error"] == "nouser" ){
        ?>
            <script> swal("ERROR", "No user found, please try again!", "error"); </script>
        <?php
    }
}

?>

</body>
</html>