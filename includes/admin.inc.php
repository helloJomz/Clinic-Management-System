<?php

session_start();
include 'dbcon.inc.php';


if(isset($_POST['createadmin'])){
    
    // ADMIN INFORMATIONS
     $email          = $_POST['email'];          $pwd            = $_POST['pwd'];
     $rptpwd         = $_POST['rptpwd'];         $firstname      = $_POST['firstname'];      $lastname       = $_POST['lastname']; 
     $date           = date("Y-m-d H:i:s");      $position       = $_POST['position'];       $hashedPwd      = password_hash($pwd, PASSWORD_DEFAULT);

     $gender = $_POST['gender'];
 
     // ACTIVITY LOG INFORMATIONS                                                                                                            
     $adminName      = $_SESSION['firstname']." ".$_SESSION['lastname'];
     $msg            = 'Admin user '.$firstname." ".$lastname.' has been added to the system.';
     $label          = 'add_admin';

     $path = '../pages';
     
    
     if(empty($firstname) || empty($lastname) || empty($email) || empty($pwd) || empty($rptpwd)){
        $_SESSION['error'] = 'emptyfields';
        header("Location: $path/create.admin.php");
        exit();
    }
    
    if ($pwd !== $rptpwd){
        $_SESSION['error'] = 'passwordnotmatch';
        header("Location: $path/create.admin.php");
        exit();   
    }
    
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $_SESSION['error'] = 'invalidemail';
        header("Location: $path/create.admin.php");
        exit();
    }
    
    if (!preg_match("/^[a-zA-z ]*$/", $firstname) || !preg_match("/^[a-zA-z ]*$/", $lastname)){
        $_SESSION['error'] = 'invalidchar';
        header("Location: $path/create.admin.php");
        exit();
    }

    // IMAGE STUDENT
    $file = $_FILES['image'];              $filename = $file['name'];                       $filetmpname = $file['tmp_name']; 
    $filesize = $file['size'];             $fileerror = $file['error'];                     $filetype = $file['type'];
    $fileext = explode('.', $filename);    $fileactualext = strtolower(end($fileext));      $allowed = array('jpg', 'jpeg', 'png', 'jfif');

    if(isset($_FILES['image'])){
        if(in_array($fileactualext, $allowed)){
            
            if($fileerror === 0){
                    
                if($filesize < 50000000){
                        
                        $filenewname = $lastname.$position.".".$fileactualext;
                        $imagePath = "../assets/uploads/patient_img/".$filenewname;
                        move_uploaded_file($filetmpname, $imagePath);
        
                }else{
                    header("location: ../pages/addpatient.php");
                    }
                
                }else{
                    header("location: ../pages/addpatient.php");
                    }
        
        }else{
                $numberAvatar = array('1.jpg', '2.jpg', '3.jpg', '4.jpg', '5.jpg');
                shuffle($numberAvatar);
                $femaleAvatar   = '../assets/default_img/female/'.$numberAvatar[1];
                $maleAvatar     = '../assets/default_img/male/'.$numberAvatar[1];

                if($_POST['gender'] == 'Female'){
                    $imagePath = $femaleAvatar;
                }else{
                    $imagePath = $maleAvatar;
                }
            }
    }else{

        $numberAvatar = array('1.jpg', '2.jpg', '3.jpg', '4.jpg', '5.jpg');
        shuffle($numberAvatar);
        $femaleAvatar   = '../assets/default_img/female/'.$numberAvatar[1];
        $maleAvatar     = '../assets/default_img/male/'.$numberAvatar[1];

        if($_POST['gender'] == 'Female'){
            $imagePath = $femaleAvatar;
        }else{
            $imagePath = $maleAvatar;
        }

    }


    $sql = "INSERT INTO admin(firstname, lastname, position, email, password, image, datecreated, gender) VALUES(?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssss", $firstname, $lastname, $position, $email, $hashedPwd, $imagePath, $date, $gender);
    $stmt->execute();

    $_SESSION['alert'] = "createsuccess";
    header("location: ../pages/admin.table.php");
}