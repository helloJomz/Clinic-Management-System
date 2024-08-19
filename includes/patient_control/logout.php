<?php

session_start();

unset($_SESSION['patientfirstname'], $_SESSION['patientlastname'], $_SESSION['patientviewid'], $_SESSION['patientviewmode'], $_SESSION['verify_login_patient']);

header('location: ../../pages/patient.login.php');