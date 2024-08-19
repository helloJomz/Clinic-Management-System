<?php 

require 'dbcon.inc.php';

$gender = $_POST['hiddengender'];
$patientid = $_POST['patientid'];

if(isset($_FILES['file']['name'])){

   /* Getting file name */
   $filename = $_FILES['file']['name'];
   
   
   /* Location */
   $location = "../assets/uploads/patient_img/".$filename;
   $imageFileType = pathinfo($location,PATHINFO_EXTENSION);
   $imageFileType = strtolower($imageFileType);

   /* Valid extensions */
   $valid_extensions = array("jpg","jpeg","png");

   $response = 0;
   /* Check file extension */
   if(in_array(strtolower($imageFileType), $valid_extensions)) {
      /* Upload file */
      if(move_uploaded_file($_FILES['file']['tmp_name'],$location)){
         $response = $location;
      }
   }
   
   $sql = "UPDATE student SET image='$response' WHERE id=$patientid";
   mysqli_query($conn, $sql);

   echo $response;
   exit;

}else{

    $numberAvatar = array('1.jpg', '2.jpg', '3.jpg', '4.jpg', '5.jpg');
    shuffle($numberAvatar);
    $femaleAvatar   = '../assets/default_img/female/'.$numberAvatar[1];
    $maleAvatar     = '../assets/default_img/male/'.$numberAvatar[1];

    if($gender == 'Female'){
        $imagePath = $femaleAvatar;
    }else{
        $imagePath = $maleAvatar;
    }

    $sql = "UPDATE student SET image='$imagePath' WHERE id=$patientid";
    mysqli_query($conn, $sql);

    echo $imagePath;
    exit;

}
