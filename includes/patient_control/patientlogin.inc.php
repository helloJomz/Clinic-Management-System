<?php

session_start();
include '../dbcon.inc.php';

if(isset($_POST['login'])){

    $email = $_POST['email'];
    $password = $_POST['password'];
    $tmp1 = $_POST['patientmode'];
    $tmp2 = str_replace(" ", "", $tmp1);
    $mode = strtolower($tmp2);


    $sql = "SELECT * FROM ".$mode." WHERE email='$email' ";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0 ){
        while($row = mysqli_fetch_array($result)){
            
            if($row['email'] == $email){

                $checker = password_verify($password, $row['password']);

                if($checker == true){
                    $_SESSION['patientviewid'] = $row['id'];
                    $_SESSION['patientfirstname'] = $row['firstname'];
                    $_SESSION['patientlastname'] = $row['lastname'];
                    $_SESSION['patientviewmode'] = $mode;
                    $_SESSION['verify_login_patient'] = true;
                    header('location: ../../pages/patient_dashboard.php');
                }
            }
        }
    }else{
        $_SESSION['alert'] = 'errorlogin';
        header('location: ../../pages/patient.login.php');
    }

}