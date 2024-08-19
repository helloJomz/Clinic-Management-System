<?php

// IMAGE STUDENT
$file = $_FILES['image'];              $filename = $file['name'];                       $filetmpname = $file['tmp_name']; 
$filesize = $file['size'];             $fileerror = $file['error'];                     $filetype = $file['type'];
$fileext = explode('.', $filename);    $fileactualext = strtolower(end($fileext));      $allowed = array('jpg', 'jpeg', 'png', 'jfif');

if(isset($_FILES['image'])){
    if(in_array($fileactualext, $allowed)){
        
        if($fileerror === 0){
                
            if($filesize < 50000000){
                    
                    $filenewname = $lastname.$studentnumber.".".$fileactualext;
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

