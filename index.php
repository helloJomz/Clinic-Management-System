<?php   
   session_start();
   if(isset($_SESSION['status'])){
        session_unset();
        session_destroy();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="assets/css/landingpage.css?<?php echo time();?>">
    <link rel="stylesheet" href="assets/bootstrap-css/bootstrap.css">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;300;400;600;700;800;900&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"/>

    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" 
    crossorigin="anonymous"> </script>

    <title>Home | WEBNIC</title>
</head>
<body>

<div class="header-nav d-flex justify-content-between pt-3 pb-3 ps-5 pe-5 w-100 nav-follow ">
    <div class="logo">
        <a href="#" class="text-decoration-none ">Webnic</a>
    </div>

    <div class="right-menu">
        <a href="pages/team.php" class="text-decoration-none ">THE TEAM</a>
        <button class="ms-3 login-btn" id="toggleLogin" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">LOGIN</button>
    </div>
</div>



<div class="main-hero w-100 overflow-hidden">
    <div class="bgimage "> </div>

    <div class="hero-caption" >
        <small>MAKE IT EASY</small>
        <h1>Clinical Administering System with <br> QR Code Based Queuing</h1>
    </div>
</div>

<div class="mt-5 ">
    <div class="about-title ">
        <p class="fs-1 ">ABOUT WEBNIC</p>
    </div>

    <div class="contents container mx-auto mt-5 pb-5 border-bottom">
        <div class="row ">
            <div class="col-md-8">
                <h3>Organize Files and Profiles of Patients</h3>
                <p>
                Webnic is a management system that allows the clinical personnel to organize, view, update and edit the patient’s various records including personal and medical information. Patients can also access their personal and medical information by viewing their profile in their registered account.
                Records that are edited or updated by a person that  manages the system can immediately be viewed in both accounts of the personnel and the patient. All data that is viewed inside the system is categorized according to their course, department, type of user, or by the letter of their first or last name.
                </p>
            </div>
            <div class="col-md-4">
                <img src="assets/bg/organize.jpg" class="img-fluid" alt="" >
            </div>
        </div>
    </div>

    <div class="contents container mx-auto mt-5 pb-5 border-bottom">
        <div class="row ">
            <div class="col-md-4">
                <img src="assets/bg/medicine.jpg" class="img-fluid" alt="" >
            </div>

            <div class="col-md-8">
                <h3>Medicine Inventory</h3>
                <p>
                Webnic also provides updated information about all the medicine that is stored in the clinic. Every medicine has its own profile that displays every tiny detail about the medicine including its supplier, pieces per box, expiration date, and the date when it is stocked. Medicine Inventory also has it’s own settings where personnel can edit, update and organize every detail that the medicine has including its barcode, supplier’s information such as it’s name and address.
                </p>
            </div>
           
        </div>
    </div>

    <div class="contents container mx-auto mt-5 pb-5 ">
        <div class="row">
            <div class="col-md-8">
                <h3>Queue</h3>
                <p>
                Webnic integrated a QR Code-based Queuing in order to lessen the time that both personnel and user are consuming. The personnel will provide a QR code where the patient scans it and will immediately join the queue inside that clinic. It will provide them a Queue Number and display the current queue number and the name of the patient that currently having a transaction inside the clinic.
                </p>
            </div>
            <div class="col-md-4 ">
                <img src="assets/bg/queue.jpg" class="img-fluid" alt="" >
            </div>
        </div>
    </div>

</div>

<div class="team-page container-fluid mt-5">
    <div class="text-center mx-auto pt-5 w-50">
        <h1 class="team-title">MEET THE WEBNIC TEAM</h1>
        <p class="justify-text mt-4 w-100">These are the third year students from Polytechnic University of the Philippines - Institute of Technology taking up Diploma in Information Communication Technology that built this Capstone Project - WEBNIC a Clinical Administering System with Qr Based Code Queuing.</p>
    </div>

    <div class="container mt-5">
        <div class="row d-flex justify-content-center">

            <div class="col-md-3 ms-2 me-2 shadow-sm rounded p-3 mt-2">
                <div class="team-image">
                    <img src="assets/team/jomark1.jpg" alt="">
                </div>
                <div class="team-desc mt-1">
                    <h4>Jomark Amante</h4>
                    <p class="fst-italic">Leader, Back-end & Front-end Developer</p>
                </div>
            </div>

            <div class="col-md-3 ms-2 me-2 shadow-sm rounded p-3 mt-2">
                <div class="team-image">
                    <img src="assets/team/razenbelle.jpg" alt="">
                </div>
                <div class="team-desc mt-1">
                    <h4>Razenbelle Ureta</h4>
                    <p class="fst-italic">Front-end Developer & Project Manager</p>
                </div>
            </div>

            <div class="col-md-3 ms-2 me-2 shadow-sm rounded p-3 mt-2">
                <div class="team-image">
                    <img src="assets/team/eleiza.jpg" alt="">
                </div>
                <div class="team-desc mt-1">
                    <h4>Eleiza Tulalian</h4>
                    <p class="fst-italic">Lead Researcher</p>
                </div>
            </div>

        </div>
    </div>

    <div class="container mt-2">
        <div class="row d-flex justify-content-center">

            <div class="col-md-3 ms-2 me-2 shadow-sm rounded p-3 mt-2">
                <div class="team-image">
                    <img src="assets/team/annaliza.jpg" alt="">
                </div>
                <div class="team-desc mt-1">
                    <h4>Annaliza Circulado</h4>
                    <p class="fst-italic">Researcher</p>
                </div>
            </div>

            <div class="col-md-3 ms-2 me-2 shadow-sm rounded p-3 mt-2">
                <div class="team-image">
                    <img src="assets/team/miko.jpg" alt="">
                </div>
                <div class="team-desc mt-1">
                    <h4>Miko Carlo Castillo</h4>
                    <p class="fst-italic">Researcher</p>
                </div>
            </div>

            <div class="col-md-3 ms-2 me-2 shadow-sm rounded p-3 mt-2">
                <div class="team-image">
                    <img src="assets/team/nico.jpg" alt="">
                </div>
                <div class="team-desc mt-1">
                    <h4>Nico Lapañiete</h4>
                    <p class="fst-italic">Researcher</p>
                </div>
            </div>

        </div>
    </div>

    <div class="container mt-2">
        <div class="row d-flex justify-content-center">

            <div class="col-md-3 ms-2 me-2 shadow-sm rounded p-3 mt-2">
                <div class="team-image">
                    <img src="assets/team/diane.jpg" alt="">
                </div>
                <div class="team-desc mt-1">
                    <h4>Diane Ogilve</h4>
                    <p class="fst-italic">Researcher</p>
                </div>
            </div>

            <div class="col-md-3 ms-2 me-2 shadow-sm rounded p-3 mt-2">
                <div class="team-image">
                    <img src="assets/team/raymark.jpg" alt="">
                </div>
                <div class="team-desc mt-1">
                    <h4>Raymark Solanoy</h4>
                    <p class="fst-italic">Researcher</p>
                </div>
            </div>

            <div class="col-md-3 ms-2 me-2 shadow-sm rounded p-3 mt-2">
                <div class="team-image">
                    <img src="assets/team/geralyn.jpg" alt="">
                </div>
                <div class="team-desc mt-1">
                    <h4>Geralyn Aytona</h4>
                    <p class="fst-italic">Researcher</p>
                </div>
            </div>

        </div>
    </div>

    <div class="text-center pt-5 pb-5">
        <span><a href="pages/team.php" class="text-decoration-none fs-5 learn-more-team p-3">Learn More About Them »</a></span>
    </div>

</div>

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

<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm modal-dialog-centered">
    <div class="modal-content ">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">NOTICE</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="editPatientClose1"></button>
      </div>
      <div class="modal-body">
          <h5>Login as: </h5>
          <div class="mb-3 text-center">
          <a href="pages/admin.login.php" class="btn bg-primary text-white w-100" id="goToAdmin" style="letter-spacing: 1px; z-index: 1;">ADMIN</a>
          </div>
          <div >
              <p class="text-center">--- OR ---</p>
          </div>
          <div class="text-center">
            <a href="pages/patient.login.php" class="btn bg-success text-white w-100" style="letter-spacing: 1px;">PATIENT</a>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" >Close</button>
      </div>
    </div>
  </div>
</div>




<script src="assets/js/bootstrap.js"></script>




<script>
    $(document).ready(function(){

        $(function () {
            $(document).scroll(function () {
                var $nav = $(".header-nav");

                $nav.toggleClass('scrolled', $(this).scrollTop() > $nav.height());
                });
        });
    });

</script>