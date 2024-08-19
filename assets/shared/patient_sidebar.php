<?php
    session_start();
    include_once '../assets/shared/patient_header.php';
?>



    <body id="body-pd">
        <header class="header" id="header">
            <div class="header__toggle">
                <i class='bx bx-menu' id="header-toggle"></i>
            </div>
            
            <div class="name">
            <p style="text-transform: capitalize;" class="mt-3"><?php echo $_SESSION['patientfirstname']." ".$_SESSION['patientlastname']; ?></p>
            </div>

        </header>

        <div class="l-navbar" id="nav-bar">
            <nav class="nav">
                <div>
                    <a href="patient_dashboard.php" class="nav__logo">
                        <img src="../css/clinic.png" alt="">
                        <span class="nav__logo-name" style="letter-spacing: 2px;">WEBNIC</span>
                    </a>

                    <div class="nav__list ">
                        <a href="patient_dashboard.php" class="nav__link">
                        <i class="ri-dashboard-2-line"></i>
                            <span class="nav__name">DASHBOARD</span>
                        </a>

                        <a href="patient_profile.php" class="nav__link usermodal">
                            <i class='bx bx-user nav__icon' ></i>
                            <span class="nav__name">PROFILE</span>
                        </a>

                        <a href="patient_notes.php" class="nav__link usermodal">
                            <i class="far fa-sticky-note"></i>
                            <span class="nav__name">NOTES</span>
                        </a>
                        
               
                    </div>
                </div>

                <a href="../includes/patient_control/logout.php" class="nav__link">
                     <i class="ri-logout-circle-line"></i>
                    <span class="nav__name">Log Out</span>
                </a>
            </nav>
        </div>




<!--===== SIDEBAR JS =====-->
<script src="../assets/js/sidebar.js?<?php echo time();?>"></script>




